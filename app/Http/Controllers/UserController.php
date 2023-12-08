<?php

namespace App\Http\Controllers;

use App\Mail\MyCustomEmail;
use App\Models\User;
use Illuminate\Http\Request;    
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    function __construct()
    {
        $this->data['js'] = ['user'];
    }

    function index(){
        $this->data['user'] = Auth::user();
        return view('admin.profile',$this->data);
    }

    function createUserPage(Request $request){
        if(Auth::user()->type == "super_user")
        return view('admin.create_user',$this->data);
        else
        abort(404);
    }

    function createNewUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users,username,' . $request->id,
            'email' => 'required|email|unique:users,email,' . $request->id,
            'password' => 'required|string|min:8',
            'contact' => 'required|min:10|max:10'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.create_user',$this->data)->withErrors($validator)->withInput()->with('error','Please fill all details correctly !!!');
        } else {
            $user = User::updateOrCreate(['id' => $request->id], ['username' => $request->username, 'email' => $request->email, 'password' => bcrypt($request->password), 'contact' => $request->contact]);

            if ($user) {
                if ($request->id)
                    return redirect()->route('admin.profile')->with('success', 'User Updated');
                else
                    return redirect()->route('admin.create_user')->with('success', 'User Created');
            } else {
                if ($request->id)
                    return redirect()->route('admin.profile')->with('error', 'Something Went wrong!!!');
                else
                    return redirect()->route('admin.create_user')->with('error', 'Something Went Wrong');
            }
        }
    }

    public function userTableData(Request $request){
        if(Auth::user()->type == "super_user"){
        $users = User::select('*')->where('type','user');
        if ($request->filled('search.value')) {
            $searchValue = $request->input('search.value');
            $users->where(function ($users) use ($searchValue) {
                $users->where('username', 'like', "%$searchValue%")
                    ->orWhere('email', 'like', "%$searchValue%")
                    ->orWhere('contact', 'like', "%$searchValue%");
            });
        }

        // Get total record count (without filtering)
        $totalRecords = $users->count();

        // Apply sorting
        if ($request->filled('order.0.column') && $request->filled('order.0.dir')) {
            $columnIndex = $request->input('order.0.column');
            $columnName = $request->input("columns.$columnIndex.name");
            $columnDir = $request->input('order.0.dir');
            $users->orderBy($columnName, $columnDir);
        }

        // Apply pagination
        if ($request->filled('start') && $request->filled('length')) {
            $start = $request->input('start');
            $length = $request->input('length');
            $users->skip($start)->take($length);
        }

        $records = $users->get();
        // Format the data as required by DataTables
        $data = [];
        foreach ($records as $record) {
            $data[] = [
                'username' => $record->username,
                'contact' => $record->contact,
                'email' => $record->email,
                'action' => '
                <button type="button" value="' . $record->id . '" class="btn btn-danger delete_user_btn" data-bs-toggle="modal" data-bs-target="#delete_user_modal"><i class="bi bi-trash"></i>
                </button>'
            ];
        }

        $response = [
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $users->count(),
            'data' => $data,
        ];

        return response()->json($response);
    }
    else
    abort(404);
    }

    function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ], [
            'username.required' => 'Please enter your name.',
            'password.required' => 'Please enter a password.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.login')->withErrors($validator)->withInput()->with('error', 'Please fill your username and password !!');
        } else {
            if (Auth::attempt(["username" => $request->username, "password" => $request->password])) {
                return redirect()->route('admin.dashboard')->with('success', 'Welcome '. Auth::user()->username . '');
            }
            $err = ['err' => "invalid credentials"];
            return redirect()->route('admin.login')->withErrors($err)->withInput()->with('error', 'Invalid Credentials');
        }
    }

    public function change_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.profile')->withErrors($validator)->withInput()->with('error', 'Please fill all fileds correctly');
        } else {

            $user = Auth::user();
            $password = bcrypt($request->password);
            $user1 = User::where('id', $user->id)->update(['password' => $password]);
            if ($user1) {
                Auth::logout();
                return redirect()->route('admin.login')->with('success', 'Password Changed Successfully');
            } else {
                return redirect()->route('admin.profile')->with('error', 'Something Went Wrong!!!');
            }
        }
    }

    public function change_profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users,username,' . $request->id,
            'email' => 'required|email|unique:users,email,' . $request->id,'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.profile')->withErrors($validator)->withInput()->with('error', 'Please fill all details correctly !!!');
        } else {
            
            $user =  User::find($request->id);
            $user->username = $request->username;
            $user->email = $request->email;
            $user->contact = $request->phone;
            $user->save();
            if ($user)
                return redirect()->route('admin.profile')->with('success', 'Profile updated successfully  :)  ');
        }
    }

    public function forgotPasswordDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|email'
        ]);

        if ($validator->fails()) {
            return redirect()->route('forgot.password')->withErrors($validator)->withInput()->with('error','Please fill all details correctly !!!');
        } else {
            $user = User::where('email',$request->username)->first();
            // return $user;
            if($user){
                Mail::to($user->email)->send(new MyCustomEmail($user));
                return redirect()->route('admin.login')->with('success','Email sent successfully to your registered email address');
            }
            else{
                return redirect()->route('forgot.password')->with('error',"User doesn't exists ")->withInput();
            }

        }

    }

    function forgotPassword(Request $request){
        return view('admin.forgot_password',$this->data);
    }

    function logout(Request $request){
        Auth::logout();
        return redirect()->route('admin.login')->with('success','Logout Successfully');
    }

    function checkLogin(Request $request){
        if(!Auth::check()){
        Auth::logout();
        return view('admin.login',$this->data);
        }
        return redirect()->route('admin.dashboard');
    }
    
    public function deleteUser(Request $request){
        $user = User::find($request->id);
        $user->delete();
        return response()->json(['status'=>'success','message'=>'User deleted successfully','url'=>route('admin.create_user')]);
    }
}

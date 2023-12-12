<?php

namespace App\Http\Controllers;

use App\Mail\MyCustomEmail;
use App\Models\ResetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ForgetPasswordController extends Controller
{
    function __construct()
    {
        $this->data['js'] = [];
    }

    function index(Request $request)
    {
        return view('admin.forgot_password', $this->data);
    }

    public function resetPasswordLink(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|email|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()->route('forgot.password')->withErrors($validator)->withInput()->with('error', 'Please fill all details correctly !!!');
        } else {
            $user = User::where('email', $request->username)->first();
            if ($user) {
                $token = md5(uniqid(rand(), true));
                $link = env('APP_URL') . "/reset-password/" . $token;

                // sending mail to registered email
                Mail::to($user->email)->send(new MyCustomEmail($user->username, $link));

                // reset password table entry
                $reset_pass = new ResetPassword();
                $reset_pass->user_id = $user->id;
                $reset_pass->token = $token;
                $reset_pass->created_at = now();
                $reset_pass->expired_at = now()->addMinutes(120);
                $reset_pass->save();

                return redirect()->route('forgot.password')->with('success', 'Email sent successfully to your registered email address :) ');
            } else {
                return redirect()->route('forgot.password')->with('error', 'User does not exist !!!!')->withInput();
            }
        }
    }

    public function resetPassword(Request $request)
    {
        if ($request->token) {
            $reset_pass = ResetPassword::where('token', $request->token)
                ->where(function ($query) {
                    $query->orWhere('is_expired', 1)
                        ->orWhere('expired_at', '<', now());
                })
                ->first();
            if (!$reset_pass) {
                $this->data['token'] = $request->token;
                return view('admin.reset_password', $this->data);
            }
        }
        return redirect()->route('forgot.password')->with('error', 'token expired please regenerate it')->withInput();
    }

    public function resetPasswordStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->route('forgot.password')->withErrors($validator)->withInput()->with('error', 'Please fill all details correctly !!!');
        } else {
            $reset_pass = ResetPassword::where('token', $request->token)
                ->where(function ($query) {
                    $query->orWhere('is_expired', 1)
                        ->orWhere('expired_at', '>', now());
                })
                ->first();
            if ($reset_pass) {
                $reset_pass->is_expired = 1;
                $reset_pass->save();
                $user = User::find($reset_pass->user_id);
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->route('admin.login')->with('success', 'Password Updated Successfully :) ');
            } else {
                return redirect()->route('forgot.password')->with('error', 'token expired please regenerate it')->withInput();
            }
        }
    }
}

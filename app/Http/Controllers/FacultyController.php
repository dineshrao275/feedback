<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Feedback;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class FacultyController extends Controller
{
    function __construct()
    {
        $this->data['js'] = ['faculty'];
    }

    function index()
    {
        return view('admin.resources.faculties', $this->data);
    }

    function addUpdateFaculty(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:faculties,email,' . $request->id,
            'gender' => 'required|string',
            'department' => 'required|string',
            'designation' => 'required|string',
            'doj' => 'required|date',
        ]);

        if ($validator->fails() && !$request->id) {
            return redirect()->route('admin.faculties', $this->data)->withErrors($validator)->withInput()->with('error', 'Please fill all details correctly !!');
        } else if ($validator->fails() && $request->id) {
            return redirect()->route('admin.faculty_table', $this->data)->withErrors($validator)->withInput()->with('error', 'Please fill all details correctly !!');
        } else {
            $faculty = Faculty::updateOrCreate(['id' => $request->id], ['name' => $request->name, 'email' => $request->email, 'department' => $request->department, 'gender' => $request->gender, 'designation' => $request->designation, 'doj' => $request->doj]);
            if ($faculty) {
                if ($request->id)
                    return redirect()->route('admin.faculty_table', $this->data)->with('success', 'Updated faculty details successfully');
                else
                    return redirect()->route('admin.faculties', $this->data)->with('success', 'Added faculty details successfully');
            } else {
                if ($request->id)
                    return redirect()->route('admin.faculty_table', $this->data)->with('error', 'Something Went Wrong!!!');
                else
                    return response()->view('admin.resources.faculties', $this->data)->with('error', 'Something Went Wrong!!!');
            }
        }
    }

    function getFaculties(Request $request)
    {
        return view('admin.tables.faculty_table', $this->data);
    }
    public function getFacultiesData(Request $request)
    {
        $faculty = DB::table('faculties as f')->select(['f.*', DB::raw('DATE_FORMAT(f.doj,"%d-%m-%Y") as doj')]);
        if ($request->filled('search.value')) {
            $searchValue = $request->input('search.value');
            $faculty->where(function ($faculty) use ($searchValue) {
                $faculty->where('name', 'like', "%$searchValue%")
                    ->orWhere('email', 'like', "%$searchValue%")->orWhere('gender', 'like', "%$searchValue%")
                    ->orWhere('designation', 'like', "%$searchValue%")->orWhere('doj', 'like', "%$searchValue%")->orWhere('department', 'like', "%$searchValue%");
            });
        }

        // Get total record count (without filtering)
        $totalRecords = $faculty->count();

        // Apply sorting
        if ($request->filled('order.0.column') && $request->filled('order.0.dir')) {
            $columnIndex = $request->input('order.0.column');
            $columnName = $request->input("columns.$columnIndex.name");
            $columnDir = $request->input('order.0.dir');
            $faculty->orderBy($columnName, $columnDir);
        }

        // Apply pagination
        if ($request->filled('start') && $request->filled('length')) {
            $start = $request->input('start');
            $length = $request->input('length');
            $faculty->offset($start)->limit($length);
        }    

        $records = $faculty->get();
        // Format the data as required by DataTables
        $data = [];
        foreach ($records as $record) {
            $data[] = [
                'name' => $record->name,
                'gender' => $record->gender,
                'email' => $record->email,
                'department' => $record->department,
                'designation' => $record->designation,
                'doj' => $record->doj,
                'action' => '<button type="button" value="' . $record->id . '" class="btn btn-info update_faculty_btn" data-bs-toggle="modal" data-bs-target="#largeModal"><i class="bi bi-pencil-square"></i>
                </button>
                <button type="button" value="' . $record->id . '" class="btn btn-danger delete_faculty_btn" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-trash"></i>
                </button>'
            ];
        }

        $response = [
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data,
        ];

        return response()->json($response);
    }

    function getFaculty(Request $request)
    {
        $this->data['faculty'] = Faculty::find($request->id);
        return $this->data;
    }

    function deleteFaculty(Request $request)
    {
        $faculty = Faculty::find($request->id);
        $faculty->delete();
        return response()->json(['status' => 'success','message' => 'Delete faculty successfully','url' => route('admin.faculty_table')]);
    }
}

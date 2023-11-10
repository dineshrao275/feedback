<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    function __construct()
    {
        $this->data['js'] = ['course'];
    }

    function index(){
        return view('admin.resources.courses',$this->data);
    }

    public function addUpdate(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:courses,name,' . $request->id,
            'department' => 'required',
            'type' => 'required'
        ]);
        if ($validator->fails()) {
            if ($request->id)
                return redirect()->route('admin.faculty_table',$this->data)->withErrors($validator)->withInput()->with('error', 'Please fill all details correctly !!');
            else
                return redirect()->route('admin.courses',$this->data)->withErrors($validator)->withInput()->with('error', 'Please fill all details correctly !!');
        } else {
            $course = Course::updateOrCreate(['id' => $request->id], ['name' => $request->name, 'department' => $request->department, 'type' => $request->type]);
            if ($course) {
                if ($request->id)
                    return redirect()->route('admin.course_table',$this->data)->with('success', 'Updated course details successfully');
                else
                    return redirect()->route('admin.courses',$this->data)->with('success', 'Added faculty details successfully');
            } else {
                if ($request->id)
                    return redirect()->route('admin.course_table',$this->data)->with('error', 'Something went Wrong !!!');

                else
                    return redirect()->route('admin.courses',$this->data)->with('error', 'Something Went Wrong!!!');
            }
        }
    }

    function getCourses(Request $request)
    {
        return view('admin.tables.course_table',$this->data);
    }
    public function courseTableData(Request $request){
        $course = DB::table('courses as c')->select('c.*');
        if ($request->filled('search.value')) {
            $searchValue = $request->input('search.value');
            $course->where(function ($course) use ($searchValue) {
                $course->where('c.name', 'like', "%$searchValue%")
                    ->orWhere('c.department', 'like', "%$searchValue%");
            });
        }

        // Get total record count (without filtering)
        $totalRecords = $course->count();

        // Apply sorting
        if ($request->filled('order.0.column') && $request->filled('order.0.dir')) {
            $columnIndex = $request->input('order.0.column');
            $columnName = $request->input("columns.$columnIndex.name");
            $columnDir = $request->input('order.0.dir');
            $course->orderBy($columnName, $columnDir);
        }

        // Apply pagination
        if ($request->filled('start') && $request->filled('length')) {
            $start = $request->input('start');
            $length = $request->input('length');
            $course->offset($start)->limit($length);
        }   

        $records = $course->get();
        // Format the data as required by DataTables
        $data = [];
        foreach ($records as $record) {
            $data[] = [
                'name' => $record->name,
                'department' => $record->department,
                'action' => '<button type="button" value="' . $record->id . '" class="btn btn-info update_course_btn" action="'.route('edit_course_id').'" data-bs-toggle="modal" data-bs-target="#update_course_modal"><i class="bi bi-pencil-square"></i>
                </button>
                <button type="button" value="' . $record->id . '" class="btn btn-danger delete_course_btn" data-bs-toggle="modal" data-bs-target="#delete_course_modal"><i class="bi bi-trash"></i>
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

    function getCourse(Request $request)
    {
        $course = Course::find($request->id);
        return $course;
    }

    function deleteCourse(Request $request)
    {
        Course::where('id', $request->id)->delete();
        return response()->json(['status'=>'success','message'=>'Course deleted successfully','url'=> route('admin.course_table')]);
    }
}

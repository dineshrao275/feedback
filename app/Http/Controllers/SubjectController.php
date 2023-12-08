<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Faculty;
use App\Models\Feedback;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    function __construct()
    {
        $this->data['js'] = ['subject'];
    }

    function index()
    {
        $this->data['courses'] = Course::all();
        $this->data['semester_year'] = $this->data['courses'][0]->type;
        $this->data['faculties'] = Faculty::all();
        // return $this->data;
        return view('admin.resources.subjects', $this->data);
    }

    // add and update subject details
    public function addUpdate(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'faculty_id' => 'required',
            'semester_year' => 'required|string',
            'section' => 'required|alpha|uppercase',
            'code' => 'required|string',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            if ($request->id)
                return redirect()->route('admin.subject_table')->withErrors($validator)->withInput()->with('error', 'Please fill all details correctly !!');
            else
                return redirect()->route('admin.subjects')->withErrors($validator)->withInput()->with('error', 'Please fill all details correctly !!');
        } else {
            $subject = Subject::updateOrCreate(['id' => $request->id], ['name' => $request->name, 'code' => $request->code, 'section' => $request->section, 'semester_year' => $request->semester_year, 'course_id' => $request->course_id, 'faculty_id' => $request->faculty_id]);

            if ($subject) {
                if ($request->id)
                    return redirect()->route('admin.subject_table')->with('success', 'Updated subject details successfully');
                else
                    return redirect()->route('admin.subjects')->with('success', 'Added faculty details successfully');
            } else {
                if ($request->id)
                    return redirect()->route('admin.subject_table')->with('error', 'Something Went Wrong!!!');
                else
                    return redirect()->route('admin.subjects')->with('error', 'Something Went Wrong!!!');
            }
        }
    }

    public function getCourseType(Request $request)
    {
        $type = Course::select('type')->where('id', $request->id)->first();
        return $type;
    }

    public function subjectTable()
    {
        return view('admin.tables.subject_table', $this->data);
    }

    public function subjectTableData(Request $request){
        $subject = DB::table('subjects as s')->select(['s.*', 'c.name as course', 'f.name as faculty'])->join('faculties as f', 's.faculty_id', 'f.id')->join('courses as c', 's.course_id', 'c.id');
        if ($request->filled('search.value')) {
            $searchValue = $request->input('search.value');
            $subject->where(function ($subject) use ($searchValue) {
                $subject->where('s.name', 'like', "%$searchValue%")
                    ->orWhere('s.code', 'like', "%$searchValue%")->orWhere('c.name', 'like', "%$searchValue%")
                    ->orWhere('s.semester_year', 'like', "%$searchValue%")->orWhere('f.name', 'like', "%$searchValue%")->orWhere('s.section', 'like', "%$searchValue%");
            });
        }

        // Get total record count (without filtering)
        $totalRecords = $subject->count();

        // Apply sorting
        if ($request->filled('order.0.column') && $request->filled('order.0.dir')) {
            $columnIndex = $request->input('order.0.column');
            $columnName = $request->input("columns.$columnIndex.name");
            $columnDir = $request->input('order.0.dir');
            $subject->orderBy($columnName, $columnDir);
        }

        // Apply pagination
        if ($request->filled('start') && $request->filled('length')) {
            $start = $request->input('start');
            $length = $request->input('length');
            $subject->offset($start)->limit($length);
        }   

        $records = $subject->get();
        // Format the data as required by DataTables
        $data = [];
        foreach ($records as $record) {
            $data[] = [
                'course' => $record->course,
                'semester_year' => $record->semester_year,
                'faculty' => $record->faculty,
                'section' => $record->section,
                'code' => $record->code,
                'name' => $record->name,
                'action' => '<button type="button" value="' . $record->id . '" class="btn btn-info update_subject_btn" action="'.route('edit_subject_id').'" data-bs-toggle="modal" data-bs-target="#update_subject_modal"><i class="bi bi-pencil-square"></i>
                </button>
                <button type="button" value="' . $record->id . '" class="btn btn-danger delete_subject_btn" data-bs-toggle="modal" data-bs-target="#delete_subject_modal"><i class="bi bi-trash"></i>
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

    public function getSubject(Request $request)
    {
        $this->data['subject'] = DB::table('subjects as s')->select(['s.*', 'c.name as course', 'f.name as faculty'])->join('faculties as f', 's.faculty_id', 'f.id')->join('courses as c', 's.course_id', 'c.id')->where('s.id', $request->id)->first();
        $this->data['course'] = Course::all();
        $this->data['faculty'] = Faculty::all();
        // dd($this->data);
        return response()->json($this->data);
    }

    public function deleteSubject(Request $request)
    {
        // Feedback::where('subject_id', $request->id)->delete();
        Subject::where('id', $request->id)->delete();
        return response()->json(['status'=>'success','message'=>'Deleted Successfully','url' => route('admin.subject_table')]);
    }

    // get section for students

    public function getSection(Request $request)
    {
        $sections = Subject::select('section')->where('course_id', $request->id)->where('semester_year', $request->sem_year)->distinct('section')->get();
        return $sections;
    }

    // for getting feedback table
    public function getFeedbackData(Request $request)
    {
        $student = DB::table('students as s')->where(['course_id'=>$request->id , 'semester_year' => $request->sem_year ,'section' => $request->section,'erp_id' => $request->erp_id ])->get();
        $output = "";
        if($student->first() != null){
            $st_id = $student->first()->id;
        $table = DB::table('subjects as sub')->select(['sub.*', 'f.id as faculty_id', 'f.name as faculty_name'])->join('faculties as f', 'sub.faculty_id', 'f.id')->where(['sub.course_id' => $request->id, 'sub.semester_year' => $request->sem_year, 'sub.section' => $request->section])->orderBy('sub.code')->get();
        $topics = Topic::all();
        foreach ($table as $key => $value) {
            $output .= "<tr><td><input type='hidden' name='subject_id[]' value='" . $value->id . "' readonly> " . $value->code . "&nbsp;" . $value->name . " </td><td><input type='hidden' name='faculty_id[]' value='" . $value->faculty_id . "' readonly>" . $value->faculty_name . "</td>";
            foreach($topics as $topic){
             $output .= "<input type='hidden' value='$st_id' name='st_id'> <td><select name='topicmodelentry[".$key."][". $topic->database_name ."][]' ><option value='5'>5</option><option value='4'>4</option><option value='3'>3</option><option value='2'>2</option><option value='1'>1</option></select></td>";
            }
          $output .= "</tr>";
        }
        return response()->json(["success" => "success","output" => $output,"student"=>$student]);
    }
    return response()->json(["error" => "error","output" => $output,"message" => "Student doesn't exist"]);
    }
}

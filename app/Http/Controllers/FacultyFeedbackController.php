<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Faculty;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Feedback;

class FacultyFeedbackController extends Controller
{
    function __construct()
    {
        $this->data['js'] = [];
    }
    public function getFacultyData()
    {
        $this->data['faculties'] = Faculty::all();
        return view('admin.reports.faculty_wise', $this->data);
    }
    public function getFacultyFeedbackData(Request $request)
    {
        $this->data['faculty'] = Faculty::find($request->id);
        $this->data['subjects'] = $subjects = Subject::where('faculty_id', $request->id)->get();
        $topics = Topic::all();
        $this->data['topics'] = [];
        foreach ($topics as $topic) {
            array_push($this->data['topics'], ["database_name" => $topic->database_name, "name" => $topic->name]);
        }

        foreach ($subjects as $key => $subject) {
            foreach ($topics as $key => $topic) {
                $this->data['average'][$subject->code][$topic->database_name] = Feedback::where("faculty_id", $request->id)->where("subject_id", $subject->id)->avg($topic->database_name);
            }
        }
        // dd($this->data);    
        return view('admin.reports.faculty_report', $this->data);
    }

    public function getCourseData(Request $request)
    {
        $this->data['courses'] = Course::all();
        return view('admin.reports.course_wise', $this->data);
    }

    public function getCourseFeedbackData(Request $request)
    {
        $this->data['course'] = $courses = Course::find($request->id);
        $this->data['subjects'] = $subjects = DB::table("subjects as s")->join("faculties as f", "s.faculty_id", "f.id")->select("s.*", "f.name as faculty_name")->where("course_id", $request->id)->get();
        $topics = Topic::all();
        $this->data['topics'] = [];
        foreach ($topics as $topic) {
            array_push($this->data['topics'], ["database_name" => $topic->database_name, "name" => $topic->name]);
        }

        foreach ($subjects as $key => $subject) {
            foreach ($topics as $key => $topic) {
                $this->data['average'][$subject->code][$topic->database_name] = Feedback::where("subject_id", $subject->id)->avg($topic->database_name);
            }
        }

        // print_r($this->data); exit;
        return view('admin.reports.course_report', $this->data);
    }
}
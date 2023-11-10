<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;
use App\Models\Suggestion;
use App\Models\Topic;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
       function newFeedback(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'semester_year' => 'required',
            'enrollment' => 'required|min:12|max:12',
            'student_name' => 'required|string|min:3',
            'session' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('student_info')->withErrors($validator)->withInput()->with('error', 'Something went wrong !!!');
        } else {

            $studentdata = ['course_id' => $request->course_id, 'semester_year' => $request->semester_year, 'section' => $request->section, 'enrollment' => $request->enrollment, 'student_name' => $request->student_name, 'session' => $request->session];
            $student_id = StudentController::newStudent($studentdata);
            if($request->suggestion !=""){
                $suggestion = new Suggestion();
                $suggestion->student_id = $student_id;
                $suggestion->suggestion = $request->suggestion;
                $suggestion->save();
            }
            $topics = Topic::all();
            $data = $request->all();
            foreach ($topics as $topic) {
                $topicEntries[] = $topic->database_name;
            }
            // dd($topicEntries);
            foreach ($data['subject_id'] as $key => $subjectId) {
                $facultyId = $data['faculty_id'][$key];
                $feedbackData = $data['topicmodelentry'][$key];

                $feedback = Feedback::firstOrNew([
                    'student_id' => $student_id,
                    'subject_id' => $subjectId,
                    'faculty_id' => $facultyId
                ]);
                foreach ($topicEntries as $val) {
                    $feedback->$val = intval($feedbackData[$val][0]);
                }
                $feedback->save();
            }
            return redirect()->route('student_info')->with('success', 'Your response has been recorded :) ');
        }
    }
}

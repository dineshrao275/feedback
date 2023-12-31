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
            'erp_id' => 'required',
            'student_name' => 'required|string|min:3',
            'session' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('student_info')->withErrors($validator)->withInput()->with('error', 'Something went wrong !!!');
        } else {

            if($request->suggestion !=""){
                $suggestion = new Suggestion();
                $suggestion->student_id = $request->st_id;
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
                    'student_id' => $request->st_id,
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

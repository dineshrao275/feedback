<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Faculty;
use App\Models\Feedback;
use App\Models\Suggestion;

class DashboardController extends Controller
{
    function __construct()
    {
        $this->data['js'] = [];      
    }

    public function showData()
    {
        $this->data['suggestions'] = Suggestion::orderBy("id","desc")->limit(10)->get();
        $this->data['faculties'] = Faculty::count();
        $this->data['courses'] = Course::count();
        $this->data['students'] = Feedback::distinct('student_id')->whereYear('created_at', date('Y'))->count();
        return view('admin.dashboard',$this->data);
    }
}

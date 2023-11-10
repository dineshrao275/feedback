<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    function __construct()
    {
        $this->data['js'] = ['student-info'];
    }
    function index(Request $request)
    {
        $this->data['courses'] = Course::all();
        $this->data['topics'] = Topic::all();
        return view('student_info', $this->data);
    }

    static function newStudent($studentdata)
    {
        $student = Student::updateOrCreate(['enrollment' => $studentdata['enrollment'], 'session' => $studentdata['session']], ['name' => $studentdata['student_name'], 'course' => $studentdata['course_id'], 'semester_year' => $studentdata['semester_year'], 'section' => $studentdata['section']]);
        return $student->id;
    }

    function studentTable(Request $request)
    {
        return view('admin.tables.student_table', $this->data);
    }
    public function studentTableData(Request $request){
        $query = DB::table('students as st')->select(['st.*', 'c.name as course'])->join('courses  as c', 'st.course_id', 'c.id');
            // Apply filtering
    if ($request->filled('search.value')) {
        $searchValue = $request->input('search.value');
        $query->where(function ($query) use ($searchValue) {
            $query->where('st.name', 'like', "%$searchValue%")
                  ->orWhere('st.erp_id', 'like', "%$searchValue%")->orWhere('st.semester_year', 'like', "%$searchValue%")
                  ->orWhere('st.section', 'like', "%$searchValue%")->orWhere('st.session', 'like', "%$searchValue%")->orWhere('c.name', 'like', "%$searchValue%");
        });
    }

    // Get total record count (without filtering)
    $totalRecords = $query->count();

    // Apply sorting
    if ($request->filled('order.0.column') && $request->filled('order.0.dir')) {
        $columnIndex = $request->input('order.0.column');
        $columnName = $request->input("columns.$columnIndex.name");
        $columnDir = $request->input('order.0.dir');
        // $query->orderBy($columnName, $columnDir);
        if ($columnName === 'course') {
            $query->orderBy('c.name', $columnDir);
        } else {
            $query->orderBy("st.$columnName", $columnDir);
        }
    }

    if ($request->filled('start') && $request->filled('length')) {
        $start = $request->input('start');
        $length = $request->input('length');
        $query->offset($start)->limit($length);
    }

    $records = $query->get();
    // Format the data as required by DataTables
    $data = [];
    foreach ($records as $record) {
        $data[] = [
            // 'id' => $record->id,
            'erp_id' => $record->erp_id,
            'name' => $record->name,
            'course' => $record->course,
            'semester_year' => $record->semester_year,
            'section' => $record->section,
            'session' => $record->session,
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
}

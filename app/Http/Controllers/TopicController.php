<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TopicController extends Controller
{
    function __construct()
    {
        $this->data['js'] = ['topic'];
    }

    function index()
    {
        return view('admin.resources.topics', $this->data);
    }
    public function addUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'topicname' => 'required|string|max:40|unique:topics,name,' . $request->id,
        ]);
        if ($validator->fails()) {
            if ($request->id)
                return redirect()->route('admin.topic_table,$this->data')->withErrors($validator)->withInput()->with('error', 'Please fill all details correctly !!');
            else
                return redirect()->route('admin.topics', $this->data)->withErrors($validator)->withInput()->with('error', 'Please fill all details correctly !!');
        } else {
            $columnName = strtolower($request->topicname);
            $columnName = str_replace(" ", "_", $columnName);
            if ($request->id) {
                $priviousTopic = Topic::find($request->id);
                $priviousName = strtolower($priviousTopic->name);
                $priviousName = str_replace(" ", "_", $priviousName);
                $feedback = DB::statement('ALTER TABLE feedbacks CHANGE ' . $priviousName . ' ' . $columnName . ' INT DEFAULT 5');
            } else
                $feedback = DB::statement('ALTER TABLE feedbacks ADD ' . $columnName . ' INT NOT NULL DEFAULT 5');
                
            $topic = Topic::updateOrCreate(['id' => $request->id], ['name' => $request->topicname,'database_name' => $columnName]);

            if ($topic && $feedback) {
                if ($request->id)
                    return redirect()->route('admin.topic_table')->with('success', 'Topic updated successfully');
                return redirect()->route('admin.topics', $this->data)->with('success', 'Topic added successfully');
            }
            return redirect()->route('admin.topics', $this->data)->with('error', 'Something Went wrong!!!');
        }
    }

    public function getTopics()
    {
        return view('admin.tables.topic_table', $this->data);
    }
    public function topicTableData(Request $request)  {
        $topics = DB::table('topics')->select('*');
        if ($request->filled('search.value')) {
            $searchValue = $request->input('search.value');
            $topics->where(function ($topics) use ($searchValue) {
                $topics->where('name', 'like', "%$searchValue%");
            });
        }

        // Get total record count (without filtering)
        $totalRecords = $topics->count();

        // Apply sorting
        if ($request->filled('order.0.column') && $request->filled('order.0.dir')) {
            $columnIndex = $request->input('order.0.column');
            $columnName = $request->input("columns.$columnIndex.name");
            $columnDir = $request->input('order.0.dir');
            $topics->orderBy($columnName, $columnDir);
        }

        // Apply pagination
        if ($request->filled('start') && $request->filled('length')) {
            $start = $request->input('start');
            $length = $request->input('length');
            $topics->offset($start)->limit($length);
        }   

        $records = $topics->get();
        // Format the data as required by DataTables
        $data = [];
        foreach ($records as $record) {
            $data[] = [
                'name' => $record->name,
                'action' => '<button type="button" value="' . $record->id . '" class="btn btn-info update_topic_btn" action="'.route('get_topic').'" data-bs-toggle="modal" data-bs-target="#update_topic_modal"><i class="bi bi-pencil-square"></i>
                </button>
                <button type="button" value="' . $record->id . '" class="btn btn-danger delete_topic_btn" data-bs-toggle="modal" data-bs-target="#delete_topic_modal"><i class="bi bi-trash"></i>
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

    public function getTopic(Request $request)
    {
        return Topic::find($request->id);
    }
    public function deleteTopic(Request $request)
    {
        $topic = Topic::find($request->id);
        $columnName = str_replace(" ", "_", strtolower($topic->name));
        DB::statement('ALTER TABLE feedbacks DROP ' . $columnName . '');
        $topic->delete();
        return response()->json(['status'=>'success','message'=>'Topic deleted successfully ','url'=>route('admin.topic_table')]);
    }
}

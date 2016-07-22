<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TasksController extends Controller
{
	private $rules;
	public function __construct(){
		$this->rules = ['title'=>'required'];
	}
    public function store(Request $request){
    	$task = new \App\Task;

    	return $this->validateAndStore($request, function() use ($task, $request){
	    	$task->title = $request->get('title');
	    	$task->pm_link = $request->get('jira_link');
	    	$task->repo_link = $request->get('repo_link');
    		if($task->save()){
    			return 'Task Saved!';
    		}
    		return 'problem saving task';
    	});
    }
    private function validateAndStore($request, $cbf){
    	$v = \Validator::make($request->all(), $this->rules);
    	if($v->fails()){
    		return redirect('/')->withErrors($v);
    	}
    	return $cbf();
    }
    public function index(){
    	$tasks = Task::all();
    	return view('tasks.index', ['tasks'=>$tasks]);
    }
}

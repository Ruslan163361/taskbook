<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Task;
use App\Filters\TasksFilter;

class TaskController extends Controller
{
	/**
	* валидация данных
	*/
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'task' => 'required',
            'autor' => 'required',
            'status' => 'required|numeric',
        ]);
    }
    /**
    * вернуть список задач
    * TasksFilter-фильтр данных
	* $tasks - список задач с пагинацией
	* $paginate - количество задач на одной странице
	* $flt_params - данные для фильтра
	*/
    public function show(Request $request)
    {
        $paginate = 10;
        
        $tasks = (new TasksFilter(DB::table('tasks'), $request))->apply()->paginate($paginate);
        $tasks_autor = DB::table('tasks')->select('autor', DB::raw('count(*) as total'));
        $flt_params['autor'] = (new TasksFilter($tasks_autor, $request))->apply()->groupBy('autor')->get();
        $tasks_status = DB::table('tasks')->select('status', DB::raw('count(*) as total'));
        $flt_params['status'] = (new TasksFilter($tasks_status, $request))->apply()->groupBy('status')->get();
        //dd($flt_params);
        return view('tasks')->with([
	      'tasks' => $tasks,
	      'flt_params' => $flt_params
	    ]);
    }
    /**
    * форма для создания задачи
	* @return form create Task
	*/
    public function create()
    {
        return view('taskform');
    }
    /**
	* создать задачу
	* $request - данные формы
	* @return Task
	*/
    public function store(Request $request)
    {
    	$data = [
    		'task' => $request->input('task'),
            'autor' => $request->input('autor'),
            'status' => $request->input('status'),
    	];
    	$validator = $this->validator($data);

    	if ($validator->fails()) {
		  return redirect()->back()->withErrors($validator->errors());
		}

		$task = Task::create($data);
		return redirect('/');
    }
    /**
	* удалить задачу
	* @param $id 
	* @return $id
	*/
    public function destroy($id)
    {
    	Task::destroy($id);
    	return $id;
    }
}

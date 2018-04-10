<?php

namespace App\Http\Controllers;


use App\Task;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $tasks = Task::where('user_id', Auth::id())->paginate(10);
        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::id();
        $request['unique_code'] = bcrypt($request['to_do'].Auth::id());
        $task = Task::create($request->all());
        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //dd($task);
        if($task['is_to_do']){
            $task['is_to_do'] = 0;
            $task->update($task->toArray());

        }else{
            $task['is_to_do'] = 1;
            $task->update($task->toArray());

        }

        return redirect(route('tasks.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit',
            [
                'task' => $task
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Task $task)
    {

        $task->update($request->all());

        return redirect(route('tasks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {

       $task->delete();
        return redirect(route('tasks.index'));
    }
}

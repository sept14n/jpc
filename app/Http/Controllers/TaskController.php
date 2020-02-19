<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($project)
    {
        $tasks = Task::latest()->where('project_id', $project)->paginate(10);

        return view('tasks.index', compact(['tasks', 'project']))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project)
    {
        return view('tasks.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $project)
    {
        $request->validate([
            'name' => 'required',
            'plan_start_date' => 'required',
            'plan_end_date' => 'required',
        ]);

        Task::create($request->all());

        $tasks = Task::latest()->where('project_id', $project)->paginate(10);

        return view('tasks.index', compact(['tasks', 'project']))
            ->with(['i' => (request()->input('page', 1) - 1) * 10, 'success' => 'Task created successfully.']);

        // return redirect()->route('tasks.index', compact(['tasks', 'project']))
        //     ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($project, $task_id)
    {
        $task = Task::find($task_id);

        return view('tasks.show', compact(['task', 'project']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($project, $task_id)
    {
        $task = Task::find($task_id);

        return view('tasks.edit', compact(['task', 'project']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $project, $task_id)
    {
        $request->validate([
            'name' => 'required',
            'plan_start_date' => 'required',
            'plan_end_date' => 'required',
        ]);

        $task = Task::find($task_id);
        $task->update($request->all());

        return redirect()->route('projects.tasks.index', compact('project'))
            ->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($project, $task_id)
    {
        $task = Task::find($task_id);
        $task->delete();

        return redirect()->route('projects.tasks.index', compact('project'))
            ->with('success', 'Task deleted successfully');
    }
}

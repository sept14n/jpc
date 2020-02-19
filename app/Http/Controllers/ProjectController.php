<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
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
    public function index()
    {
        $projects = Project::latest()->paginate(10);

        return view('projects.index', compact('projects'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contract_date' => 'required',
        ]);

        Project::create($request->all());

        return redirect()->route('projects.index')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $tasks = Project::find($project->id)->tasks;

        $data = array();
        for ($i = 0; $i < count($tasks); $i++) {
            $start_date = date('Ymdhis', strtotime($tasks[$i]->plan_start_date));
            $start_hour = date('H', strtotime($start_date));
            $start_minute = date('i', strtotime($start_date));
            $start_second = date('s', strtotime($start_date));
            $start_month = date('n', strtotime($start_date));
            $start_day = date('j', strtotime($start_date));
            $start_year = date('Y', strtotime($start_date));

            $end_date = date('Ymdhis', strtotime($tasks[$i]->plan_end_date));
            $end_hour = date('H', strtotime($end_date));
            $end_minute = date('i', strtotime($end_date));
            $end_second = date('s', strtotime($end_date));
            $end_month = date('n', strtotime($end_date));
            $end_day = date('j', strtotime($end_date));
            $end_year = date('Y', strtotime($end_date));

            if ($i > 0) {
                array_push($data, [
                    'id' => $tasks[$i]->id . '',
                    'name' => $tasks[$i]->name,
                    'dependency' => $tasks[$i - 1]->id . '',
                    'start' => mktime($start_hour, $start_minute, $start_second, $start_month, $start_day, $start_year) * 1000,
                    'end' => mktime($end_hour, $end_minute, $end_second, $end_month, $end_day, $end_year) * 1000,
                    'y' => $i,
                ]);
            } else {
                array_push($data, [
                    'id' => $tasks[$i]->id . '',
                    'name' => $tasks[$i]->name,
                    'start' => mktime($start_hour, $start_minute, $start_second, $start_month, $start_day, $start_year) * 1000,
                    'end' => mktime($end_hour, $end_minute, $end_second, $end_month, $end_day, $end_year) * 1000,
                    'y' => $i,
                ]);
            }
        }
        $data = json_encode($data);

        return view('projects.show', compact(['project', 'tasks', 'data']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required',
            'contract_date' => 'required',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index')
            ->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully');
    }
}

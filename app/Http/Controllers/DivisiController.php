<?php

namespace App\Http\Controllers;

use App\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $division = Divisi::paginate(10);

        return view('division.index', compact(['division']))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('division.create');
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
        ]);

        Divisi::create($request->all());    

        return redirect()->route('division.index')
            ->with('success', 'Division created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Divisi  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Divisi $division)
    {
        return view('division.edit', compact('division'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Divisi  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Divisi $division)
    {
        $request->validate([
            'name' => 'required',            
        ]);

        $division->update($request->all());

        return redirect()->route('division.index')
            ->with('success', 'Divisions updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Divisi  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divisi $division)
    {
        $division->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Division deleted successfully');
    }
}

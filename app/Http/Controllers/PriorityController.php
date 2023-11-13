<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $priorities = Priority::orderBy('created_at')->get();
        return view('priorities.index',['priorities' => $priorities]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('priorities.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $priority = new Priority();
        $priority->name = $request->titulo;
        $priority->save();
        return redirect()->route('priorities.index');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Priority $priority)
    {
        return view('priorities.show',['priority'=>$priority]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Priority $priority)
    {
        return view('priorities.edit',['priority'=>$priority]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Priority $priority)
    {
        $priority->name = $request->name;
        $priority->save();
        return view('priorities.show',['priority'=>$priority]);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Priority $priority)
    {
        event(new \App\Events\PriorityDeleted($priority));
    
        $priority->delete();
    
        return redirect()->route('priorities.index');
    }
}

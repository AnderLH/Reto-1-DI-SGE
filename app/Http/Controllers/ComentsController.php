<?php

namespace App\Http\Controllers;

use App\Models\Coment;
use Illuminate\Http\Request;

class ComentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coment = Coment::orderBy('created_at')->get();
        return view('coments.index',['coments' => $coment]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('coments.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $coment = new Coment();
        $coment->name = $request->name;
        $coment->save();
        return redirect()->route('coments.index');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Coment $coment)
    {
        return view('coments.show',['coment'=>$coment]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coment $coment)
    {
        return view('coments.edit',['coment'=>$coment]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coment $coment)
    {
        $coment->name = $request->name;
        $coment->save();
        return redirect()->route('coments.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coment $coment)
    {
        $coment->delete();
        return redirect()->route('coments.index');
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Models\Status;
use App\Models\Priority;
use App\Models\Category;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = Status::orderBy('created_at')->get();
        $incidents = Incident::orderBy('created_at')->get();
        return view('incidents.index', ['incidents' => $incidents,'statuses' => $statuses]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = Status::orderBy('created_at')->get();
        $priorities  = Priority::orderBy('created_at')->get();
        $categories  = Category::orderBy('created_at')->get();
        return view('incidents.create', ['statuses' => $statuses, 'priorities' => $priorities, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage. 
     */
    public function store(Request $request)
    {
        // Obtén el departamento del usuario logueado
        $user = auth()->user();

        // Crear una nueva incidencia con el departamento del usuario logueado
        $incident = new Incident();
        $incident->title = $request->input('title');
        $incident->text = $request->input('text');
        $incident->user_id = auth()->user()->id; // Asigna el ID del usuario actual
        $incident->departament_id = $user->departament->id;
        $incident->status = "3";
        $incident->priority = $request->input('priority');
        $incident->category = $request->input('category');
        $incident->minutes = $request->input('minutes');

        // Guardar la incidencia en la base de datos
        //dd($incident);
        $incident->save();

        // Redirigir a la página de índice de incidencias o a donde desees
        return redirect()->route('incidents.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Incident $incident)
    {
        return view('incidents.show',['incident'=>$incident]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incident $incident)
    {
        return view('incidents.edit',['incident'=>$incident]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incident $incident)
    {
        $incident->title = $request->title;
        $incident->save();
        return redirect()->route('incidents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incident $incident)
    {
        $incident->delete();
        return redirect()->route('incidents.index');
    }
}

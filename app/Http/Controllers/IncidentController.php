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
        $incident = new Incident();

        $incident->title = $request->input('title');
        $incident->text = $request->input('text');
        $incident->user_id = auth()->user()->id;
        $incident->departament_id = auth()->user()->departament_id;
        $incident->status_id = $request->input('status');
        $incident->priority_id = $request->input('priority');
        $incident->category_id = $request->input('category');
        $incident->minutes = $request->input('minutes');
    
        $incident->save();
    
        return redirect()->route('incidents.index');
    }
    
    


    /**
     * Display the specified resource.
     */
    public function show(Incident $incident)
    {
        $incident->load('status', 'priority', 'category');

        return view('incidents.show', ['incident' => $incident]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incident $incident)
    {
        $statuses = Status::orderBy('created_at')->get();
        $priorities  = Priority::orderBy('created_at')->get();
        $categories  = Category::orderBy('created_at')->get();
        return view('incidents.edit', ['incident' => $incident, 'statuses' => $statuses, 'priorities' => $priorities, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incident $incident)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'status' => 'required|string',
            'priority' => 'required|string',
            'category' => 'required|string',
            'minutes' => 'required|integer',
        ]);

        // Actualizar los atributos del incidente
        $incident->title = $validatedData['title'];
        $incident->text = $validatedData['text'];
        $incident->status_id = $validatedData['status'];
        $incident->priority_id = $validatedData['priority'];
        $incident->category_id = $validatedData['category'];
        $incident->minutes = $validatedData['minutes'];

        // Guardar el incidente actualizado en la base de datos
        $incident->save();

        return redirect()->route('incidents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incident $incident)
    {
        $incident->load('comments');
        $incident->delete();
        return redirect()->route('incidents.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departament = Departament::orderBy('created_at')->get();
        return view('departaments.index',['departaments' => $departament]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departaments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $departament = new Departament();
        $departament->name = $request->titulo;
        $departament->save();
        return redirect()->route('departaments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departament $departament)
    {
        return view('departaments.show',['departament'=>$departament]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departament $departament)
    {
        return view('departaments.edit',['departament'=>$departament]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departament $departament)
    {
        $departament->name = $request->name;
        $departament->save();
        return redirect()->route('departaments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departament $departament)
    {
        try {
            // Verificar si hay incidencias asociadas al departamento
            if ($departament->incidents()->exists()) {
                return redirect()->route('departaments.index')->with('error', 'No se puede eliminar el departamento, tiene incidencias asociadas.');
            }
    
            // Si no hay incidencias, proceder con la eliminación
            $departament->delete();
            return redirect()->route('departaments.index')->with('success', 'Departamento eliminado con éxito.');
        } catch (QueryException $e) {
            return redirect()->route('departaments.index')->with('error', 'Error al intentar eliminar el departamento.');
        }
    }
}

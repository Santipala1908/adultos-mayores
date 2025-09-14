<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Senior;
use Illuminate\Support\Facades\Auth;

class SeniorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seniors = Senior::where('user_id', Auth::id())->get();
        return view('seniors.index', compact('seniors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('seniors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'edad' => 'required|integer',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:50',
            'estado_salud' => 'nullable|string|max:255',
        ]);

        Senior::create([
            'user_id' => Auth::id(),
            'nombre' => $request->nombre,
            'edad' => $request->edad,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'estado_salud' => $request->estado_salud,
        ]);

        return redirect()->route('seniors.index')->with('success', 'Adulto mayor registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $senior = Senior::findOrFail($id);
        // Validar que pertenezca al usuario logueado
        if ($senior->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para ver este registro.');
        }

        return view('seniors.show', compact('senior'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $senior = Senior::findOrFail($id);

    if ($senior->user_id !== Auth::id()) {
        abort(403, 'No tienes permiso para editar este registro.');
    }

    return view('seniors.edit', compact('senior'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $senior = Senior::findOrFail($id);
        if ($senior->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para actualizar este registro.');
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'edad' => 'required|integer',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:50',
            'estado_salud' => 'nullable|string|max:255',
        ]);

        $senior->update($request->all());

        return redirect()->route('seniors.index')->with('success', 'Adulto mayor actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $senior = Senior::findOrFail($id);
        if ($senior->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para eliminar este registro.');
        }

        $senior->delete();

        return redirect()->route('seniors.index')->with('success', 'Adulto mayor eliminado correctamente.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Senior;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    /**
     * Mostrar todas las citas registradas por el usuario autenticado.
     */
    public function index()
    {
        $citas = Cita::with('senior')
                     ->where('registrado_por', Auth::id())
                     ->get();

        return view('citas.index', compact('citas'));
    }

    /**
     * Mostrar formulario para crear una nueva cita.
     */
    public function create()
    {
        $seniors = Senior::where('user_id', Auth::id())->get();
        return view('citas.create', compact('seniors'));
    }

    /**
     * Guardar una nueva cita en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'senior_id'   => 'required|exists:seniors,id',
            'titulo'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_hora'  => 'required|date',
            'estado'      => 'required|in:pendiente,completada,cancelada',
        ]);

        Cita::create([
            'senior_id'     => $request->senior_id,
            'registrado_por'=> Auth::id(),
            'titulo'        => $request->titulo,
            'descripcion'   => $request->descripcion,
            'fecha_hora'    => $request->fecha_hora,
            'estado'        => $request->estado,
        ]);

        return redirect()->route('citas.index')->with('success', 'Cita creada correctamente.');
    }

    /**
     * Mostrar una cita específica.
     */
    public function show($id)
    {
        $cita = Cita::with('senior')->findOrFail($id);

        if ($cita->registrado_por !== Auth::id()) {
            abort(403, 'No tienes permiso para ver esta cita.');
        }

        return view('citas.show', compact('cita'));
    }

    /**
     * Mostrar formulario para editar una cita existente.
     */
    public function edit($id)
    {
        $cita = Cita::findOrFail($id);

        if ($cita->registrado_por !== Auth::id()) {
            abort(403, 'No tienes permiso para editar esta cita.');
        }

        $seniors = Senior::where('user_id', Auth::id())->get();

        return view('citas.edit', compact('cita', 'seniors'));
    }

    /**
     * Actualizar una cita en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);

        if ($cita->registrado_por !== Auth::id()) {
            abort(403, 'No tienes permiso para actualizar esta cita.');
        }

        $request->validate([
            'senior_id'   => 'required|exists:seniors,id',
            'titulo'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_hora'  => 'required|date',
            'estado'      => 'required|in:pendiente,completada,cancelada',
        ]);

        $cita->update($request->all());

        return redirect()->route('citas.index')->with('success', 'Cita actualizada correctamente.');
    }

    /**
     * Eliminar una cita de la base de datos.
     */
    public function destroy($id)
    {
        $cita = Cita::findOrFail($id);

        if ($cita->registrado_por !== Auth::id()) {
            abort(403, 'No tienes permiso para eliminar esta cita.');
        }

        $cita->delete();

        return redirect()->route('citas.index')->with('success', 'Cita eliminada correctamente.');
    }
}

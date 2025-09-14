<?php

namespace App\Http\Controllers;

use App\Models\Recordatorios;
use App\Models\Senior;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordatoriosController extends Controller
{
    /**
     * Mostrar todos los recordatorios del usuario.
     */
    public function index()
    {
         // Obtener los IDs de seniors del usuario autenticado
    $seniorsIds = Senior::where('user_id', Auth::id())->pluck('id');

    // Obtener recordatorios con la relación de senior
    $recordatorios = Recordatorios::with('senior')
                                  ->whereIn('senior_id', $seniorsIds)
                                  ->get();

    return view('recordatorios.index', compact('recordatorios'));
    }

    /**
     * Mostrar el formulario para crear un nuevo recordatorio.
     */
    public function create()
    {
        // Solo seniors del usuario autenticado
        $seniors = Senior::where('user_id', Auth::id())->get();

        return view('recordatorios.create', compact('seniors'));
    }

    /**
     * Guardar un nuevo recordatorio.
     */
    public function store(Request $request)
    {
        $request->validate([
            'senior_id' => 'required|exists:seniors,id',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_hora' => 'required|date',
            'estado' => 'required|in:pendiente,completado',
        ]);

        // Validar que el senior pertenece al usuario autenticado
        $senior = Senior::where('id', $request->senior_id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

        // Crear recordatorio
        Recordatorios::create([
            'senior_id' => $request->senior_id,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_hora' => $request->fecha_hora,
            'estado' => $request->estado,
        ]);

        return redirect()->route('recordatorios.index')->with('success', 'Recordatorio creado correctamente.');
    }

    /**
     * Mostrar un recordatorio específico.
     */
    public function show($id)
    {
        $recordatorio = Recordatorios::findOrFail($id);

        // Validar propiedad del usuario
        if ($recordatorio->senior->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para ver este recordatorio.');
        }

        return view('recordatorios.show', compact('recordatorio'));
    }

    /**
     * Mostrar el formulario para editar un recordatorio.
     */
    public function edit($id)
    {
        $recordatorio = Recordatorios::findOrFail($id);

        if ($recordatorio->senior->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar este recordatorio.');
        }

        $seniors = Senior::where('user_id', Auth::id())->get();

        return view('recordatorios.edit', compact('recordatorio', 'seniors'));
    }

    /**
     * Actualizar un recordatorio existente.
     */
    public function update(Request $request, $id)
    {
        $recordatorio = Recordatorios::findOrFail($id);

        if ($recordatorio->senior->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para actualizar este recordatorio.');
        }

        $request->validate([
            'senior_id' => 'required|exists:seniors,id',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_hora' => 'required|date',
            'estado' => 'required|in:pendiente,completado',
        ]);

        // Validar que el nuevo senior pertenece al usuario
        $senior = Senior::where('id', $request->senior_id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

        $recordatorio->update([
            'senior_id' => $request->senior_id,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_hora' => $request->fecha_hora,
            'estado' => $request->estado,
        ]);

        return redirect()->route('recordatorios.index')->with('success', 'Recordatorio actualizado correctamente.');
    }

    /**
     * Eliminar un recordatorio.
     */
    public function destroy($id)
    {
        $recordatorio = Recordatorios::findOrFail($id);

        if ($recordatorio->senior->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para eliminar este recordatorio.');
        }

        $recordatorio->delete();

        return redirect()->route('recordatorios.index')->with('success', 'Recordatorio eliminado correctamente.');
    }
}

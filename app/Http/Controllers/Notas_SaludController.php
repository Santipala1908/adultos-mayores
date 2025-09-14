<?php

namespace App\Http\Controllers;

use App\Models\Notas_Salud;
use App\Models\Senior;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Notas_SaludController extends Controller
{
    public function index()
    {
        // Solo notas de seniors del usuario autenticado
        $seniorsIds = Senior::where('user_id', Auth::id())->pluck('id');
        $notas = Notas_Salud::whereIn('senior_id', $seniorsIds)->get();

        return view('notas-salud.index', compact('notas'));
    }

    public function create()
    {
        $seniors = Senior::where('user_id', Auth::id())->get();
        return view('notas-salud.create', compact('seniors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'senior_id' => 'required|exists:seniors,id',
            'observacion' => 'required|string',
            'fecha_nota' => 'required|date',
        ]);

        Notas_Salud::create([
            'senior_id' => $request->senior_id,
            'registrado_por' => Auth::id(),
            'observacion' => $request->observacion,
            'fecha_nota' => $request->fecha_nota,
        ]);

        return redirect()->route('notas-salud.index')->with('success', 'Nota registrada correctamente.');
    }

    public function show($id)
    {
        $nota = Notas_Salud::findOrFail($id);

        if ($nota->senior->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para ver esta nota.');
        }

        return view('notas-salud.show', compact('nota'));
    }

    public function edit($id)
    {
        $nota = Notas_Salud::findOrFail($id);

        if ($nota->senior->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar esta nota.');
        }

        $seniors = Senior::where('user_id', Auth::id())->get();

        return view('notas-salud.edit', compact('nota', 'seniors'));
    }

    public function update(Request $request, $id)
    {
        $nota = Notas_Salud::findOrFail($id);

        if ($nota->senior->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para actualizar esta nota.');
        }

        $request->validate([
            'senior_id' => 'required|exists:seniors,id',
            'observacion' => 'required|string',
            'fecha_nota' => 'required|date',
        ]);

        $nota->update([
            'senior_id' => $request->senior_id,
            'observacion' => $request->observacion,
            'fecha_nota' => $request->fecha_nota,
        ]);

        return redirect()->route('notas-salud.index')->with('success', 'Nota actualizada correctamente.');
    }

    public function destroy($id)
    {
        $nota = Notas_Salud::findOrFail($id);

        if ($nota->senior->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para eliminar esta nota.');
        }

        $nota->delete();

        return redirect()->route('notas-salud.index')->with('success', 'Nota eliminada correctamente.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Archivo::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('archivo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('archivo')->store('public');
        $archivo = new Archivo();
        $archivo->nombre = $request->file('archivo')->getClientOriginalName();
        $archivo->ruta = $path;
        $archivo->tarea_id = $request->tarea_id;
        $archivo->setCreatedAt(now());
        $archivo->setUpdatedAt(now());
        $archivo->save();
        return response()->json(['message' => 'Archivo subido correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */

    public function show(Archivo $archivo)
    {
        return response()->json($archivo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function edit($archivo)
    {
        $archivos = DB::table('archivos')->where('tarea_id', $archivo)->get();
        return response()->json($archivos);
    }


    public function deleteTarea($tarea_id)
    {
        $archivos = DB::table('archivos')->where('tarea_id', $tarea_id)->get();
        foreach ($archivos as $archivo) {
            $this->destroy($archivo->id);
        }
        return;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy($archivo)
    {
        $archivo = Archivo::find($archivo);
        $file = storage_path('app/') . str_replace('\\', '/', $archivo->ruta);
        if (!file_exists($file)) {
            return response()->json(['message' => 'Archivo no encontrado']);
        }
        unlink($file);
        $archivo->delete();
        return response()->json(['message' => 'Archivo eliminado correctamente']);
    }
}

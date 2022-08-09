<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Ejemplos;
use App\Models\Notas;
use Illuminate\Http\Request;

class Nota extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Notas::all();

        return view('notas', ['data' => $data]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nota' => 'required',
            'titulo' => 'required',
            'id_carpeta' => 'required',
        ]);


        $nota = new Notas;
        $nota->titulo = $request->input('titulo');
        $nota->nota = $request->input('nota');
        $nota->id_carpeta = $request->input('id_carpeta');
        $nota->save();

        return redirect('nota');
    }


    public function edit($id)
    {
        if (isset($id) && Notas::where('id', $id)->exists()) {
            $data = Notas::find($id);
            return view('form.notas-form', ['tema' => $data, 'opcion2' => 'editar']);
        } else {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (isset($id) && Notas::where('id', $id)->exists()) {
            $data = Notas::find($id);

            $ejemplos = Ejemplos::where('id_nota', "=", $id)->get();
            return view('show.view-nota', ['nota' => $data, 'ejemplo' => $ejemplos]);
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (isset($id) && Notas::where('id', $id)->exists()) {
            $nota = Notas::find($id);

            $nota->nota = is_null($request->input('nota')) ? $nota->nota : $request->input('nota');
            $nota->id_carpeta = is_null($request->input('id_carpeta')) ? $nota->id_carpeta : $request->input('id_carpeta');
            $nota->save();
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (isset($id) && Notas::where('id', $id)->exists()) {
            $nota = Notas::find($id);
            $nota->delete();

            return redirect('nota');
        } else {
            abort(404);
        }
    }
}

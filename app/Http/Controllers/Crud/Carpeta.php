<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Carpetas;
use App\Models\Notas;
use Illuminate\Http\Request;
use Illuminate\support\Str;

class Carpeta extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Carpetas::all();

        return view('carpetas', ['data' => $data]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required', 'id_tema' => 'required']);

        $carpeta = new Carpetas;
        $carpeta->nombre = Str::upper($request->input('nombre'));
        $carpeta->id_tema = $request->input('id_tema');
        $carpeta->save();

        return redirect('carpeta');
    }

    public function edit($id)
    {
        if (isset($id) && Carpetas::where('id', $id)->exists()) {
            $tema = Carpetas::find($id);

            return view('form.carpeta-form', ['tema' => $tema, 'opcion2' => 'editar']);
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
        if (isset($id) && Carpetas::where('id', $id)->exists()) {

            $data = Notas::where('id_carpeta', "=", $id)->get();
            $tema =  Carpetas::find($id);
            return view('show.nota-show', ['title' => 'Notas', 'data' => $data, 'tema' => $tema]);
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
        if (isset($id) && Carpetas::where('id', $id)->exists()) {
            $carpeta =  Carpetas::find($id);

            $carpeta->nombre = is_null($request->input('nombre')) ? $carpeta->nombre : Str::upper($request->input('nombre'));
            $carpeta->id_tema = is_null($request->input('id_tema')) ? $carpeta->id_tema : $request->input('id_tema');
            $carpeta->save();

            return redirect('carpeta');
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
        if (isset($id) && Carpetas::where('id', $id)->exists()) {
            $carpeta = Carpetas::find($id);
            $carpeta->delete();
            return redirect('carpeta');
        } else {
            abort(404);
        }
    }
}

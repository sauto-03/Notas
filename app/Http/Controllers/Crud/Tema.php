<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Carpetas;
use App\Models\Temas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\support\Str;

use function PHPUnit\Framework\returnSelf;

class Tema extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Temas::all();

        return view('temas', ['temas' => $data]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required']);

        $tema = new Temas;
        $tema->nombre = Str::upper($request->input('nombre'));
        $tema->save();

        return redirect('temas')->with('exito', 'Tema agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (isset($id) && Temas::where('id', $id)->exists()) {
            $data = Carpetas::where('id_tema', "=", $id)->get();
            $tema = Temas::find($id);
            return view('show.show', ['title' => 'carpetas', 'data' => $data, 'tema' => $tema]);
        } else {
            abort(404);
        }
    }


    public function edit($id)
    {
        if (isset($id) && Temas::where('id', $id)->exists()) {
            $tema = Temas::find($id);

            return view('form.temas-form', ['tema' => $tema, 'opcion2' => 'editar']);
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


        if (isset($id) && Temas::where('id', $id)->exists()) {
            $tema = Temas::find($id);
            $tema->nombre = is_null($request->input('nombre')) ? $tema->nombre : Str::upper($request->input('nombre'));
            $tema->save();

            return redirect('temas');
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
        if (isset($id) && Temas::where('id', $id)->exists()) {
            $tema = Temas::find($id);
            $tema->delete();
            return redirect('temas');
        } else {
            abort(404);
        }
    }
}

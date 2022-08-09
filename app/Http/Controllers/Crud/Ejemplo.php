<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\Ejemplos;
use Illuminate\Http\Request;

class Ejemplo extends Controller
{
    /**
     * Store a newly created resource in storage.
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['ejemplo' => 'required', 'id_nota' => 'required']);

        $ejemplo = new Ejemplos;

        $ejemplo->ejemplo = $request->input('ejemplo');
        $ejemplo->id_nota = $request->input('id_nota');
        $ejemplo->save();

        return redirect('ejemplo');
    }

    /**
     * @param init $id
     */
    public function edit($id)
    {

        if (isset($id) && Ejemplos::where('id', $id)) {
            $ejem = Ejemplos::find($id);

            return view('form.ejemplo-form', ['opcion2' => 'editar', 'ejm' => $ejem]);
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
        if (isset($id) && Ejemplos::where('id', $id)->exists()) {
            $ejemplo = Ejemplos::find($id);
            $ejemplo->ejemplo = is_null($request->input('ejemplo')) ? $ejemplo->ejemplo : $request->input('ejemplo');
            $ejemplo->id_nota = is_null($request->input('id_nota')) ? $ejemplo->id_nota : $request->input('id_nota');
            $ejemplo->save();
            return redirect('ejemplo');
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
        if (isset($id) && Ejemplos::where('id', $id)->exists()) {
            $ejemplo = Ejemplos::find($id);
            $ejemplo->delete();
            return redirect('ejemplo');
        } else {
            abort(404);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Usuario::where('id' , $id)->update([
            'mail' => $request->mail,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'codigo' => $request->codigo,
        ]);
        return  back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Usuario::findOrFail($id)->delete();
        return  back();
    }

    public function analizarTxt(Request $request){
        try {
            DB::beginTransaction();
            $filas=file($request->archivo);

            for($i=0; $i<count($filas); $i++){
                $sql = explode(",",$filas[$i]);
                if ($sql[0] != "" && $sql[3] != ""){
                    Usuario::create([
                        'mail' => $sql[0],
                        'nombre' => $sql[1],
                        'apellido' => $sql[2],
                        'codigo' => $sql[3],
                    ]);
                }
            }
            DB::commit();
            return back();
        }catch (\Exception $exception){
            DB::rollBack();
            throw (new \Exception($exception));
        }
    }
}

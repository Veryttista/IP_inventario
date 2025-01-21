<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\unidades;
use Carbon\Carbon;

class unidadController extends Controller
{
    public function unidad(){
        $lista=DB::table('unidades')
        ->join('ambientes', 'unidades.piso_id', '=', 'ambientes.id')
        ->select('unidades.id','unidades.un_nombre','unidades.piso_id', 'unidades.updated_at','ambientes.am_nombre')
        ->get();
        $ambiente=DB::table('ambientes')
        ->get();
        return view('unidad.unidad',compact('lista','ambiente'));
    }
    public function nuevaUnidad(Request $request){
        $unidad=new unidades();
        $unidad->un_nombre=$request->post('nombre_unidad');
        $unidad->piso_id=$request->post('ambiente');
        $unidad->created_at = Carbon::now();
        $unidad->save();
    }
    public function getunidad(Request $request){
        $unidad=unidades::find($request->post('id'));
        $ambiente=DB::table('ambientes')->get();
        return view('unidad.editunidad',compact('unidad','ambiente'));
    }
    public function editarUnidad(Request $request){
        $unidad=unidades::find($request->post('id'));
        $unidad->un_nombre=$request->post('nombre_unidad1');
        $unidad->piso_id=$request->post('ambiente1');
        $unidad->updated_at = Carbon::now();
        $unidad->save();
    }
}

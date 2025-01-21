<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class posesionesController extends Controller
{
    public function posesion(){
        $lista=DB::table('personal')
        ->leftJoin('computadoras', 'personal.id', '=', 'computadoras.personal_id')
        ->leftJoin('dispositivos', 'personal.id', '=', 'dispositivos.di_personal_id')
        ->leftJoin('unidades', 'personal.unidad_id', '=', 'unidades.id')
        ->select(
            'unidades.un_nombre','personal.id','personal.pe_nombre','personal.pe_paterno','personal.pe_materno','personal.pe_cargo',
            DB::raw('COUNT(DISTINCT computadoras.id) + COUNT(DISTINCT dispositivos.id) as posesiones')
        )
        ->groupBy('unidades.un_nombre','personal.id','personal.pe_nombre','personal.pe_paterno','personal.pe_materno','personal.pe_cargo')
        ->get();
        return view('posesiones.persona',compact('lista'));
    }
    public function posession($id){
        $lista=DB::table('personal')->where('id','=',$id)->get();
        $compus=DB::table('computadoras')->where('personal_id','=',$id)->get();
        $disp=DB::table('dispositivos')->where('di_personal_id','=',$id)->get();
        return view('posesiones.posesion',compact('lista','compus','disp'));
    }
    public function nuevacompu(Request $request){
        DB::table('computadoras')->insert([
            'co_nombre' => $request->post('nombrepc'),
            'co_ip' => $request->post('ippc'),
            'co_pantalla' => $request->post('pantalla'),
            'co_parlante' => $request->post('parlante'),
            'co_teclado' => $request->post('teclado'),
            'co_maus' => $request->post('maus'),
            'co_procesador' => $request->post('procesador'),
            'co_ram' => $request->post('ram'),
            'co_almacenamiento' =>$request->post('almacenamiento'),
            'co_video' => $request->post('video'),
            'co_nic' => $request->post('red'),
            'co_sonido' => $request->post('sonido'),
            'co_targmadre' =>$request->post('madre'),
            'co_fuente' => $request->post('fuente'),
            'personal_id'=> $request->post('dueno'),
        ]);
        
    }
    public function nuevodispo(Request $request){
        DB::table('dispositivos')->insert([
            'di_nombre' => $request->post('nombre'),
            'di_ip' => $request->post('ip'),
            'di_caracteristicas' => $request->post('caracteristicas'),
            'di_personal_id' => $request->post('dueno'),
        ]); 
    }
    public function getpc(Request $request){
        $lista=DB::table('computadoras')->where('id','=',$request->post('id'))->get();
        return view('posesiones.editarpos',compact('lista'));
    } 
    public function geteq(Request $request){
        $lista=DB::table('dispositivos')->where('id','=',$request->post('id'))->get();
        return view('posesiones.editardis',compact('lista'));
    }
    public function editcompu(Request $request){
        DB::table('computadoras')
        ->where('id', $request->post('id'))
        ->update([
            'co_nombre' => $request->post('nombrepc'),
            'co_ip' => $request->post('ippc'),
            'co_pantalla' => $request->post('pantalla'),
            'co_parlante' => $request->post('parlante'),
            'co_teclado' => $request->post('teclado'),
            'co_maus' => $request->post('maus'),
            'co_procesador' => $request->post('procesador'),
            'co_ram' => $request->post('ram'),
            'co_almacenamiento' => $request->post('almacenamiento'),
            'co_video' => $request->post('video'),
            'co_nic' => $request->post('red'),
            'co_sonido' => $request->post('sonido'),
            'co_targmadre' => $request->post('madre'),
            'co_fuente' => $request->post('fuente'),
            'personal_id' => $request->post('dueno'),
            'updated_at' => now() 
        ]); 
    }
    public function editdis(Request $request){
        DB::table('dispositivos')
        ->where('id', $request->post('id'))
        ->update([
            'di_nombre' => $request->post('nombre'),
            'di_ip' => $request->post('ip'),
            'di_caracteristicas' => $request->post('caracteristicas'),
            'updated_at' => now() 
        ]); 
    }
    
}

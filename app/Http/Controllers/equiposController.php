<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class equiposController extends Controller
{
    public function equipos(){
        $compu=DB::table('computadoras')
        ->leftJoin('personal', 'personal.id', '=', 'computadoras.personal_id')
        ->where('computadoras.pe_estado','=','ACTIVO')
        ->select('computadoras.co_nombre','computadoras.co_ip','computadoras.id','personal.pe_cargo')
        ->get();
        $dispo=DB::table('dispositivos')
        ->leftJoin('personal', 'personal.id', '=', 'dispositivos.di_personal_id')
        ->where('dispositivos.di_estado','=','ACTIVO')
        ->select('dispositivos.di_nombre','dispositivos.di_ip','dispositivos.id','personal.pe_cargo')
        ->get();
        $dueno=DB::table('personal')
        ->select('id','pe_nombre','pe_paterno','pe_materno')
        ->get();
        return view('equipos.equipos',compact('compu','dispo','dueno'));
    }
    public function nuevacompus(Request $request){
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
            'personal_id'=> $request->post('duenopc'),
        ]);
    }
    public function nuevodispos(Request $request){
        DB::table('dispositivos')->insert([
            'di_nombre' => $request->post('nombred'),
            'di_ip' => $request->post('ipd'),
            'di_caracteristicas' => $request->post('caracteristicasd'),
            'di_personal_id' => $request->post('duenod'),
        ]); 
    }
    public function getpcs(Request $request){
        $lista=DB::table('computadoras')->where('id','=',$request->post('id'))->get();
        $dueno=DB::table('personal')
        ->select('id','pe_nombre','pe_paterno','pe_materno')
        ->get();
        return view('equipos.editepc',compact('lista','dueno'));
    } 
    public function geteqs(Request $request){
        $lista=DB::table('dispositivos')->where('id','=',$request->post('id'))->get();
        $dueno=DB::table('personal')
        ->select('id','pe_nombre','pe_paterno','pe_materno')
        ->get();
        return view('equipos.editadi',compact('lista','dueno'));
    }
    public function edtcompus(Request $request){
        DB::table('computadoras')
        ->where('id','=',$request->post('idpc'))
        ->update([
            'co_nombre' => $request->post('nombrepcs'),
            'co_ip' => $request->post('ippcs'),
            'co_pantalla' => $request->post('pantallas'),
            'co_parlante' => $request->post('parlantes'),
            'co_teclado' => $request->post('teclados'),
            'co_maus' => $request->post('mauss'),
            'co_procesador' => $request->post('procesadors'),
            'co_ram' => $request->post('rams'),
            'co_almacenamiento' =>$request->post('almacenamientos'),
            'co_video' => $request->post('videos'),
            'co_nic' => $request->post('reds'),
            'co_sonido' => $request->post('sonidos'),
            'co_targmadre' =>$request->post('madres'),
            'co_fuente' => $request->post('fuentes'),
            'personal_id'=> $request->post('duenopcs'),
        ]);
    }
    public function editeq(Request $request){
        DB::table('dispositivos')
        ->where('id', $request->post('ideq'))
        ->update([
            'di_personal_id'=>$request->post('duenodi'),
            'di_nombre' => $request->post('nombredi'),
            'di_ip' => $request->post('ipdi'),
            'di_caracteristicas' => $request->post('caracteristicasdi'),
            'updated_at' => now() 
        ]); 
    } 
    public function getpceye(Request $request){
        $lista= DB::table('computadoras')
        ->leftjoin('personal', 'personal.id', '=', 'computadoras.personal_id')
        ->where('computadoras.id', $request->post('id'))->get();

        return view('equipos.datospc' ,compact('lista'));
    }
    public function geteqeye(Request $request){
        $lista= DB::table('dispositivos')
        ->leftjoin('personal', 'personal.id', '=', 'dispositivos.di_personal_id')
        ->where('dispositivos.id', $request->post('id'))->get();
        return view('equipos.datoseq' ,compact('lista'));
    }
    public function bajapc(Request $request){
        DB::table('computadoras')
        ->where('id','=',$request->post('id'))
        ->update([
            'pe_estado' => 'ELIMINADO'
        ]);
    }
    public function bajaeq(Request $request){
        DB::table('dispositivos')
        ->where('id','=',$request->post('id'))
        ->update([
            'di_estado' => 'ELIMINADO'
        ]);
    }
}

<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\mantenimiento;
use DB;

class mantenimientocontroller extends Controller
{
    public function mante(){
        $personal= DB::table('personal')
            ->get();
        $mantenimientos = DB::table('mantenimientos')
            ->join('personal', 'personal.id', '=', 'mantenimientos.ma_personal')
            ->select('mantenimientos.id','personal.pe_nombre','personal.pe_paterno','personal.pe_materno','personal.pe_cargo','mantenimientos.fecha_hora')
            ->get();
        return view('mantenimiento.mantenimiento',compact('mantenimientos','personal'));
    }
    public function nueman(Request $request){
        $mantenimiento = new mantenimiento;
        $mantenimiento->problema    = $request->post('problema');      
        $mantenimiento->solucion    = $request->post('solucion');
        $mantenimiento->ma_personal = $request->post('id_mante');
        $mantenimiento->fecha_hora  = now();
        $mantenimiento->save();
    }
    public function mandis(Request $request){
        $computadora = dispositivo::find($request->post('dispo'));
        $computadora->mantenimientos()->create([
            'descripcion' => $request->post('descripcion2'),
            'fecha_hora' => now(),
        ]);
    }
    public function getman(Request $request){
        $mantenimiento = mantenimiento::find($request->post('id'));
        $personal= DB::table('personal')
            ->get();
        return view('mantenimiento.editman',compact('mantenimiento','personal'));
    }
    public function editmant(Request $request){
        DB::table('mantenimientos')
        ->where('id','=',$request->post('idman'))
        ->update([
            'problema' => $request->post('problema'),
            'solucion' => $request->post('solucion'),
            'ma_personal' => $request->post('id_mante'),
        ]); 
    }
    public function getmanteni(Request $request){
        $mantenimiento = DB::table('mantenimientos')
            ->where('mantenimientos.id','=',$request->post('id'))
            ->join('personal', 'personal.id', '=', 'mantenimientos.ma_personal')
            ->join('unidades', 'unidades.id', '=', 'personal.unidad_id')
            ->select('unidades.un_nombre','mantenimientos.id','mantenimientos.problema','mantenimientos.solucion','mantenimientos.fecha_hora','personal.pe_nombre','personal.pe_paterno','personal.pe_materno','personal.pe_cargo')
            ->get();
        return view('mantenimiento.verman',compact('mantenimiento'));
    }
    public function delete(Request $request){
        $mantenimiento = mantenimiento::find($request->post('id'));
        $mantenimiento->delete();
    }
}

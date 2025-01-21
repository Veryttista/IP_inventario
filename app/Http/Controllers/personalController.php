<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\personal;
use App\Models\unidades;
use Carbon\Carbon;

class personalController extends Controller
{
    public function personal(){
        $lista=DB::table('unidades')
        ->leftJoin('personal','unidades.id', '=', 'personal.unidad_id') 
        ->leftJoin('ambientes', 'unidades.piso_id', '=', 'ambientes.id')
        ->select('unidades.id','unidades.un_nombre','unidades.piso_id','unidades.updated_at','ambientes.am_nombre',DB::raw('COUNT(personal.id) as miembros')) 
        ->groupBy('unidades.id', 'unidades.un_nombre','unidades.piso_id','unidades.updated_at','ambientes.am_nombre') 
        ->get();
        $ambiente=DB::table('ambientes')
        ->get();
        return view('personal.personal',compact('lista','ambiente'));
    }
    public function person($id){
        $unidad=DB::table('unidades')
            ->where('id','=',$id)
            ->get();
        $lista=DB::table('personal')
            ->leftJoin('computadoras', 'personal.id', '=', 'computadoras.personal_id')
            ->leftJoin('dispositivos', 'personal.id', '=', 'dispositivos.di_personal_id')
            ->select('personal.id','personal.pe_nombre','personal.pe_paterno','personal.pe_materno','personal.pe_cargo',DB::raw('COUNT(DISTINCT computadoras.id) + COUNT(DISTINCT dispositivos.id) as posesiones'))
            ->groupBy('personal.id','personal.pe_nombre','personal.pe_paterno','personal.pe_materno','personal.pe_cargo')
            ->where('personal.unidad_id', '=', $id)
            ->get();
        return view('personal.personas',compact('lista','unidad'));
    }
    public function nuevoPersonal(Request $request){
        $personal= DB::table('personal')
        ->insert([
            'pe_nombre'  => $request->post('nombre'),
            'pe_paterno' => $request->post('paterno'),
            'pe_materno' => $request->post('materno'),
            'pe_cargo'   => $request->post('cargo'),
            'unidad_id'  => $request->post('unidad_id'),
            'created_at' => Carbon::now(),
        ]);   
    }
    public function getpersonal(Request $request){
        $personal= DB::table('personal')
            ->where('id','=',$request->post('id'))
            ->get();;
        return view('personal.editpersonal',compact('personal'));
    }
    public function editPersonal(Request $request){
        $personal= DB::table('personal')
        ->where('id','=',$request->post('id1'))
        ->update([
            'pe_nombre'  => $request->post('nombre1'),
            'pe_paterno' => $request->post('paterno1'),
            'pe_materno' => $request->post('materno1'),
            'pe_cargo'   => $request->post('cargo1'),
            'unidad_id'  => $request->post('unidad_id1'),
            'updated_at' => Carbon::now(),
        ]);  
    }
}

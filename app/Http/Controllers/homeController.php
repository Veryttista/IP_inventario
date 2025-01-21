<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class homeController extends Controller
{
    public function index(){
        $usuarios=DB::table('users')
            ->count();
        $personal=DB::table('personal')
            ->count();
        $mantenimientos=DB::table('mantenimientos')
            ->whereDate('fecha_hora', now())
            ->count();
        $computadoras = DB::table('computadoras')
            ->count();
        $dispositivos = DB::table('dispositivos')
            ->count();
        $equipos = $computadoras + $dispositivos;   
        $mes = DB::table('mantenimientos')
        ->select(DB::raw('MONTH(fecha_hora) as mes'), DB::raw('COUNT(*) as cantidad'))
        ->groupBy(DB::raw('MONTH(fecha_hora)'))
        ->orderBy(DB::raw('MONTH(fecha_hora)'))
        ->get();
        $cantidadmes = [];
        if ($mes->isEmpty()) {
            $cantidadmes =0;
        }else{
            for ($i=0;$i<12;$i++)  {
                if ($mes[0]->mes==($i+1)) {
                $cantidadmes[$i] = $mes[0]->cantidad;  
                }else{
                    $cantidadmes[$i] =0;
                }          
            }
        }
        return view('inicio.home',compact('usuarios','personal','mantenimientos','equipos','cantidadmes'));
    }
}

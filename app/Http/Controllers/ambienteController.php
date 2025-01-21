<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\ambientes;
use Carbon\Carbon;

class ambienteController extends Controller
{
    public function ambiente(){
        $lista=ambientes::all();
        return view('ambiente.ambiente',compact('lista'));
    }
    public function nuevoAmbiente(Request $request){
            $ambiente=new ambientes();
            $ambiente->am_nombre=$request->post('nombre_ambiente');
            $ambiente->created_at = Carbon::now();
            $ambiente->save();

    }
    public function editarambiente(Request $request){
        $ambiente=ambientes::find($request->post('id'));
        return view('ambiente.editambiente',compact('ambiente'));
    }
    public function nuevonAmbiente(Request $request){
        $ambiente=ambientes::find($request->post('id'));
        $ambiente->am_nombre=$request->post('nombre_ambiente1');
        $ambiente->updated_at = Carbon::now();
        $ambiente->save();
    }   
}

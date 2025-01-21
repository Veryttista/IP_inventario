<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
class userController extends Controller
{
    public function user(){
        $usuarios= DB::table('users')
            ->select('id','name','email','created_at')
            ->get();
        return view('user.user',compact('usuarios'));
    }
    public function nueuse(Request $request){
        DB::table('users')
            ->insert([           
                'name' => $request->post('nombre'),
                'email' => $request->post('email'),
                'password' => Hash::make($request->post('clave')),
            ]); 
    }
    public function getuser(Request $request){
        $usuario= DB::table('users')
            ->where('id','=',$request->post('id'))
            ->get();
        return view('user.edit',compact('usuario'));
    }
    public function edituser(Request $request){
        DB::table('users')
        ->where('id','=',$request->post('id'))
        ->update([           
            'name' => $request->post('nombre'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('clave')),
        ]); 
    }
    public function elimuser(Request $request){
        DB::table('users')
        ->where('id','=',$request->post('iddeluser'))
        ->delete(); 
    }
}

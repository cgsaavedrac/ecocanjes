<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class PageController extends Controller
{
    public function pagePeriodo(){
    	$user_id = auth()->user()->id;
    	$mensajes_pendientes = Message::where('user_id', $user_id)->where('read', 0)->count();
    	return view('userapp.periodos-facturacion.index')->with(compact('mensajes_pendientes'));
    }

    public function procesoCanje(){
    	$user_id = auth()->user()->id;
    	$mensajes_pendientes = Message::where('user_id', $user_id)->where('read', 0)->count();
    	return view('userapp.proceso-canje.index')->with(compact('mensajes_pendientes'));
    }

    public function maquinas(){
    	$user_id = auth()->user()->id;
    	$mensajes_pendientes = Message::where('user_id', $user_id)->where('read', 0)->count();
    	return view('userapp.maquinas.index')->with(compact('mensajes_pendientes'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balance;
use App\Message;

class HistoryController extends Controller
{
    public function index(){
	    $user_id = auth()->user()->id;
    	$mensajes_pendientes = Message::where('user_id', $user_id)->where('read', 0)->count();
	    $user_movimientos = Balance::where('user_id', $user_id)->orderby('transaction_date', 'DESC')->paginate(10);
	    return view('userapp.historial.index')->with(compact('user_movimientos', 'mensajes_pendientes')); 
	} 
}

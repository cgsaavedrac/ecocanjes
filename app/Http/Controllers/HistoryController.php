<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balance;

class HistoryController extends Controller
{
    public function index(){
	    $user_id = auth()->user()->id;
	    $user_movimientos = Balance::where('user_id', $user_id)->paginate(15);
	    return view('userapp.historial.index')->with(compact('user_movimientos')); 
	} 
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balance;
use App\Grantee;

class CanjesController extends Controller
{
    public function index(){
		$user_id = auth()->user()->id;
        $user_balance_entradas = Balance::where('movement_type_id','=','1')->where('user_id', '=', $user_id)->sum('mount');
        $user_balance_entradas_admin = Balance::where('movement_type_id','=','3')->where('user_id', '=', $user_id)->sum('mount');
        $user_balance_salidas = Balance::where('movement_type_id','=','2')->where('user_id', '=', $user_id)->sum('mount');
        $user_saldo = ($user_balance_entradas + $user_balance_entradas_admin) - $user_balance_salidas;
        $grantees = Grantee::where('active', 1)->get();
    	return view('userapp.canjes.index')->with(compact('user_saldo', 'grantees'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balance;
use App\Grantee;
use App\Equivalence;
use App\RecyclingRecord;

class CanjesController extends Controller
{
    public function index(){
		$user_id = auth()->user()->id;
		/*$cantidad_reciclada_pet = RecyclingRecord::where('user_id', $user_id)->where('recycling_type', 0)->sum('quantity');
        $cantidad_reciclada_lat = RecyclingRecord::where('user_id', $user_id)->where('recycling_type', 1)->sum('quantity');
		

		$paridad_pet_eco = Equivalence::where('id', '2')->sum('equivalence_factor');
		$paridad_lat_eco = Equivalence::where('id', '5')->sum('equivalence_factor');


		$eco_user_pet = $cantidad_reciclada_pet * $paridad_pet_eco;
		$eco_user_lat = $cantidad_reciclada_lat * $paridad_lat_eco;


		$suma_eco = $eco_user_lat + $eco_user_pet;*/


        $user_balance_entradas = Balance::where('movement_type_id','=','1')->where('user_id', '=', $user_id)->sum('mount');
        $user_balance_entradas_admin = Balance::where('movement_type_id','=','3')->where('user_id', '=', $user_id)->sum('mount');
        $user_balance_salidas = Balance::where('movement_type_id','=','2')->where('user_id', '=', $user_id)->sum('mount');
        $user_saldo = ($user_balance_entradas + $user_balance_entradas_admin) - $user_balance_salidas;
        $grantees = Grantee::where('active', 1)->get();
    	return view('userapp.canjes.index')->with(compact('user_saldo', 'grantees'));
    }
}

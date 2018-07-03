<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RecyclingRecord;
use App\User;
use DB;

class CommunityController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $cantidad_reciclada = RecyclingRecord::where('user_id', $user_id)->sum('quantity');
        //33 botellas es un kilo de pet
        //1 botella = 30 gramos
        
        $kilos_reciclados = (($cantidad_reciclada * 1000) / 33)/1000;

        if($kilos_reciclados >= '0' && $kilos_reciclados <= '4.5'){
        	$nivel = 'Nivel 1';
        }
        if($kilos_reciclados >= '4.5' && $kilos_reciclados <= '30'){
        	$nivel = 'Nivel 2';
        }
        if($kilos_reciclados >= '31' && $kilos_reciclados <= '90'){
        	$nivel = 'Nivel 3';
        }
        if($kilos_reciclados >= '91' && $kilos_reciclados <= '150'){
        	$nivel = 'Nivel 4';
        }
        if($kilos_reciclados > '150'){
        	$nivel = 'Nivel 5';
        }

        $ranking_usuarios = DB::select('select users.name, sum(quantity) as suma_reci, ((sum(quantity) * 1000)/33)/1000 as kilos from users, recycling_records WHERE users.id = recycling_records.user_id and users.admin = '."'0'".' and users.active = '."'1'".' and month(recycling_records.recycling_date) = MONTH(CURDATE()) group by users.name order by kilos desc');
        
        return view('userapp.comunidad.index')->with(compact('cantidad_reciclada', 'kilos_reciclados', 'ranking_usuarios', 'nivel'));
    }
}

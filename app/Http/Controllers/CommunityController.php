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
        $cantidad_reciclada_pet = RecyclingRecord::where('user_id', $user_id)->where('recycling_type', 0)->sum('quantity');
        $cantidad_reciclada_lat = RecyclingRecord::where('user_id', $user_id)->where('recycling_type', 1)->sum('quantity');
        //33 botellas es un kilo de pet
        //1 botella = 30 gramos
        $kilos_reciclados_lat = $cantidad_reciclada_lat / 65;
        $kilos_reciclados_pet = $cantidad_reciclada_pet / 33;
        $kilos_reciclados = number_format($kilos_reciclados_pet + $kilos_reciclados_lat, 0, ',', '.');
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
        $ranking_usuarios = DB::select('select users.name, sum(if(recycling_records.recycling_type = '."'0'".', recycling_records.quantity, 0)) * 1000/33/1000 as kilos_pet, sum(if(recycling_records.recycling_type = '."'1'".', recycling_records.quantity, 0)) * 1000/65/1000 as kilos_lat from users, recycling_records WHERE users.id = recycling_records.user_id and users.admin = '."'0'".' and users.active = '."'1'".' and month(recycling_records.recycling_date) = MONTH(CURDATE()) group by users.name');
        
        return view('userapp.comunidad.index')->with(compact('cantidad_reciclada', 'kilos_reciclados', 'ranking_usuarios', 'nivel'));
    }
}

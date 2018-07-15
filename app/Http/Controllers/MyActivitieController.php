<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RecyclingRecord;

class MyActivitieController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $cantidad_reciclada_pet = RecyclingRecord::where('user_id', $user_id)->where('recycling_type', 0)->sum('quantity');
        $cantidad_reciclada_lat = RecyclingRecord::where('user_id', $user_id)->where('recycling_type', 1)->sum('quantity');
        //33 botellas es un kilo de pet
        //1 botella = 30 gramos

        //65 latas es un kilo
        //1 Kg de aluminio = 6,9965 Kg de bióxido de carbono ahorrado
        $kilos_reciclados_lat = $cantidad_reciclada_lat / 65;

        //1tonelada de aluminio ahorra 91 litros de agua
        $ahorro_agua_aluminio = number_format(($kilos_reciclados_lat / 1000) * 91, 0, ',', '.');


        $ahorro_bioxido_carbono_aluminio = number_format(($kilos_reciclados_lat * 6.9965) / 1, 0, ',', '.');
        //1 Kg de aluminio = 16.0 Kw de energía ahorrada
        $ahorro_energia_aluminio = number_format(($kilos_reciclados_lat * 16) / 1, 0, ',', '.');


        $kilos_reciclados_pet = $cantidad_reciclada_pet / 33;

        $basura_ahorrada = number_format($kilos_reciclados_pet + $kilos_reciclados_lat, 0, ',', '.');
        
        //EQUIVALENCIAS PLASTICOS

        //1 Kg de plástico ahorra 39.26 Lts de agua
        $ahorro_agua_plastico = number_format($kilos_reciclados_pet * 39.26, 0, ',', '.');
        //1 Kg de plástico = 2.506 Kg de bióxido de carbono ahorrado
        $ahorro_bioxido_carbono_plastico = number_format($kilos_reciclados_pet * 2.506, 0, ',', '.');
        //1 Kg de plástico = 5.0286 Kw de energía ahorrada
        $ahorro_energia_plastico = number_format($kilos_reciclados_pet * 5.0286, 0, ',', '.');
        
        return view('userapp.actividad.index')->with(compact('cantidad_reciclada_pet', 'cantidad_reciclada_lat', 'ahorro_agua_plastico', 'ahorro_bioxido_carbono_plastico', 'ahorro_energia_plastico', 'kilos_reciclados_pet', 'kilos_reciclados_lat', 'ahorro_agua_aluminio', 'ahorro_bioxido_carbono_aluminio', 'ahorro_energia_aluminio', 'basura_ahorrada'));
    }    
        
}

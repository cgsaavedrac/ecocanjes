<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balance;
use App\RecyclingRecord;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user_balance_entradas = Balance::where('movement_type_id','=','1')->where('user_id', '=', $user_id)->sum('mount');
        $user_balance_salidas = Balance::where('movement_type_id','=','2')->where('user_id', '=', $user_id)->sum('mount');
        $cantidad_reciclada = RecyclingRecord::where('user_id', $user_id)->count();
        $user_movimientos = Balance::where('user_id', $user_id)->paginate(6);
        //33 botellas es un kilo de pet
        //1 botella = 30 gramos
        $kilos_reciclados = (($cantidad_reciclada * 1000) / 33)/100;
        //EQUIVALENCIAS PLASTICOS

        //1 Kg de plástico ahorra 39.26 Lts de agua
        $ahorro_agua_plastico = number_format($kilos_reciclados * 39.26, 4, ',', '.');
        //1 Kg de plástico = 2.506 Kg de bióxido de carbono ahorrado
        $ahorro_bioxido_carbono_plastico = number_format($kilos_reciclados * 2.506, 4, ',', '.');
        //1 Kg de plástico = 5.0286 Kw de energía ahorrada
        $ahorro_energia_plastico = number_format($kilos_reciclados * 5.0286, 4, ',', '.');
        /*
        echo 'Litros de Agua ahorrada '.$ahorro_agua_plastico.' litros'.'<br>'; 
        echo 'Emisiones de Bioxido de Carbono ahorradas '.$ahorro_bioxido_carbono_plastico.' kilos'.'<br>';
        echo 'Energía ahorrada '.$ahorro_energia_plastico.' Kilowatts/Hora'.'<br>';*/
        

        
        $user_saldo = $user_balance_entradas - $user_balance_salidas;
        return view('home')->with(compact('user_saldo', 'cantidad_reciclada', 'ahorro_agua_plastico', 'ahorro_bioxido_carbono_plastico', 'ahorro_energia_plastico', 'user_movimientos'));
    }
}

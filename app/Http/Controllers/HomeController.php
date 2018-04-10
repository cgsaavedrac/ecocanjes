<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balance;
use App\RecyclingRecord;
use App\MachineLocation;
use App\Exchange;
use App\Equivalence;
use Carbon\Carbon;

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
        $ubicacion_maquinas = MachineLocation::where('active', '1')->paginate(6);
        $user_saldo = $user_balance_entradas - $user_balance_salidas;
        return view('home')->with(compact('user_saldo', 'cantidad_reciclada', 'ahorro_agua_plastico', 'ahorro_bioxido_carbono_plastico', 'ahorro_energia_plastico', 'user_movimientos', 'ubicacion_maquinas'));
    }

     public function canjear_eco(Request $request)
        {
            $user_id = auth()->user()->id;
            $user_balance_entradas = Balance::where('movement_type_id','=','1')->where('user_id', '=', $user_id)->sum('mount');
            $user_balance_salidas = Balance::where('movement_type_id','=','2')->where('user_id', '=', $user_id)->sum('mount');
            $user_saldo = $user_balance_entradas - $user_balance_salidas;

            //validaciones
            $rules = [
                'number_bip' => 'required|min:8',
                'quantity_eco' => 'required',
            ];
            $message = [
                'number_bip.required' => 'Ingrese el número de la tarjeta BIP',
                'number_bip.min' => 'El minimo es 8 caracteres',
                'quantity_eco.required' => 'Debe indicar los ecopesos a canjear'
            ];      

            if ($request->input('quantity_eco') > $user_saldo){
                $mensaje = 'No tiene saldo suficiente';
                return back()->with(compact('mensaje')); 
            }else{
                $mensaje = 'Sus ecopesos serán cargados a su tarjeta BIP, le enviaremos un correo cuando este completada la transacción para que valide su BIP';
                $this->validate($request, $rules, $message);
                $balance = New Balance();
                $balance->movement_type_id = '2';
                $balance->user_id = auth()->user()->id;
                $balance->machine_id = '1';
                $balance->mount = $request->input('quantity_eco');
                $balance->transaction_date = new Carbon();

                $factor_exchange = Equivalence::find(1);
                $fe = $factor_exchange->equivalence_factor;
                $clp = $request->input('quantity_eco')/$fe;

                $exchange = New Exchange();
                $exchange->user_id = auth()->user()->id;
                $exchange->number_bip = $request->input('number_bip');
                $exchange->quantity_eco = $request->input('quantity_eco');
                $exchange->clp = $clp;
                $exchange->transaction_date = new Carbon();


                $balance->save();
                $exchange->save();
                return back()->with(compact('mensaje'));   
                }

            
        }    
}

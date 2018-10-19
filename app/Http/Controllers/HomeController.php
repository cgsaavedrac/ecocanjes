<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balance;
use App\RecyclingRecord;
use App\Exchange;
use App\exchange_grantees;
use App\Equivalence;
use Carbon\Carbon;
use App\Machine;
use App\Banner;
use App\Sale;
use App\User;
use App\Message;
use DB;

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
        if (auth()->user()->admin == 'false'){

            $user_id = auth()->user()->id;
            $user_balance_entradas = Balance::where('movement_type_id','=','1')->where('user_id', '=', $user_id)->sum('mount');
            $user_balance_entradas_admin = Balance::where('movement_type_id','=','3')->where('user_id', '=', $user_id)->sum('mount');
            $banners = Banner::all();
            $banner = Banner::first();
            $user_balance_salidas = Balance::where('movement_type_id','=','2')->where('user_id', '=', $user_id)->sum('mount');
            $cantidad_reciclada = RecyclingRecord::where('user_id', $user_id)->sum('quantity');
            $user_movimientos = Balance::where('user_id', $user_id)->paginate(15);
            //33 botellas es un kilo de pet
            //1 botella = 30 gramos
            $kilos_reciclados = (($cantidad_reciclada * 1000) / 33)/1000;
            //EQUIVALENCIAS PLASTICOS

            //1 Kg de plástico ahorra 39.26 Lts de agua
            $ahorro_agua_plastico = number_format($kilos_reciclados * 39.26, 4, ',', '.');
            //1 Kg de plástico = 2.506 Kg de bióxido de carbono ahorrado
            $ahorro_bioxido_carbono_plastico = number_format($kilos_reciclados * 2.506, 4, ',', '.');
            //1 Kg de plástico = 5.0286 Kw de energía ahorrada
            $ahorro_energia_plastico = number_format($kilos_reciclados * 5.0286, 4, ',', '.');
            $ubicacion_maquinas = Machine::where('active', '1')->paginate(6);
            $user_saldo = ($user_balance_entradas + $user_balance_entradas_admin) - $user_balance_salidas;

            $mensajes_pendientes = Message::where('user_id', $user_id)->where('read', 0)->count();
            return view('home')->with(compact('user_saldo', 'cantidad_reciclada', 'ahorro_agua_plastico', 'ahorro_bioxido_carbono_plastico', 'ahorro_energia_plastico', 'user_movimientos', 'ubicacion_maquinas', 'banners','banner', 'mensajes_pendientes'));
        }
    else{
            $mes_actual = date('F');
            $resumen_comunas = DB::select('SELECT cities.name, SUM(recycling_records.quantity) as cantidad from recycling_records, machines, cities where machines.id = recycling_records.machine_id and machines.city_id = cities.id and monthname(recycling_records.recycling_date) = '."'$mes_actual'".' group by cities.name');
            $resumen_usuarios = DB::select('SELECT users.name, SUM(recycling_records.quantity) as cantidad from recycling_records, users where users.id = recycling_records.user_id  and monthname(recycling_records.recycling_date) = '."'$mes_actual'".' group by users.name');
            $top_ten_usuarios_todo_periodo = DB::select('SELECT users.name, SUM(recycling_records.quantity) as cantidad from recycling_records, users where users.id = recycling_records.user_id  group by users.name order by cantidad DESC LIMIT 10');
            $exchanges = Exchange::where('status', 'Abierto')->orderBy('created_at', 'DESC')->paginate(5);
            $exchange_grantees = exchange_grantees::where('status', 'Abierto')->orderBy('created_at', 'DESC')->paginate(5);
            $cantidad_canjes_bip_pendientes = Exchange::where('status', 'Abierto')->count();
            $cantidad_donaciones_pendientes = exchange_grantees::where('status', 'Abierto')->count();
            $monto_total_canjeado_bip = Exchange::where('status', 'Procesado')->sum('clp');
            $monto_total_donado = exchange_grantees::where('status', 'Procesado')->sum('clp');

            $cantidad_canjes_bip_cobrados = Exchange::where('status', 'Procesado')->sum('clp');
            $cantidad_donaciones_cobrados = exchange_grantees::where('status', 'Procesado')->sum('clp');
            $total_cobrados = $cantidad_canjes_bip_cobrados + $cantidad_donaciones_cobrados;


            $saldo_contable = Balance::where('movement_type_id', '1')->where('status', '1')->sum('mount');
            $saldo_contable_admin = Balance::where('movement_type_id', '3')->where('status', '1')->sum('mount');

            $user_balance_salidas = Balance::where('movement_type_id','=','2')->sum('mount');

            $total_saldo_contable = ($saldo_contable + $saldo_contable_admin) - $user_balance_salidas;

            $cantidad_reciclada_pet = RecyclingRecord::where('recycling_type', 0)->sum('quantity');
            $cantidad_reciclada_lat = RecyclingRecord::where('recycling_type', 1)->sum('quantity');
            $kilos_reciclados_lat = $cantidad_reciclada_lat / 65;
            $kilos_reciclados_pet = $cantidad_reciclada_pet / 33;
            $basura_ahorrada = number_format($kilos_reciclados_pet + $kilos_reciclados_lat, 0, ',', '.');
            $cantidad_vendida = Sale::sum('quantity');
            $monto_vendido = Sale::sum('total_value_received');


            $donado_por_fundaciones = DB::select('SELECT grantees.name, sum(exchange_grantees.clp) as suma_donatario from grantees, exchange_grantees where grantees.id = exchange_grantees.grantee_id and exchange_grantees.status = '."'Procesado'".' group by grantees.name');

            $total_usuarios = User::where('admin', 0)->count();





            return view('home')->with(compact('resumen_comunas', 'resumen_usuarios', 'top_ten_usuarios_todo_periodo', 'exchanges', 'exchange_grantees', 'cantidad_canjes_bip_pendientes', 'cantidad_donaciones_pendientes', 'monto_total_canjeado_bip', 'monto_total_donado', 'donado_por_fundaciones', 'total_saldo_contable', 'total_cobrados', 'basura_ahorrada', 'cantidad_vendida', 'monto_vendido', 'total_usuarios'));   
        }
    }

     public function canjear_eco(Request $request)
        {
            $user_id = auth()->user()->id;
            $user_balance_entradas = Balance::where('movement_type_id','=','1')->where('user_id', '=', $user_id)->sum('mount');
            $user_balance_entradas_admin = Balance::where('movement_type_id','=','3')->where('user_id', '=', $user_id)->sum('mount');
            $user_balance_salidas = Balance::where('movement_type_id','=','2')->where('user_id', '=', $user_id)->sum('mount');
            $user_saldo = ($user_balance_entradas + $user_balance_entradas_admin) - $user_balance_salidas;

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balance;
use App\Grantee;
use App\Equivalence;
use App\RecyclingRecord;
use App\Exchange;
use App\exchange_grantees;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Mail;
USE App\Message;

class CanjesController extends Controller
{
    public function index(){
		$user_id = auth()->user()->id;
        $date = Carbon::now();
        //$quince_mes_siguiente = $date->addMonths(1)->firstOfMonth()->addDays(14);
        $user_balance_entradas_nc = Balance::where('movement_type_id','=','1')->where('user_id', '=', $user_id)->where('status', '0')->sum('mount');
        $user_balance_entradas_admin_nc = Balance::where('movement_type_id','=','3')->where('user_id', '=', $user_id)->where('status', '0')->sum('mount');
        $total_nc = $user_balance_entradas_nc + $user_balance_entradas_admin_nc;
        $saldo_contable_user = Balance::where('movement_type_id', '1')->where('user_id', '=', $user_id)->where('status', '1')->sum('mount');
        $saldo_contable_admin = Balance::where('movement_type_id', '3')->where('user_id', '=', $user_id)->where('status', '1')->sum('mount');

        $user_balance_salidas = Balance::where('movement_type_id','=','2')->where('user_id', '=', $user_id)->sum('mount');

        $total_saldo_contable = ($saldo_contable_user + $saldo_contable_admin) - $user_balance_salidas;

        if ($total_saldo_contable == 0){
            $msg = 'El Saldo para Canjear o Donar debe ser superior a 0';
        }
        else{
            $msg = '';
        }
        if ($total_saldo_contable < 2000){
            $msg = 'El Saldo para Canjear debe ser superior a 2000';
        }
        else{
            $msg = '';
        }
        if ($total_saldo_contable == 0){
            $msg2 = 'El Saldo para Donar debe ser superior a 0';
        }
        else{
            $msg2 = '';
        }

        $mensajes_pendientes = Message::where('user_id', $user_id)->where('read', 0)->count();
        $grantees = Grantee::where('active', 1)->get();
    	return view('userapp.canjes.index')->with(compact('total_nc', 'total_saldo_contable', 'grantees', 'msg', 'msg2', 'mensajes_pendientes'));
    }

    public function confirmed(Request $request){
        $number_bip = $request->number_bip;
        $quantity_eco = $request->quantity_eco;
        $quantity_eco_donar = $request->quantity_eco_donar;
        $grantee_id = $request->grantee_id;
        if($grantee_id){

            $grantee = Grantee::find($grantee_id);
            $grantee_name = $grantee->name;
        } 
        $user_id = auth()->user()->id;   
        $mensajes_pendientes = Message::where('user_id', $user_id)->where('read', 0)->count();
        return view('userapp.canjes.confirmed')->with(compact('number_bip', 'quantity_eco', 'quantity_eco_donar', 'grantee_name', 'grantee_id', 'mensajes_pendientes'));
    }

    public function canjear_eco($number_bip, $quantity_eco, $grantee_id, $quantity_eco_donar){
        $user_id = auth()->user()->id;
        if($number_bip){
            $balance = New Balance();
            $balance->movement_type_id = '2';
            $balance->user_id = auth()->user()->id;
            $balance->mount = $quantity_eco;
            $balance->transaction_date = new Carbon();
            $balance->status = '1';

            $eco_clp = Equivalence::find(1);
            $clp = $eco_clp->equivalence_factor;
            $clp_total = $quantity_eco*$clp;

            $exchange = New Exchange();
            $exchange->user_id = auth()->user()->id;
            $exchange->number_bip = $number_bip;
            $exchange->quantity_eco = $quantity_eco;
            $exchange->clp = $clp_total;
            $exchange->transaction_date = new Carbon();


            $balance->save();
            $exchange->save();
            
            $data = array(
                    'name' => auth()->user()->name,
                );
            Mail::send('emails.canjes', $data, function($message){
            $message->from('admin@pesic.cl', 'App Ecocanjes');
            $email = auth()->user()->email;
            $message->to($email)->subject('Solicitud de Canje desde la APP Ecocanjes');
            });
            $data2 = array(
            'name' => auth()->user()->name,
            'cantidad' => $quantity_eco,
                );

            Mail::send('emails.canjes_admin', $data2, function($message2){
                $message2->from('admin@pesic.cl', 'App Ecocanjes');
                $correos = User::where('active', 1)->where('admin', 1)->get();
                foreach($correos as $correo){
                    $message2->to($correo->email)->subject('Solicitud de canje desde la APP Ecocanjes');
                }
                
            });
            $user_id = auth()->user()->id;
            $mensajes_pendientes = Message::where('user_id', $user_id)->where('read', 0)->count();
            return view('userapp.canjes.result_transaction')->with(compact('mensajes_pendientes'));            
        }
        else{
            $balance = New Balance();
            $balance->movement_type_id = '2';
            $balance->user_id = auth()->user()->id;
            $balance->mount = $quantity_eco_donar;
            $balance->transaction_date = new Carbon();
            $balance->status = '1';

            $eco_clp = Equivalence::find(1);
            $clp = $eco_clp->equivalence_factor;
            $clp_total = $quantity_eco_donar*$clp;

            $exchange = New exchange_grantees();
            $exchange->user_id = auth()->user()->id;
            $exchange->grantee_id = $grantee_id;
            $exchange->quantity_eco = $quantity_eco_donar;
            $exchange->clp = $clp_total;
            $exchange->transaction_date = new Carbon();


            $balance->save();
            $exchange->save();
            
            $data = array(
                    'name' => auth()->user()->name,
                );
            Mail::send('emails.canjes', $data, function($message){
            $message->from('admin@pesic.cl', 'App Ecocanjes');
            $email = auth()->user()->email;
            $message->to($email)->subject('Solicitud de Canje desde la APP Ecocanjes');
            });
            $data2 = array(
            'name' => auth()->user()->name,
            'cantidad' => $quantity_eco_donar,
                );

            Mail::send('emails.canjes_admin', $data2, function($message2){
                $message2->from('admin@pesic.cl', 'App Ecocanjes');
                $correos = User::where('active', 1)->where('admin', 1)->get();
                foreach($correos as $correo){
                    $message2->to($correo->email)->subject('Solicitud de canje desde la APP Ecocanjes');
                }
                
            });
            $user_id = auth()->user()->id;
            $mensajes_pendientes = Message::where('user_id', $user_id)->where('read', 0)->count();
            return view('userapp.canjes.result_transaction')->with(compact('mensajes_pendientes'));  
        }
        
          
    }    
}

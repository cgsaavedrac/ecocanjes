<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Balance;
use App\User;
use DB;
use Carbon\Carbon;

class ChargeController extends Controller
{
    public function index()
    {
        $users = User::where('active', 1)->where('admin', 0)->paginate(10);        
        return view('admin.charge.index')->with(compact('users'));   
    }

    public function edit($id)
    {
        $user = User::find($id);
        $user_id = $user->id;
        $user_balance_entradas = Balance::where('movement_type_id','=','1')->where('user_id', '=', $user_id)->sum('mount');
        $user_balance_entradas_admin = Balance::where('movement_type_id','=','3')->where('user_id', '=', $user_id)->sum('mount');
        $user_balance_salidas = Balance::where('movement_type_id','=','2')->where('user_id', '=', $user_id)->sum('mount');
        $user_saldo = ($user_balance_entradas + $user_balance_entradas_admin) - $user_balance_salidas;
        return view('admin.charge.edit')->with(compact('user', 'user_saldo'));
    }

public function update(Request $request, $id)
    {
    $balance = New Balance();
    $balance->movement_type_id = '3';
    $balance->user_id = $id;
    $balance->mount = $request->input('quantity_eco');
    $balance->transaction_date = new Carbon();
    $balance->save();
    return back(); 
    }  
}

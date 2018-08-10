<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exchange;
use App\exchange_grantees;
use App\Balance;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exchanges = Exchange::where('status', 'Abierto')->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.exchange.index')->with(compact('exchanges'));
    }

    public function donaciones()
    {
        $exchanges = exchange_grantees::where('status', 'Abierto')->orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.exchange.donaciones')->with(compact('exchanges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function changeStatus($id){
        $exchange = Exchange::find($id);
        $exchange->status = 'Procesado';
        $exchange->save();

        /*$balance = New Balance();
        $balance->movement_type_id = 2;
        $balance->user_id = $exchange->user_id;
        $balance->mount = $exchange->quantity_eco;
        $fecha = Carbon::now();
        $balance->transaction_date = $fecha;
        $balance->created_at = $fecha;
        $balance->updated_at = $fecha;
        $balance->status = 1;
        $balance->save();*/
        
        return back();
    }

    public function changeStatusGrantee($id){
        $exchange = exchange_grantees::find($id);
        $exchange->status = 'Procesado';
        $exchange->save();


        /*$balance = New Balance();
        $balance->movement_type_id = 2;
        $balance->user_id = $exchange->user_id;
        $balance->mount = $exchange->quantity_eco;
        $fecha = Carbon::now();
        $balance->transaction_date = $fecha;
        $balance->created_at = $fecha;
        $balance->updated_at = $fecha;
        $balance->status = 1;
        $balance->save();*/


        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function excelCanje(){
        Excel::create('Solicitudes Cargas BIP Pendientes', function($excel){
            $excel->sheet('Datos', function($sheet){
                //Header
                $sheet->row(2, ['ID', 'Usuario Beneficiado', 'Correo', 'Tarjeta Bip', 'Eco puntos', 'Pesos Chilenos', 'Fecha', 'Estado Solicitud']);
                //Data
                $cargas_bip = Exchange::where('status', 'Abierto')->orderby('updated_at', 'DESC')->get();
                foreach($cargas_bip as $cargas){
                    $row = [];
                    $row[0] = $cargas->id;
                    $row[1] = $cargas->user->name;
                    $row[2] = $cargas->user->email;
                    $row[3] = $cargas->number_bip;
                    $row[4] = $cargas->quantity_eco;
                    $row[5] = $cargas->clp;
                    $row[6] = $cargas->transaction_date;
                    $row[7] = $cargas->status;
                    $sheet->appendRow($row);
                }
            });
        })->export('xls');
    }

    public function excelDonaciones(){
        Excel::create('Donaciones', function($excel){
            $excel->sheet('Datos', function($sheet){
                //Header
                $sheet->row(2, ['ID', 'Usuario Beneficiado', 'Correo', 'Fundación', 'Eco puntos', 'Pesos Chilenos', 'Fecha', 'Estado Solicitud']);
                //Data
                $cargas_bip = exchange_grantees::where('status', 'Abierto')->orderby('updated_at', 'DESC')->get();
                foreach($cargas_bip as $cargas){
                    $row = [];
                    $row[0] = $cargas->id;
                    $row[1] = $cargas->user->name;
                    $row[2] = $cargas->user->email;
                    $row[3] = $cargas->grantee->name;
                    $row[4] = $cargas->quantity_eco;
                    $row[5] = $cargas->clp;
                    $row[6] = $cargas->transaction_date;
                    $row[7] = $cargas->status;
                    $sheet->appendRow($row);
                }
            });
        })->export('xls');
    }
}

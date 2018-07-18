<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exchange;
use App\exchange_grantees;

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
        return back();
    }

    public function changeStatusGrantee($id){
        $exchange = exchange_grantees::find($id);
        $exchange->status = 'Procesado';
        $exchange->save();
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
}

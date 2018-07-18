<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Sale;
use Carbon\Carbon;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::orderBy('sale_date', 'DESC')->paginate(10);    
        return view('admin.sale.index')->with(compact('sales'));
    }

    public function create()
    {
        return view('admin.sale.create');
    }

    public function store(Request $request)
    {
        $sale = New Sale();
        $sale->user_id = auth()->user()->id;
        $sale->buyer = $request->input('buyer');
        $sale->material_type = $request->input('material_type');
        $sale->quantity = $request->input('quantity');
        $sale->unit_value = $request->input('unit_value');
        $sale->total_value_received = $request->input('total_value_received');
        $sale->bill_number = $request->input('bill_number');
        $sale->comment = $request->input('comment');
        $sale->sale_date = $request->input('sale_date');
        $sale->save();
        return redirect('admin/sale');
    }

    
    public function edit($id)
    {
        $sale = Sale::find($id);

        //dd($sale->sale_date);

        $input  = $sale->sale_date;
        $format = "Y-m-d";

        $sale_date_format = Carbon::parse($input)->format('Y-m-d');

        //$date = Carbon::createFromFormat($format, $input);
        //dd($date);

        return view('admin.sale.edit')->with(compact('sale', 'sale_date_format'));
    }

    public function update(Request $request, $id){
        $sale = Sale::find($id);
        $sale->user_id = auth()->user()->id;
        $sale->buyer = $request->input('buyer');
        $sale->material_type = $request->input('material_type');
        $sale->quantity = $request->input('quantity');
        $sale->unit_value = $request->input('unit_value');
        $sale->total_value_received = $request->input('total_value_received');
        $sale->bill_number = $request->input('bill_number');
        $sale->comment = $request->input('comment');
        $sale->sale_date = $request->input('sale_date');
        $sale->save();
        return redirect('admin/sale');
    }

    public function destroy($id){       
        $sale = Sale::find($id);
        $sale->delete();
        return back();
    }
}

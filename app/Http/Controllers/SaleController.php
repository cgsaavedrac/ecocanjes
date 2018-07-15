<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Sale;

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
}

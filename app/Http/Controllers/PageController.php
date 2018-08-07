<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function pagePeriodo(){
    	return view('userapp.periodos-facturacion.index');
    }

    public function procesoCanje(){
    	return view('userapp.proceso-canje.index');
    }

    public function maquinas(){
    	return view('userapp.maquinas.index');
    }
}

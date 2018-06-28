<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ranking;

class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rankings = Ranking::all();
        return view('admin.ranking.index')->with(compact('rankings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ranking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rango = Ranking::where('from', $request->input('from'))->where('to', $request->input('to'))->count();
        if ($rango == 1){
            $rules = [
            'msg' => 'required'
        ];
        $message = [
            'msg.required' => 'El rango ingresado ya existe en nuestra base de datos, intente con otro que sea superior o inferior al último rango ingresado.'

        ];      
            $this->validate($request, $rules, $message);
        }else{
            //validaciones
            $rules = [
                'name' => 'required|string|min:4|unique:rankings',
                'from' => 'required|numeric|min:3|unique:rankings',
                'to' => 'required|numeric|min:3|unique:rankings',
            ];
            $message = [
                'name.required' => 'Ingrese el nombre del Nivel',
                'name.min' => 'El minimo es de 6 caracteres',
                'name.unique' => 'El nombre del nivel ya existe, intente con otro.',
                'from.required' => 'Ingrese las unidades Desde',
                'from.numeric' => 'Debe ser un número',
                'from.min' => 'Debe ser un número de minimo 3 digitos',
                'from.unique' => 'La cantidad que esta intentando ingresar ya existe',
                'to.required' => 'Ingrese las unidades Hasta',
                'to.numeric' => 'Debe ser un número',
                'to.min' => 'Debe ser un número de minimo 3 digitos',
                'to.unique' => 'La cantidad que esta intentando ingresar ya existe'

            ];      

            $this->validate($request, $rules, $message);

            $ranking = New Ranking();
            $ranking->name = $request->input('name');
            $ranking->from = $request->input('from');
            $ranking->to = $request->input('to');
            $ranking->save();
            return redirect('admin/ranking');
        }
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
        $ranking = Ranking::find($id);
        return view('admin.ranking.edit')->with(compact('ranking'));
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
        $ranking = Ranking::where('name', $request->name)->get();
        foreach ($ranking as $rk){
            $name_db = $rk->name;
        
            if ($name_db == $request->name){
                //validaciones
                $rules = [
                'name' => 'required|string|min:4',
                'from' => 'required|numeric|min:3',
                'to' => 'required|numeric|min:3',
                ];
                $message = [
                    'name.required' => 'Ingrese el nombre del Nivel',
                    'name.min' => 'El minimo es de 6 caracteres',
                    'from.required' => 'Ingrese las unidades Desde',
                    'from.numeric' => 'Debe ser un número',
                    'from.min' => 'Debe ser un número de minimo 3 digitos',
                    'to.required' => 'Ingrese las unidades Hasta',
                    'to.numeric' => 'Debe ser un número',
                    'to.min' => 'Debe ser un número de minimo 3 digitos'
                ];
                $this->validate($request, $rules, $message);
                $ranking = Ranking::find($id);
                $ranking->name = $request->input('name');
                $ranking->from = $request->input('from');
                $ranking->to = $request->input('to');
                $ranking->save();
                return redirect('admin/ranking');
            }
        }
        //validaciones
        $rules = [
            'name' => 'required|string|min:4|unique:rankings',
            'from' => 'required|numeric|min:3',
            'to' => 'required|numeric|min:3',
        ];
        $message = [
            'name.required' => 'Ingrese el nombre del Nivel',
            'name.min' => 'El minimo es de 6 caracteres',
            'name.unique' => 'El nombre del nivel ya existe, intente con otro.',
            'from.required' => 'Ingrese las unidades Desde',
            'from.numeric' => 'Debe ser un número',
            'from.min' => 'Debe ser un número de minimo 3 digitos',
            'to.required' => 'Ingrese las unidades Hasta',
            'to.numeric' => 'Debe ser un número',
            'to.min' => 'Debe ser un número de minimo 3 digitos'
        ];   

        $this->validate($request, $rules, $message);

                $ranking = Ranking::find($id);
                $ranking->name = $request->input('name');
                $ranking->from = $request->input('from');
                $ranking->to = $request->input('to');
                $ranking->save();
                return redirect('admin/ranking');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {      
        $ranking = Ranking::find($id);
        $ranking->delete();
        return back();
    }
}

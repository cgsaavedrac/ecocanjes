<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Machine;
use App\Region;
use App\City;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machines = Machine::where('active', 1)->orderBy('id', 'DESC')->paginate(10);
        return view('admin.machine.index')->with(compact('machines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::where('active', '1')->orderBy('name')->get();
        $regions_combo = Region::pluck('name', 'id');
        //return view('admin.deal.create')->with(compact('companies', 'companies_combo'));
        return view('admin.machine.create')->with(compact('regions', 'regions_combo'));

    }

    public function getCity(Request $request, $id){
        if ($request->ajax()){
            $cities = City::cities($id);
            return response()->json($cities);
        }
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validaciones
        $rules = [
            'terminal_number' => 'required|min:3',
            'region' => 'required',
            'city' => 'required',
            'address' => 'required|min:3',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'terminal_number' => 'unique:machines,terminal_number'
        ];
        $message = [
            'terminal_number.required' => 'Ingrese el número de la Maquina',
            'terminal_number.min' => 'El minimo es 3 caracteres',
            'terminal_number.unique' => 'El número de la maquina ya existe',
            'region.required' => 'Indique la Región',
            'city.required' => 'Indique la Comuna',
            'address.required' => 'Indique la Dirección',
            'address.min' => 'La dirección debe contener al menos 3 caracteres.',
            'latitude.required' => 'Indique la Latitud',
            'latitude.numeric' => 'La latitud sólo acepta números',
            'longitude.required' => 'Indique la Longitud',
            'longitude.numeric' => 'La longitud sólo acepta números'
        ];      

        $this->validate($request, $rules, $message);

        $machine = New Machine();
        $machine->terminal_number = $request->input('terminal_number');
        $machine->latitude = $request->input('latitude');
        $machine->longitude = $request->input('longitude');
        $machine->address = $request->input('address');
        $machine->region_id = $request->input('region');
        $machine->city_id = $request->input('city');
        $machine->save();
        return redirect('admin/machine');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $machine = Machine::find($id);
        $machine->active = false;
        $machine->save();
        return back();
    }
}

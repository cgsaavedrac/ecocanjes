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
    public function index(Request $request)
    {
        $machines = Machine::search($request->name)->where('active', 1)->orderBy('id', 'DESC')->paginate(10);
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
            'days_attention' => 'required',
            'hours_attention' => 'required',
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
            'longitude.numeric' => 'La longitud sólo acepta números',
            'days_attention.required' => 'Indique los días de atentión',
            'hours_attention.required' => 'Indique las horas de atención'
        ];      

        $this->validate($request, $rules, $message);

        $machine = New Machine();
        $machine->terminal_number = $request->input('terminal_number');
        $machine->latitude = $request->input('latitude');
        $machine->longitude = $request->input('longitude');
        $machine->address = $request->input('address');
        $machine->region_id = $request->input('region');
        $machine->city_id = $request->input('city');
        $machine->days_attention = $request->input('days_attention');
        $machine->hours_attention = $request->input('hours_attention');
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
        $regions = Region::where('active', '1')->orderBy('name')->get();
        $regions_combo = Region::pluck('name', 'id');

        $machine = Machine::find($id);
        return view('admin.machine.edit')->with(compact('machine', 'regions', 'regions_combo'));
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
        
        $machine = Machine::where('id', $id)->get();
        foreach ($machine as $mac){
            $terminal_number_db = $mac->terminal_number;
        }



        if ($terminal_number_db == $request->terminal_number){
            //validaciones
            $rules = [
            
                'region' => 'required',
                'city' => 'required',
                'address' => 'required|min:3',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'days_attention' => 'required',
                'hours_attention' => 'required',
                
            ];
            $message = [
                
                
                'region.required' => 'Indique la Región',
                'city.required' => 'Indique la Comuna',
                'address.required' => 'Indique la Dirección',
                'address.min' => 'La dirección debe contener al menos 3 caracteres.',
                'latitude.required' => 'Indique la Latitud',
                'latitude.numeric' => 'La latitud sólo acepta números',
                'longitude.required' => 'Indique la Longitud',
                'longitude.numeric' => 'La longitud sólo acepta números',
                'days_attention.required' => 'Indique los días de atentión',
                'hours_attention.required' => 'Indique las horas de atención'
            ];      

            $this->validate($request, $rules, $message);

            $machine = Machine::find($id);
            $machine->latitude = $request->input('latitude');
            $machine->longitude = $request->input('longitude');
            $machine->address = $request->input('address');
            $machine->region_id = $request->input('region');
            $machine->city_id = $request->input('city');    
            $machine->days_attention = $request->input('days_attention');
            $machine->hours_attention = $request->input('hours_attention');
            $machine->save();
            return redirect('admin/machine');
        }else{
            //validaciones
            $rules = [
                'terminal_number' => 'required|min:3',
                'region' => 'required',
                'city' => 'required',
                'address' => 'required|min:3',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'days_attention' => 'required',
                'hours_attention' => 'required',
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
                'longitude.numeric' => 'La longitud sólo acepta números',
                'days_attention.required' => 'Indique los días de atentión',
                'hours_attention.required' => 'Indique las horas de atención'
            ];      

            $this->validate($request, $rules, $message);

            $machine = Machine::find($id);
            $machine->terminal_number = $request->input('terminal_number');
            $machine->latitude = $request->input('latitude');
            $machine->longitude = $request->input('longitude');
            $machine->address = $request->input('address');
            $machine->region_id = $request->input('region');
            $machine->city_id = $request->input('city');
            $machine->days_attention = $request->input('days_attention');
            $machine->hours_attention = $request->input('hours_attention');
            $machine->save();
            return redirect('admin/machine');    
        }    
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

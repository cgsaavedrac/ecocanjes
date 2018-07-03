<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grantee;

class GranteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grantees = Grantee::where('active', 1)->orderBy('id', 'DESC')->paginate(10);
        return view('admin.grantee.index')->with(compact('grantees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.grantee.create');
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
            'name' => 'required|string|max:255|unique:grantees',
        ];
        $message = [
            'name.required' => 'Ingrese el nombre del donatario',
            'name.max' => 'El máximo es de 255 caracteres',
            'name.unique' => 'Este donatario ya existe'
        ];      

        $this->validate($request, $rules, $message);

        $grantee = New Grantee();
        $grantee->name = $request->input('name');
        $grantee->save();
        return redirect('admin/grantee');
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
        $grantee = Grantee::find($id);
        return view('admin.grantee.edit')->with(compact('grantee'));
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
        $grantee = Grantee::where('name', $request->name)->get();
        foreach ($grantee as $g){
            $name_db = $g->name;
        
            if ($name_db == $request->name){

                //validaciones
                $rules = [
                'name' => 'required|string|max:255|unique:grantees',
                ];
                $message = [
                    'name.required' => 'Ingrese el nombre del donatario',
                    'name.max' => 'El máximo es de 255 caracteres',
                    'name.unique' => 'Este donatario ya existe'
                ];

                $this->validate($request, $rules, $message);

                return redirect('admin/grantee');
            }
        }


        //validaciones
        $rules = [
        'name' => 'required|string|max:255|unique:grantees',
        ];
        $message = [
            'name.required' => 'Ingrese el nombre del donatario',
            'name.max' => 'El máximo es de 255 caracteres',
            'name.unique' => 'Este donatario ya existe'
        ];

        $this->validate($request, $rules, $message);

                $grantee = Grantee::find($id);
                $grantee->name = $request->input('name');
                $grantee->save();
                return redirect('admin/grantee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grantee = Grantee::find($id);
        $grantee->active = false;
        $grantee->save();
        return back();
    }
}

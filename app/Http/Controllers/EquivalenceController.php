<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equivalence;

class EquivalenceController extends Controller
{
    public function index(){
    $equivalences = Equivalence::where('active', 1)->orderBy('id', 'DESC')->paginate(10);
    return view('admin.equivalence.index')->with(compact('equivalences'));	
    }

    public function index2(){
    $equivalences = Equivalence::where('active', 1)->orderBy('id', 'DESC')->paginate(10);
    return view('userapp.equivalence.index')->with(compact('equivalences'));  
    }

    public function edit($id)
    {
        $equivalence = Equivalence::find($id);
        return view('admin.equivalence.edit')->with(compact('equivalence'));
    }

    public function update(Request $request, $id)
    {
        //validaciones
        $rules = [
            'equivalence_factor' => 'required|numeric|min:1',
        ];
        $message = [
            'equivalence_factor.required' => 'Ingrese el factor de equivalencia',
            'equivalence_factor.min' => 'El minimo es 1',
        ]; 

        $this->validate($request, $rules, $message);

            $equivalence = Equivalence::find($id);
            $equivalence->equivalence_factor = $request->input('equivalence_factor');
            $equivalence->save();
            return redirect('admin/equivalence');
    }
    
}

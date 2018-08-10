<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use App\Region;
Use App\City;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(auth()->user()->rol == 'sadmin'){
            $users = User::search($request->name)->where('active', 1)->orderBy('id', 'DESC')->paginate(10);  
        }else{
            $users = User::search($request->name)->where('active', 1)->where('admin', '0')->orderBy('id', 'DESC')->paginate(10);    
        }
        return view('admin.user.index')->with(compact('users'));
    }

    public function getPerfil(){
        $regions = Region::where('active', '1')->orderBy('name')->get();
        $regions_combo = Region::pluck('name', 'id');

        $id = auth()->user()->id;
        $user = User::find($id);
        return view('userapp.perfil.create')->with(compact('user', 'regions', 'regions_combo'));
    }
    public function getCity(Request $request, $id){
        if ($request->ajax()){
            $cities = City::cities($id);
            return response()->json($cities);
        }
    }

    public function actPerfil(Request $request)
    {      
        
        //validaciones
        $rules = [
            'birth_date' => 'required',
            'sexo' => 'required',
            'region2' => 'required',
            'city2' => 'required',
        ];
        $message = [
            'birth_date.required' => 'Indique su fecha de nacimiento',
            'sexo.required' => 'Indique su sexo',
            'region2.required' => 'Indique su región.',
            'city2.required' => 'Indique su comuna',
        ];      

        $this->validate($request, $rules, $message);

        $id = auth()->user()->id;
        $user = User::find($id);
        $user->birth_date = $request->input('birth_date');
        $user->sexo = $request->input('sexo');
        $user->region_id = $request->input('region2');
        $user->city_id = $request->input('city2');
        $user->save();
        return view('userapp/perfil/msn');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
        $message = [
            'name.required' => 'Ingrese el nombre del Usuario',
            'name.max' => 'El máximo es de 255 caracteres',
            'email.required' => 'Ingrese el Correo del Usuario, el cual sera su nombre de usuario.',
            'email.unique' => 'Este correo ya estas siendo usado'
        ];      

        $this->validate($request, $rules, $message);

        $user = New User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect('admin/user');
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
        $user = User::find($id);
        return view('admin.user.edit')->with(compact('user'));
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
        
        $user = User::where('email', $request->email)->get();
        foreach ($user as $us){
            $email_db = $us->email;
        
            if ($email_db == $request->email){

                //validaciones
                if ($request->password == ''){
                   $rules = [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255',
                    'admin' => 'required'
                    ];
                    $message = [
                        'name.required' => 'Ingrese el nombre del Usuario',
                        'name.max' => 'El máximo es de 255 caracteres',
                        'email.required' => 'Ingrese el Correo del Usuario, el cual sera su nombre de usuario.',
                        'admin.required' => 'Debe indicar el perfil del usuario.'
                    ];  
                }
                else{
                    $rules = [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255',
                    'admin' => 'required',
                    'password' => 'required|string|min:6|confirmed'
                    ];
                    $message = [
                        'name.required' => 'Ingrese el nombre del Usuario',
                        'name.max' => 'El máximo es de 255 caracteres',
                        'email.required' => 'Ingrese el Correo del Usuario, el cual sera su nombre de usuario.',
                        'admin.required' => 'Debe indicar el perfil del usuario.'
                    ];
                }
                

                $this->validate($request, $rules, $message);

                $user = User::find($id);
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                if ($request->password != ''){
                    $user->password = bcrypt($request->input('password'));    
                }
                $user->admin = $request->input('admin');
                $user->save();
                return redirect('admin/user');
            }
        }


        //validaciones
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'admin' => 'required',
            'password' => 'required|string|min:6|confirmed'
        ];
        $message = [
            'name.required' => 'Ingrese el nombre del Usuario',
            'name.max' => 'El máximo es de 255 caracteres',
            'email.required' => 'Ingrese el Correo del Usuario, el cual sera su nombre de usuario.',
            'admin.required' => 'Debe indicar el perfil del usuario.',
            'email.unique' => 'Este correo ya estas siendo usado'
        ]; 

        $this->validate($request, $rules, $message);

                $user = User::find($id);
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->password = bcrypt($request->input('password'));
                $user->admin = $request->input('admin');
                $user->save();
                return redirect('admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){       
        //dd($id);
        $user = User::find($id);
        $user->active = false;
        $user->save();
        return back();
    }

    public function redirect_reset_pass(){
        return view('admin.user.msn');
    }  

    public function excelUser(){
        Excel::create('Usuarios del Sistema', function($excel){
            $excel->sheet('Datos', function($sheet){
                //Header
                $sheet->row(2, ['ID', 'Nombre', 'Correo', 'Fecha nacimiento', 'Región', 'Comuna', 'Fecha registro', 'Tipo Usuario']);
                //Data
                $users = User::where('active', '1')->orderby('created_at', 'DESC')->get();
                foreach($users as $user){
                    $row = [];
                    $row[0] = $user->id;
                    $row[1] = $user->name;
                    $row[2] = $user->email;
                    $row[3] = $user->birth_date;
                    if ($user->region_id == null){
                        $row[4] = '';  
                    }else{
                        $row[4] = $user->region->name;  
                    }
                    if ($user->city_id == null){
                        $row[6] = '';
                    }else{
                       $row[6] = $user->city->name; 
                    }
                    
                    $row[7] = $user->created_at;
                    if ($user->admin == 1){
                        $row[8] = 'Administrador';
                    }
                    if ($user->admin == 0){
                        $row[8] = 'Usuario APP';
                    }
                    

                    $sheet->appendRow($row);
                }
            });
        })->export('xls');
    }
}

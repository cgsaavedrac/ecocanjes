<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
    	$id = auth()->user()->id;
        $user = User::find($id);
    	return view('userapp.contacto.create')->with(compact('user'));
    }

    public function contactmail(Request $request)
    {
        $data = array(
        	'name' => auth()->user()->name,
        	'motivo' => $request->input('motivo'),
        	'comentarios' => $request->input('comentarios'),
        	'wsp' => $request->input('wsp'),
        );

        Mail::send('emails.contacto', $data, function($message){
        	$message->from('admin@pesic.cl', 'App Ecocanjes');
        	$correos = User::where('active', 1)->where('admin', 1)->get();
        	foreach($correos as $correo){
        		$message->to($correo->email)->subject('Nuevo contacto desde la APP Ecocanjes');
        	}
        	
        });
        return view('userapp/contacto/msn');
    }
}
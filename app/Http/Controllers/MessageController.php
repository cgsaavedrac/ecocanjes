<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index(){
    	$messages = Message::paginate(10);
    	return view('admin.message.index')->with(compact('messages', 'users'));
    }

    public function msnuser(){
    	$user_id = auth()->user()->id;
    	$mensajes_pendientes = Message::where('user_id', $user_id)->where('read', 0)->count();
    	$messages = Message::where('user_id', $user_id)->where('read', 0)->paginate(10);
    	return view('userapp.mensajes.index')->with(compact('messages', 'mensajes_pendientes'));
    }

    public function create(){
    	$users = User::where('admin', '0')->get();
    	return view('admin.message.create')->with(compact('users'));
    }

    public function messagemail(Request $request)
    {
        $destinatarios = $request->input('destinatarios');
        $fecha_msn = date("Ymd");
        for ($i = 0; $i <= count($destinatarios) - 1; $i++) {
		    $message = New Message();
	        $message->message_code = 'MEN'.$fecha_msn.'-'.$i;
	        $message->user_id = $destinatarios[$i];
	        $message->message = $request->input('comment');
	        $message->save();
		}

        $data = array(
        	'comentarios' => $request->input('comment'),
        	'destinatarios' => $request->input('destinatarios'),
        );

        Mail::send('emails.mensajeria', $data, function($message){
        	$message->from('admin@pesic.cl', 'App Ecocanjes');
        	$correos = Message::where('send', 0)->get();
        	foreach($correos as $correo){
        		$message->to($correo->user->email)->subject('Mensajería desde APP Ecocanjes');
        		$message2 = Message::find($correo->id);
        		$message2->send = true;
        		$message2->save();
        	}
        	
        });
        return view('admin/message/msn');
    }

    public function read(Request $request)
    {
        $reads = $request->input('read');
        for ($i = 0; $i <= count($reads) - 1; $i++) {
		    $message = Message::find($reads[$i]);
	        $message->read = true;
	        $message->save();
		}
        return back();
    }
}

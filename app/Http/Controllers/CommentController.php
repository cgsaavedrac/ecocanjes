<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exchange;
use App\exchange_grantees;

class CommentController extends Controller
{
    public function commentControllerExchange(Request $request){
        $id = $request->id;
        //validaciones
        $rules = [
        'comment' => 'string|max:255',
        ];
        $message = [
            'comment.max' => 'El máximo es de 255 caracteres'
        ];

        $this->validate($request, $rules, $message);
            $exchange = Exchange::find($id);
            $exchange->comment = $request->input('comment');
            $exchange->save();
            return back();
    }

    public function commentControllerExchangeGrantee(Request $request){
        $id = $request->id;
        //validaciones
        $rules = [
        'comment' => 'string|max:255',
        ];
        $message = [
            'comment.max' => 'El máximo es de 255 caracteres'
        ];

        $this->validate($request, $rules, $message);
            $exchange = exchange_grantees::find($id);
            $exchange->comment = $request->input('comment');
            $exchange->save();
            return back();
    }
}

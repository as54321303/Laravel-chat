<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ChatController extends Controller
{
    public function chat(Request $request)
    {
        event(new \App\Events\SendNotification($request->username,$request->message));

        DB::table('chats')->insert([

            'from'=>$request->username,
            'message'=>$request->message

        ]);


    } 
}

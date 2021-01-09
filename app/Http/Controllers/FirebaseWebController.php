<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\User;

class FirebaseWebController extends Controller
{
    public function sendAll(Request $request)
    {
    	//dd($request->all());
    	$recipients = User::whereNotNull('device_token')
    		->pluck('device_token')->toArray();
    	//Sdd($recipients);

	        fcm()
			    ->to($recipients) // $recipients must an array
			    ->priority('high')
			    ->timeToLive(0)
			    ->notification([
			        'title' => $request->input('title'),
			        'body' => $request->input('body')
			    ])
		    	->send();

		$message = 'Notificación enviada a todos los usuarios (android).';
		return back()->with(compact('message'));


    }

}

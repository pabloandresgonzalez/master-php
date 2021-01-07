<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirebaseController extends Controller
{
	public function posToken(Request $request)
	{
		// $request->validate($rules);

		$user = $request->user();
		if ($request->has('device_token')) {
			$user->device_token =$request->input('device_token');
			$user->save();
		}
	}

}

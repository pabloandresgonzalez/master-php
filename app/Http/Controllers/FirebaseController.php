<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use User;

class FirebaseController extends Controller
{
	public function posToken(Request $request)
	{
		// $request->validate($rules);

		$user = Auth::guard('api')->user();
		//$user = $request->user();
		if ($request->has('device_token')) {
			$user->device_token =$request->input('device_token');
			$user->save();
		}
	}

}

<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    
	public function store(Request $request)
	{

		
		dd($request->all());
		
		return 'Store';
		
	}

	


}

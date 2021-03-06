<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use App\Models\Rol;
use App\Models\Areas;
use App\Models\Cargos;
use App\Models\RolPerfil;
use App\Models\Aplicacion;

class PruebaController extends Controller
{
    
    public function prodfunct(){


    	
    	$prod = Areas::all();

		//$prod=Aplicacion::all();//get data from table
		return view('productlist',compact('prod'));//sent data to view

	}

	public function findProductName(Request $request){

		
	    //if our chosen id and products table prod_cat_id col match the get first 100 data 

        //$request->id here is the id of our chosen option id
        $data=Cargos::select('nombreCargo','idCargo')->where('idArea',$request->idArea)->take(100)->get();
        return response()->json($data);//then sent this data to ajax success
	}


	
}

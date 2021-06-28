<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function index(Request $request){
      $address=null;
      $flag=true;
      if($request->cep){

      $url = "http://viacep.com.br/ws/$request->cep/xml/";
      $address = simplexml_load_file($url);
      if(!$address->cep){
        $flag=false;
      }
    }


      return view('welcome', compact('address','flag'));
    }


}

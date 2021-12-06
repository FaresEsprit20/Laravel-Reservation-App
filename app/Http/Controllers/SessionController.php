<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

    public function getSessionData(Request $request){
      if ($request->session()->has('userSession')){
       echo $request->session()->get('userSession');
       }else{
       echo 'NO DATA IN THIS SESSION';
     }
    }

    public function storeSessionData(Request $request){
       $request->session()->put('userSession','Fares');
       echo 'DATA HAS BEEN ADDED TO THIS SESSION';
    }

    public function deleteSessionData(Request $request){
        $request->session()->forget('userSession','Fares');
        echo 'DATA HAS BEEN DELETED FROM THIS SESSION';
     }


    }

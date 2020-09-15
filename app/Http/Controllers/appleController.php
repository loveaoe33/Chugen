<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class appleController extends Controller
{
    public function checkAcjax(Request $request)
    {
     
        $Account=$request->get('Account');
        $Password=$request->get('Password');
        $userdata=1;
      


        
        $request->session()->put('users', $Account);
        return response()->json($userdata);
    
     
        
        
    }
}







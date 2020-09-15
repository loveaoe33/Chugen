<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class appleController extends Controller
{
    public function checkAjax(Request $request)
    {
        $test=$request->all();
        $response = array(
            'status' => $test,
            
        );
    return response()->json($response);
    }
}

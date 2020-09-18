<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\userchugen;
use DB;

class appleController extends Controller
{
    public function checkAcjax(Request $request)
    {
        
        $Account=$request->get('Account');
        $Password=$request->get('Password');
       

$check=userchugen::where(['Account'=>$Account ,'Password'=>$Password])->get();
if(count($check)>0)
{
    $request->session()->put('users', $Account);
    return response()->json('OK');
}

/*
     if(isset($Account) && isset($Password) )
     {
        
    
        $AccountAll =$Account.$Password;
    return response()->json($Account);





     }
     */
     /*
        $userdata=DB::table('userchugen')
        ->where(['Account'=>$account,'Password'=>$password])
        ->get();
        */



     
    
     
        
        
    }


    public function registered(Request $request)
    {
        $a=rand(0,1000);
        $Account=$request->get('Account');
        $Password=$request->get('Password');
$check=userchugen::where(['Account'=>$Account ,'Password'=>$Password])->get();
if(count($check)>0)
{
   
    return redirect('registered')->with('msg','帳號密碼已重複');

}else 
{

        DB::table('userchugen')->insert(
            ['Account' => $Account, 'Password' => $Password ,'AccountAll'=>$a]
        );
        return view('loginChugen');
}
    }
}







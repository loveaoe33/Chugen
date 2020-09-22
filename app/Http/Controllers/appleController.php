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
        ->get();*/
  }


    public function registered(Request $request)
    {
        $aa=rand(0,100000);
        $bb=rand(0,100000);
        $a=md5(rand($aa,$bb));
        $Account=$request->get('Account');
        $Password=$request->get('Password');
$check=userchugen::where(['Account'=>$Account ,'Password'=>$Password])->get();

if(count($check)>0)
{
   
    return redirect('registered')->with('msg','帳號密碼已重複');

}else 
{
    $check2=userchugen::where(['AccountAll'=>$a])->get();
    if(count($check2)>0)
    {
       
        $aa=rand(0,100000);
        $bb=rand(0,100000);
        $a=md5(rand($aa,$bb));

        $a=$a.$b;
    
    }else 
    {

        DB::table('userchugen')->insert(
            ['Account' => $Account, 'Password' => $Password ,'AccountAll'=>$a]
        );
        return view('loginChugen');
    }


}
    }
}







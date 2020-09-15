<?php

use Illuminate\Support\Facades\Route;
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
});

Route::get('sessionD', function () {
    Session::flush();
    return view('loginChugen');
});

Route::get('login', function () {
   
    return view('login');
});

/*
Route::post('check', function (Request $request) {
    

  
     $response = array(
        'status' => 'success',
        
    );
return response()->json($response);
    

    

});

*/

Route::get('new', function () {
    return view('new');
});

Route::get('pdf', function () {
    /*
    Session::put('users', 1234);
    */
 
    if (Session::has('users')) {
        return view('pdf');
    }else
    {
        return view('loginChugen');
    }
    
});

   
    /*
    if($request->ajax()){
    $Account=$request->input('Account');
    $password=$request->input('Password');
        $userdata=DB::table('userchugen')
        ->where(['Account'=>$account,'Password'=>$password])
        ->get();
     if(count($userdata)>0)
     {

    Session::put('users', $Account);
    return response()->json(['success'=>'Ajax request submitted successfully']);
     }
     else
     {
        return response()->json(['error'=>'Account Error']);
     }
 
    


   
}
*/
Route::post('check','appleController@checkAcjax')->name('apple.checkAcjax');
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
Route::get('/warningP', function () {
    return view('warningP');
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
Route::get('registered', function () {
    return view('registered');
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
Route::post('registered','appleController@registered')->name('apple.registered');


Route::resource('test','ChugenController');
Route::get('/index', 'ChugenController@index');
Route::post('/logout', 'ChugenController@logout');

Route::get('/lala', 'ChugenController@lala');
Route::get('/test', 'ChugenController@test');
Route::get('/test2', 'ChugenController@test2');
Route::post('/sample', 'ChugenController@create');

Route::post('/test/ { id } ', 'ChugenController@destroy');
Route::get('/live_search/action', 'ChugenController@action')->name('live_search.action');
Route::get('/live_search/return', 'ChugenController@return')->name('live_search.return');



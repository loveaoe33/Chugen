<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chugen2;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    
    {
        $query=Chugen2::all();
        return view('Index',compact('query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $query=Chugen2::find($id);
        return view('edit',compact('query'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    { 
        $ID=$request->get('ID');
        Chugen2::where('ID',$id)->update(['first_name'=>$request->get('first_name'), 'last_address'=>$request->get('last_address'), 'last_City'=>$request->get('last_City'), 'first_Code'=>$request->get('first_Code'),
        'first_width'=>$request->get('first_width') ,'first_rule'=>$request->get('first_rule') ,'first_height'=>$request->get('first_height') ,'first_Country'=>$request->get('first_Country'),'exampleFormControlSelect1'=>$request->get('exampleFormControlSelect1'),'first_Total'=>$request->get('first_Total')]);
      
        return redirect('live_search');


   
    }
   
    public function destroy($id)
    {

     
        


        
        Chugen2::where('ID',$id)->delete();    
       return redirect('article');
       
    }
}

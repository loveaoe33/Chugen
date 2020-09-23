<?php

namespace App\Http\Controllers;
use App\Sample_data;
use Illuminate\Http\Request;
use App\Chugen2;
use App\usertable;
use DB;
use Session;
use DataTables;

class ChugenController extends Controller
{
    function index()
    {
        $query=Chugen2::all();
        return view('Index',compact('query'));
       
    }
    function lala()
    {
        
        return view('lala');
       
    }
    function test()
    {
        if (Session::has('data')){
            $query=Chugen2::all();
            return view('test',compact('query'));
          }else
          {
            Session()->flash('error','帳號或密碼錯誤');
            return view('login');
        
          }
        
            
  
         
      
    }

        
    

    function check(Request $request)
    {
 
       
    
    $account= $request->input('userid');
    $password=$request->input('password');
        $userdata=DB::table('usertable')
        ->where(['account'=>$account,'password'=>$password])
        ->get();
     if(count($userdata)>0)
     {

        $request->Session()->put('data','歡迎'.$account.'登入');
      
        return redirect('test');
     }
     else
     {
        return redirect('login');
     }
 

    }

    function logout(Request $request)
    {
 
        Session::forget('data');
        return redirect('login');
    
    
 

    }

    function create(Request $request)
    {
 
        echo'123';
    
 

    }


   function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('Chugen2')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('develop', 'like', '%'.$query.'%')
         ->orWhere('category', 'like', '%'.$query.'%')
         ->orWhere('number', 'like', '%'.$query.'%')
         ->orWhere('now', 'like', '%'.$query.'%')
         ->orWhere('dispose', 'like', '%'.$query.'%')
         ->orWhere('created_at', 'like', '%'.$query.'%')
         ->orWhere('updated_at', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('chugen2')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
        <td>'.$row->id.'</td>
         <td>'.$row->name.'</td>
         <td>'.$row->develop.'</td>
         <td>'.$row->category.'</td>
         <td>'.$row->number.'</td>
         <td>'.$row->now.'</td>
         <td>'.$row->dispose.'</td>


         <td>'.$row->created_at.'</td>
       
         
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="8">找不到相關訂單</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
    public function destroy($id)
    {


      
        Chugen2::where('id',$id)->delete();    
        return redirect('test');       
    }

    public function editindex()
    {
        $query=Chugen2::all();
        return view('ManagIndex',compact('query'));

    
    }





    function return(Request $request)
    {


        $getstamps = DB::table('chugen2')
        ->where('id', '=', $request->get('total'))
       
        ->orderBy('exampleFormControlTextarea1','asc')
        ->get();

      
        return response()->json(array('success' => true, 'data1' => $getstamps));
     }
    
}

<head>
        <link rel="stylesheet" type="text/css" href="mystyle.css">
        <link href="{{ asset('css/footer.css') }}" rel="stylesheet" type="text/css"/>
</head>
<div class='nav' id='nav'name='nav'>
         

</div>
<html lang="en">
<head>
  <title>管理者模式</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<div align="right">
      <button type="button" name="Manager_record" id="BackUp"" class="btn btn-success btn-sm">返回</button></br>
     </div>



</div>
</div>
</div>

<section class="container-fulid">
<div class='row'>
<div class='col-xs-12  '>
</p>
</div>
</div>
<div class='row'>
<div class='col-xs-12  '>
</p>
</div>
</div>
<div class='row'>
<div class='col-xs-12  '>
</p>
</div>
</div>
<div class='row'>
<div class='col-xs-12  '>
</p>
</div>
</div>
<div class='row'>
<div class='col-xs-12  '>
</p>
</div>
</div>
<div class='row'>
<div class='col-xs-12  '>
</p>
</div>
</div>
</div>

<div class='row'>
<div class='col-xs-12  '>
<table class="table table-hover">

<tr>
         <th>填報人</th>
         <th>部門</th>
         <th>類別</th>
         <th>現場處置</th>
         <th>醫療處置</th>
         <th>病歷號</th>
         <th>建立日期</th>
         <th>更新日期</th>
         <th>編輯</th>
         <th>刪除</th>
         <th>查看內容</th>
        </tr>
@foreach ($query as $var)
<tr>

<td>{{ $var->name }}</td>
<td>{{ $var->develop }}</td>
<td>{{ $var->category }}</td>
<td>{{ $var->now }}</td>
<td>{{ $var->dispose	 }}</td>
<td>{{ $var->number }}</td>
<td>{{ $var->created_at }}</td>
<td>{{ $var->updated_at }}</td>

<td><a href="{{ url('test/'.$var->id.'/edit') }}" role='btn' class='btn btn-primary'>編輯</a></td>

<td>
<form action="{{ url('test/'.$var->id) }}" method="post">
<input type="hidden" name="_token" value="{{ csrf_token()}}">
<input type="hidden" name="_method" value="delete">
<input type="submit" value="刪除"  role="btn" class="btn btn-danger" >
</form> 
</td>
<td>
<input type="button" value="顯示"  role="btn" id='alert' class="btn btn-info" >
</td>
</tr>
@endforeach
</div>
</div>
</table>

</section>
<h1>{{Session::get('data')}}</h1>
<form action="{{ url('logout') }}" method="post">
<input type="hidden" name="_token" value="{{ csrf_token()}}">
<input type="submit" value="登出"  role="btn" class="btn btn-danger" >
</form> 

<script>
 $('#BackUp').click(function(){
  history.go(-1)
 });

 $('#alert').click(function(){
  alert('123');
 });
</script>
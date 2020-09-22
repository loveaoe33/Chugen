


<html>
 <head>
 <meta charset="UTF-8" />
   <title>重仁骨科醫院異常事件</title>
   <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>

  
   <link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">
   <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
   <script src="../Js/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
   <link href="../Js/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet" />
   <script src="../Js/jquery-1.11.3.min.js"></script>

   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
   <script src="../../utils.js"></script>
   <link rel="stylesheet" href="ChugenMain/main/css/font-awesome.min.css">
   <link rel="stylesheet" href="ChugenMain/main/css/animate.css">
     <link rel="stylesheet" href="ChugenMain/main/css/owl.carousel.css">
     <link rel="stylesheet" href="ChugenMain/main/css/owl.theme.default.min.css">

     <link rel="stylesheet" href="ChugenMain/main/css/bootstrap.min.css">
     <link rel="stylesheet" href="ChugenMain/main/css/font-awesome.min.css">
     <link rel="stylesheet" href="ChugenMain/main/css/animate.css">
     <link rel="stylesheet" href="ChugenMain/main/css/owl.carousel.css">
     <link rel="stylesheet" href="ChugenMain/main/css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="ChugenMain/main/css/tooplate-style.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
   <style>
     canvas{
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
     </style>
</head>

<body>
<section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
					<a href="/" class="navbar-brand"><i class="fa fa-h-square"></i>Chugen Center</a>
					
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="sessionD" class="smoothScroll">病歷查詢系統</a></li>
                         <li><a href="#about" class="smoothScroll">異常事件申報</a></li>
                         <li><a href="#team" class="smoothScroll">國內外旅遊通報</a></li>
                         <li><a href="#news" class="smoothScroll">院外網站</a></li>
                         <li><a href="#news" class="smoothScroll">健保局</a></li>
                         @if (session('users'))
                         <li><a href="#news" class="smoothScroll">登出 {{ session('users') }} 帳號</a></li>
                         @endif
                  
                        
                    </ul>
               </div>

          </div>
     </section>
     



  
	<script>
  
		var MONTHS = ['一月', '二月', '三月', '四月', '五月', '六月','七月'];
		var config = {
			type: 'line',
			data: {
				labels: ['一月', '二月', '三月', '四月', '五月', '六月', '七月'],
				datasets: [{
					label: '本月異常事件',
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					data: [
					1,2,3,4,5,6,7
					],
					fill: false,
				}, {
					label: '上個月異常事件',
					fill: false,
					backgroundColor: window.chartColors.blue,
					borderColor: window.chartColors.blue,
					data: [
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor()
					],
				}]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Chart.js Line Chart'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Month'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Value'
						}
					}]
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});

			});

			window.myLine.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var colorName = colorNames[config.data.datasets.length % colorNames.length];
			var newColor = window.chartColors[colorName];
			var newDataset = {
				label: 'Dataset ' + config.data.datasets.length,
				backgroundColor: newColor,
				borderColor: newColor,
				data: [],
				fill: false
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());
			}

			config.data.datasets.push(newDataset);
			window.myLine.update();
		});

		document.getElementById('addData').addEventListener('click', function() {
			if (config.data.datasets.length > 0) {
				var month = MONTHS[config.data.labels.length % MONTHS.length];
				config.data.labels.push(month);

				config.data.datasets.forEach(function(dataset) {
					dataset.data.push(randomScalingFactor());
				});

				window.myLine.update();
			}
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myLine.update();
		});

		document.getElementById('removeData').addEventListener('click', function() {
			config.data.labels.splice(-1, 1); // remove the label first

			config.data.datasets.forEach(function(dataset) {
				dataset.data.pop();
			});

			window.myLine.update();
		});
	</script>
  
<p id="demo"></p>

 <div align="right">

 
      
     </div>

     <div align="right">
     
     </div>
     <br />

     <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" data-backdrop="static">
        


      <input type="date" name="date" id="date" class="form-control datepicker" value=""></br>

        

      <div class="form-group">
            <label class="control-label col-md-4">發生地點 : </label>
            <div class="col-md-8">
             <input type="text" name="adress" id="adress" class="form-control"  required /></p>
            </div>
            </div>
     

      <div class="form-group">
            <label class="control-label col-md-4">在場人員 : </label>
            <div class="col-md-8">
             <input type="text" name="people" id="people" class="form-control" /></p>
            </div>
            </div>
 

      <div class="form-group">
            <label class="control-label col-md-4">事件描述 : </label>
            <div class="col-md-8">
             <input type="text" name="content" id="content" class="form-control" /></p>
            </div>
            </div>
     




      </div>
   
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id='test2' name='test2'>取消</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id='test' name='test'>儲存</button>
    
    </div>
  </div>
</div>

     
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" data-backdrop="static">
       

      <div class="form-group">
            <label class="control-label col-md-4">病人名字 : </label>
            <div class="col-md-8">
             <input type="text" name="patientName" id="patientName" class="form-control" /></p>
            </div>
           </div>


           <div class="form-group">
            
           <label class="control-label col-md-4">性別 : </label>
            <div class="col-md-8">
            <select class="form-control" id="sex" name='sex'></p></br>
            <option>男性</option>
      <option>女性</option>
      
    </select>
    </div>
    </div>
    
          



          </p> <div class="form-group">
            <label class="control-label col-md-4">病歷號碼 : </label>
            <div class="col-md-8">
             <input type="text" name="patientNumber" onkeyup="value=value.replace(/[^\d]/g,'')"  id="patientNumber" class="form-control" /></p>
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">類別 : </label>
            <div class="col-md-8">
             <input type="text" name="patientContent" id="patientContent" class="form-control" /></p>
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">病人反應 : </label>
            <div class="col-md-8">
             <input type="text" name="patientReaction" id="patientReaction" class="form-control" /></p>
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">其他影響 : </label>
            <div class="col-md-8">
             <input type="text" name="otherReaction" id="otherReaction" class="form-control" />
            </div>
           </div>

           <button type="button" class="btn btn-secondary" data-dismiss="modal" id='test4' name='test4'>取消</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id='test3' name='test3'>儲存</button>

      </div>
      
    </div>
  </div>
</div>




     <div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>

        
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal"   required action='/sample'>
          {{ csrf_field() }}
          <div class="form-group">
            <label class="control-label col-md-4" >填寫人 : </label>
            <div class="col-md-8">
             <input type="text" name="name" id="name" class="form-control"  required />
            </div>
           </div>

           <div class="form-group">
            <label class="control-label col-md-4">單位名稱 : </label>
            <div class="col-md-8">
             <input type="text" name="develop" id="develop" class="form-control" required />
            </div>
           </div>

           <div class="form-group">
            <label class="control-label col-md-4">事件類別 (通報者填寫): </label>
            <div class="col-md-8">
             <input type="text" name="category" id="category" class="form-control" required />
            </div>
           </div>
           

           <div class="form-group">
            <label class="control-label col-md-4">事件描述(通報者填寫) : </label>
            <div class="col-md-4">
            <button type="button" name="create_record2" id="create_record2" class="btn btn-success btn-sm" style="width:140px;height:50px; font-size:20px;">添加事件</h4>
            </div>
           </div>
  




           <div class="form-group">
          
            <div class="col-md-8">
             <input type="hidden" name="number" id="number" class="form-control" required />
            </div>
           </div>
         




           <div class="form-group">
            <label class="control-label col-md-4">立即通知 : </label>
            <div class="col-md-8">
             <input type="text" name="now" id="now" class="form-control" required />
            </div>
           </div>

           <div class="form-group">
            <label class="control-label col-md-4">醫療處置 : </label>
            <div class="col-md-8">
             <input type="text" name="dispose" id="dispose" class="form-control" required />
            </div>
           </div>


           <div class="form-group">
            <label class="control-label col-md-4">病人資料(通報者填寫) : </label>
            <div class="col-md-4">
            <button type="button" name="create_record3" id="create_record3" class="btn btn-success btn-sm"style="width:140px;height:50px; font-size:20px;">添加資料</h4>
            </div>
           </div>


           
           <div class="md-form mb-4 pink-textarea active-pink-textarea">
           <div class="form-group col-md-14  "align=center >
  <label for="exampleFormControlTextarea1">通報資料確認區</label>
  <textarea class="form-control rounded-0  align=center" style="font-size:20px;color:red;" id="exampleFormControlTextarea1" name='exampleFormControlTextarea1' rows="10" readonly="readonly" ></textarea>
  </div>
</div>
  
           
                <br />
                <div class="form-group" align="center">
                 <input type="hidden" name="action" id="action" value="Add" />
                 <input type="hidden" name="hidden_id" id="hidden_id" />
                 <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
                 <input type="button" name="action_button2" id="action_button2" class="btn btn-warning" value="Add" />
                </div>
         </form>

         
        </div>
     </div>
    </div>
</div>







    
</div>
<head>
  <title>重仁骨科醫院</title>
  
 <body>
   
 
  <div class="container box">
   <h3 align="center">異常事件通報處理單</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">Search Customer Data</div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="輸入病歷號" />
     </div>
     <div class="table-responsive">
      <h3 align="center">Total Data : <span id="total_records"></span></h3>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
        <th>表單編號</th>
        <th>填寫人</th>
         <th>部門</th>
         <th>類別</th>
         <th>病歷號碼</th>
         <th>立即處置</th>
         <th>醫療處置</th>    
            
         <th>建立日期</th>
        </tr>
       </thead>
       <tbody>

       </tbody>
      </table>
      <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm"style="width:140px;height:50px; font-size:20px;">新增異常通報</button>
     
       <button type="button" onclick="location.href='login'" name="Manager_record" id="Manager_record" class="btn btn-success btn-sm"style="width:140px;height:50px; font-size:20px;">事件管理系統</button>
       <button type="button" name="create_content" id="create_content" class="btn btn-info" style="width:140px;height:50px; font-size:20px; " disabled='disabled'>單號內容</button>
       <button type="button" name="newopen" id="newopen" class="btn btn-info" style="width:140px;height:50px; font-size:20px;">醫院網站</button></p>
       <div class="input-group">
    <span class="input-group-addon"id='contentnumber'>輸入想查詢單號</span>
    <input id="msg" type="text" class="form-control" name="msg" placeholder="單號">
  </div>
      <div class="container">
  <h2>月份統計圖</h2>
  <p>The panel-group class clears the bottom-margin. Try to remove the class and see what happens.</p>
  
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">每月異常事件數量</div>
      
      <div style=" width:97%; ">
      <canvas id="canvas"></canvas>
      

    </div>
    </div>

  </div>
</div>
     </div>
    </div>    
   </div>
  </div>
 </body>
 
</html>

<script>


function displayCars() {

  
  var myArray = [{'date': dd,'adress': aa,'people': bb,'content': cc }];
  myArray.push({'patientName':ee,'sex':ff,'patientNumber':gg,'patientContent':hh,'patientReaction':ii,'otherReaction':jj});
  document.getElementById("demo").innerHTML =
  myArray[0].date + " " + myArray[0].adress +  " " + myArray[0].people+  " " + myArray[0].content+ 
  " " + myArray[1].patientName+ " " + myArray[1].sex+" " + myArray[1].patientNumber+
  " " + myArray[1].patientContent+" " + myArray[1].patientReaction+ " " + myArray[1].otherReaction +'</br>'
if(ee =='')
{
  ppp='資料輸入不夠完整'
  $("#exampleFormControlTextarea1").val("資料輸入不夠完整");
}
else if(aa =='')
{
  ppp='資料輸入不夠完整'
  $("#exampleFormControlTextarea1").val("資料輸入不夠完整");
}
else
  $("#exampleFormControlTextarea1").val("發生日期:" +dd+"\n"+ "發生地點:" +aa+"\n"+ "在場人員:" + bb + "\n" + "事件描述:" +cc+"\n"+' '+'\n'+ "病人名稱:" +ee+"\n"+ "性別:" +ff+"\n"+ "病歷號碼:" +gg+"\n"+ "類別:" +hh+"\n"+ "病人影響:" +ii+"\n" + "其他影響:" +jj+"\n"  );
}


var ppp=''
  var aa 
  var bb 
  var cc 
  var dd
var ee=''
var ff=''
var gg=''
var hh=''
var ii=''
var jj=''

var len

var myArray2     

    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD',
            locale: moment.locale('zh-cn')
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD hh:mm',
            locale: moment.locale('zh-cn')
        });
    });


    $("#create_content").on('click',function (event) {
   
      var contentnumber = jQuery("#msg").val();

    $.ajax({
  url:"{{ route('live_search.return') }}",
  method:'GET',
  data:{total:contentnumber},
  dataType:'json',
  success:function(respone)
  {
    if(respone=='')
    swal("編號錯誤");
    
    else
    {
      
      swal(respone.data1[0].exampleFormControlTextarea1);
    
    }
    
  },
  error:function(xhr) {
            alert('Ajax request 發生錯誤');
        }

 })

    });

$('#create_record').click(function(){
  $('.modal-title').text('Add New Record');
  $('#action_button').val('增加單號');
  $('#action_button2').val('修改資料');
  $('#action').val('Add');
  $('#form_result').html('');

  $('#formModal').modal('show');


  
  $(function() {
    $( "#datepicker" ).datepicker({
      showButtonPanel: true
    });
  });
  
 });


 $('#action_button2').click(function(){
  $('#exampleFormControlTextarea1').attr('readonly',false);
  Element()
alert('注意修改內容!')
});

 $('#test2').click(function(){


  $("#first_name").val('YOoo!!');
  
  $('#exampleModalCenter').hide();
  $('#formModal').modal('show'); 

});


$('#test').click(function(){
  var a = jQuery("#adress").val();
  var b = jQuery("#people").val();
  var c = jQuery("#content").val();
var d=jQuery("#date").val();





  if(a=='')
  {
			alert("請輸入發生地點");
      $('#formModal').modal('show');
      
		}
else if(b=='')
{
	alert("請輸入在場人員");
  $('#formModal').modal('show');
  
}
else if(c=='')
{
	alert("請輸入事件描述");
  $('#formModal').modal('show');

}
else if(d=='')
{
	alert("請輸入日期");
  $('#formModal').modal('show');

}
    else
    {
      
aa=a
bb=b
cc=c
dd=d
  $("#first_name").val('YOoo!!');
  
  $('#exampleModalCenter').hide();
  $('#formModal').modal('show');
  
  alert('建檔完成')

displayCars()
}
    

});
$('#test4').click(function(){
  $("#first_name").val('YOoo!!');
  
  $('#exampleModalCenter').hide();
  $('#formModal').modal('show'); 

});

$('#test3').click(function(){

  var e = jQuery("#patientName").val();
  var f = $("select[name='sex']").val();
  var g = jQuery("#patientNumber").val();
var h=jQuery("#patientContent").val();
var i = jQuery("#patientReaction").val();
var j=jQuery("#otherReaction").val();





  if(e=='')
  {
			alert("請輸入病人姓名");
      $('#formModal').modal('show');
      
		}
else if(f=='')
{
	alert("請選擇性別");
  $('#formModal').modal('show');
  
}
else if(g=='')
{
	alert("請輸入病歷號碼");
  $('#formModal').modal('show');

}
else if(h=='')
{
	alert("請輸入類別");
  $('#formModal').modal('show');

}
else if(i=='')
{
	alert("請輸入病患影響");
  $('#formModal').modal('show');

}
else if(j=='')
{
	alert("請輸入其他影響");
  $('#formModal').modal('show');

}
    else
    {
      Element()
      $("#first_name").val('YOoo!!');
  
  $('#exampleModalCenter').hide();
  $('#formModal').modal('show');
  alert('建檔完成')
ee=e
ff=f
gg=g
hh=h
ii=i
jj=j

$("#number").val(gg);

displayCars()

}
    

});
 

$(function(){

  var picker1 = $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD',
            locale: moment.locale('zh-cn'),
            //minDate: '2016-7-1'
        });
        var picker2 = $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD',
            locale: moment.locale('zh-cn')
        });
        //動態設定最小值
        picker1.on('dp.change', function (e) {
            picker2.data('DateTimePicker').minDate(e.date);
        });
        //動態設定最大值
        picker2.on('dp.change', function (e) {
            picker1.data('DateTimePicker').maxDate(e.date);
        });
});
$('#create_record2').click(function(){
   
 
  $('#exampleModalCenter').modal('show');

  
  $('#formModal').modal('hide');


});

  $('#create_record3').click(function(){
    $('#exampleModalCenter2').modal('show');

  
$('#formModal').modal('hide');

  
 });

 $( function() {
    $( "#datepicker" ).datepicker();
  } );  

/*
 $('#datetimepicker1').click(function(){
  $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD',
            locale: moment.locale('zh-cn'),
            //minDate: '2016-7-1'
        });
});

$('#datetimepicker2').click(function(){
  $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD',
            locale: moment.locale('zh-cn'),
            //minDate: '2016-7-1'
        });
});
    
        */
        var now = new Date();
//格式化日，如果小於9，前面補0
var day = ("0" + now.getDate()).slice(-2);
//格式化月，如果小於9，前面補0
var month = ("0" + (now.getMonth() + 1)).slice(-2);
//拼裝完整日期格式
var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
//完成賦值
$('#date').val(today);
    


$(document).ready(function(){
  disableElement()
  
  
fetch_customer_data();

function fetch_customer_data(query = '')
{
 $.ajax({
  url:"{{ route('live_search.action') }}",
  method:'GET',
  data:{query:query},
  dataType:'json',
  success:function(data)
  {
   $('tbody').html(data.table_data);
   $('#total_records').text(data.total_data);
  }
 })
}


$(document).on('keyup', '#search', function(){
 var query = $(this).val();
 fetch_customer_data(query);
});
});







function disableElement(){
	document.getElementById("action_button").disabled=true;
}

function  Element(){
	document.getElementById("action_button").disabled=false;
}

function  pppp(){
if(ppp == '資料輸入不夠完整')
{
  disableElement()
}
else if(ppp == '')
{
  disableElement()
}
 
else
{
    Element()
}
};







</script>
<script>

$(document).ready(function() {
   var title = {
      text: '城市平均气温'   
   };
   var subtitle = {
      text: 'Source: runoob.com'
   };
   var xAxis = {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
         'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
   };
   var yAxis = {
      title: {
         text: 'Temperature (\xB0C)'
      },
      plotLines: [{
         value: 0,
         width: 1,
         color: '#808080'
      }]
   };   

   var tooltip = {
      valueSuffix: '\xB0C'
   }

   var legend2 = {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle',
      borderWidth: 0
   };

   var series =  [
      {
         name: 'Tokyo',
         data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2,
            26.5, 23.3, 18.3, 13.9, 9.6]
      }, 
      {
         name: 'New York',
         data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8,
            24.1, 20.1, 14.1, 8.6, 2.5]
      },
      {
         name: 'London',
         data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 
            16.6, 14.2, 10.3, 6.6, 4.8]
      }
   ];

   var json = {};

   json.title = title;
   json.subtitle = subtitle;
   json.xAxis = xAxis;
   json.yAxis = yAxis;
   json.tooltip = tooltip;
   json.legend = legend2;
   json.series = series;

   $('#container2').highcharts(json);
   

});

$('#newopen').click(function(){

  

window.open('https://www.chung-jen.com.tw/%E9%96%80%E8%A8%BA%E8%A1%A8.html ', '重仁骨科醫院網站', config='height=280px,width=280px');
});
</script>


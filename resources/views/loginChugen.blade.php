<!DOCTYPE html>
<html lang="en">
	
<head>
	
	<title>Login V1</title>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Login_v1/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/vendor/select2/select2.min.css">
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login_v1/css/util.css">
	<link rel="stylesheet" type="text/css" href="Login_v1/css/main.css">
<!--===============================================================================================-->

</head>



<body>
<header>
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
                  
                         <li class="appointment-btn"><a href="#appointment">Make an appointment</a></li>
                    </ul>
               </div>

          </div>
     </section>
</header>



	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="Login_v1/images/img-01.png" alt="IMG">
				</div>
				

				<form class="login100-form validate-form" >
				{{ csrf_field() }}
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="Account" id='Account' placeholder="Account">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="Password" id='Password' placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button type='button' class="login100-form-btn" id='login' name='login'>
							Login
						</button>
					</div>

					<div class="text-center p-t-20">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>
					<div class="alert alert-primary" role="alert" id='alert' name='alert' style="display:none; " align="center">
 
</div>

					<div class="text-center p-t-60">
						<a class="txt2"  href="registered">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5"  aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	

	
<!--===============================================================================================-->	
	<script src="Login_v1/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v1/vendor/bootstrap/js/popper.js"></script>
	<script src="Login_v1/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v1/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Login_v1/vendor/tilt/tilt.jquery.min.js"></script>
	<script >


		$('.js-tilt').tilt({
			scale: 1.1
		})


    $( "#login" ).click(function() {
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		var a=$('#Account').val();
		
		var b=$('#Password').val();
		

		$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

     $.ajax({
    type: "POST",
    url: 'check',
    data: { Account:a ,Password:b, test2:CSRF_TOKEN },
    dataType: "JSON",
    success: function (response) {
		document.getElementById("alert").style.display=""
		$(".alert").text(response);
		
		$(location).attr('href', 'pdf');
		
    },
    error: function (thrownError) {
		setTimeout(function(){$("#alert").fadeIn("slow");},200);
		setTimeout(function(){$("#alert").fadeOut("slow");},2000);
      
		$(".alert").text('系統錯誤請聯絡專員');

		
      
    }
  });
});


	</script>
<!--===============================================================================================-->
	<script src="Login_v1/js/main.js"></script>

</body>
</html>

<style>

</style>
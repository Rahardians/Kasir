<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword">

    <title>Login To Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body style="background:#004643;color:#fff;">

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <br>
      <div class="container container-table">
	    <div class="row vertical-center-row">
	        <div class="text-center col-md-4 col-md-offset-4" >
	        	<a href="home.php" class="btn btn-primary btn-lg" style="margin-top:20px;">Home</a>
	        </div>
	    </div>
	  </div>
	  <div id="login-page" style="padding-top:3pc;">
	  	<div class="container">
		      <form class="form-login" method="POST">
		        <h2 class="form-login-heading">Lupa Password</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" name="user" placeholder="Username" autofocus>
		            <br>
		            <button class="btn btn-primary btn-block" name="proses" type="submit"> Lanjut</button>
		        </div>
		      </form>
	  	</div>
	  </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
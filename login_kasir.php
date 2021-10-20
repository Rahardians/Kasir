<?php
$koneksi = mysqli_connect("localhost","root","","db_toko");
if (isset($_POST['proses'])) {
	$user = $_POST['user'];
	$pass = md5($_POST['pass']);

	$sql = "select * from kasir where user='".$user."' and pass='".$pass."' limit 1";
	$hasil = mysqli_query ($koneksi,$sql);
	$jumlah = mysqli_num_rows($hasil);

	if($jumlah == 1) {
		@ob_start();
		session_start();
	    $row = mysqli_fetch_assoc($hasil);
		$_SESSION["id_kasir"]=$row["id_kasir"];
		$_SESSION["nama"]=$row["nama"];
	    header("location: kasir/index.php");
	    echo "<script type='text/javascript'> document.location = 'kasir/index.php'; </script>";
	}else {
	    $error = "Your Login Name or Password is invalid";
	}

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword">

    <title>Login To KASIR</title>

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
		        <h2 class="form-login-heading">LOGIN KASIR</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" name="user" placeholder="User ID" autofocus>
		            <br>
		            <input type="password" class="form-control" name="pass" placeholder="Password">
		            <br>
		            <button class="btn btn-primary btn-block" name="proses" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		            <a href="lupa/index.php">Lupa Password?</a>
		        </div>
		      </form>
	  	</div>
	  </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>


<?php
	@ob_start();
	session_start();
	if(isset($_POST['proses'])){
		require 'config.php';
		$koneksi = mysqli_connect("localhost","root","","db_toko");
		$user = strip_tags($_POST['user']);
		$pass = strip_tags($_POST['pass']);

		$sql = 'select * 
				from login
				where user =? and pass = md5(?)';
		$row = $config->prepare($sql);
		$row -> execute(array($user,$pass));
		$jum = $row -> rowCount();

		$sql2 = "select * from kasir where user='".$user."' and pass=md5('".$pass."')";
		$hasil2 = mysqli_query ($koneksi,$sql2);
		$jumlah = mysqli_num_rows($hasil2);
		if($jum > 0){
			$hasil = $row -> fetch();
			$_SESSION['admin'] = $hasil;
			echo '<script>window.location="index.php"</script>';
		}elseif($jumlah > 0){
			$row2 = mysqli_fetch_assoc($hasil2);
			$_SESSION["id_kasir"]=$row2["id_kasir"];
			$_SESSION["nama"]=$row2["nama"];
			echo '<script>window.location="kasir/index.php"</script>';
		}else{
			echo '<script>alert("Login Gagal");history.go(-1);</script>';
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

  <body style="background:#000;color:#000;">

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <br>
      <div class="container container-table">
	    <div class="row vertical-center-row">
	        <div class="text-center col-md-4 col-md-offset-4" >
	        	<a href="home.php" class="btn btn-primary btn-lg" style="margin-top:20px;background: #1de9b6;color:#000;">Home</a>
	        </div>
	    </div>
	  </div>
	  <div id="login-page" style="padding-top:3pc;">
	  	<div class="container">
		      <form class="form-login" method="POST">
		        <h2 class="form-login-heading" style="background: #000;color:#1de9b6;">LOGIN</h2>
		        <div class="login-wrap" style="background: #000;border:1px solid #1de9b6;">
		            <input type="text" class="form-control" name="user" placeholder="User ID" autofocus>
		            <br>
		            <input type="password" class="form-control" name="pass" placeholder="Password">
		            <br>
		            <button class="btn btn-primary btn-block" style="background: #1de9b6;color:black;" name="proses" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		            <a href="lupa/index.php" style="color:#1de9b6">Lupa Password?</a>
		        </div>
		      </form>
	  	</div>
	  </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>


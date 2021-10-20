<?php
$koneksi = mysqli_connect("localhost","root","","db_toko");
session_start();
if (!empty($_SESSION['user'])) {
  $pertanyaan = $_SESSION['sukses'];
  $user = $_SESSION['user'];
}elseif(!empty($_SESSION['admin'])){
  $pertanyaan = $_SESSION['sukses'];
  $user = $_SESSION['user'];
}else{
  echo '<script>window.location="index.php"</script>';
}

if (isset($_POST['proses'])) {
  $pass = $_POST['pass'];
  $pass2 = $_POST['pass2'];
  if(!empty($_SESSION['admin'])){
    if ($pass == $pass2) {
      mysqli_query($koneksi,"UPDATE login SET pass=md5('$pass') WHERE user='$user'");
      echo '<script>window.location="../login.php"</script>';
    }else{
      echo '<script>alert("Password tidak sama");</script>';
    }
  }else{
    if ($pass == $pass2) {
      mysqli_query($koneksi,"UPDATE kasir SET pass=md5('$pass') WHERE user='$user'");
      echo '<script>window.location="../login_kasir.php"</script>';
    }else{
      echo '<script>alert("Password tidak sama");</script>';
    }
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

    <title>Lupa Password</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

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
	        	<a href="../home.php" class="btn btn-primary btn-lg" style="background: #1de9b6;color:black;margin-top:20px;">Home</a>
	        </div>
	    </div>
	  </div>
	  <div id="login-page" style="padding-top:3pc;">
	  	<div class="container">
		      <form action="" class="form-login" method="POST">
		        <h2 class="form-login-heading" style="background: #000;color:#1de9b6;">Lupa Password</h2>
		        <div class="login-wrap" style="background: #000;border:1px solid #1de9b6;">
		            <input type="password" class="form-control" name="pass" placeholder="Password Baru" autofocus>
		            <br>
                <input type="password" class="form-control" name="pass2" placeholder="Tulis Lagi Password Baru">
                <br>
		            <button class="btn btn-primary btn-block" name="proses" type="submit" style="background: #1de9b6;color:black;"> Lanjut</button>
		        </div>
		      </form>
	  	</div>
	  </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>
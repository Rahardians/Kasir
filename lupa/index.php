<?php
if (isset($_POST['proses'])) {
  $koneksi = mysqli_connect("localhost","root","","db_toko");
  $user = $_POST['user'];
  $pertanyaan =$_POST['pertanyaan'];
  $jawaban = $_POST['jawaban'];
  $admin = 'admin';
  $sql = mysqli_query($koneksi,"SELECT * FROM kasir WHERE user='$user' AND pertanyaan='$pertanyaan' AND jawaban='$jawaban'");
  $sql2 = mysqli_query($koneksi,"SELECT * FROM login WHERE user='$user' AND pertanyaan='$pertanyaan' AND jawaban='$jawaban'");
  $jum = mysqli_num_rows($sql);
  $jum2 = mysqli_num_rows($sql2);
  if($jum > 0){
    session_start();
    $_SESSION['sukses'] = $pertanyaan;
    $_SESSION['user'] = $user;
    echo '<script>window.location="pass.php"</script>';
  }elseif($jum2 > 0){
    session_start();
    $_SESSION['sukses'] = $pertanyaan;
    $_SESSION['user'] = $user;
    $_SESSION['admin'] = $admin;
    echo '<script>window.location="pass.php"</script>';
  }
  else{
    echo '<script>alert("Pertanyaan atau Jawaban Salah");history.go(-1);</script>';
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
		            <input type="text" class="form-control" name="user" placeholder="Username" autofocus>
		            <br>
                <select name="pertanyaan" class="form-control">
                  <option selected="">Pertanyaan</option>
                  <option value="ibu">Siapa Nama ibu kandung anda</option>
                  <option value="hewan">Siapa Nama Hewan Peliharaan anda</option>
                  <option value="kota">Kota yang pertama kali dikunjungi</option>
                  <option value="barang">Apa Barang Favorit anda</option>
                  <option value="musik">Apa Judul Musik kesukaan anda</option>
                </select>
                <br>
                <input type="text" class="form-control" name="jawaban" placeholder="Jawaban" autocomplete="off">
                <br>
		            <button class="btn btn-primary btn-block" name="proses" style="background: #1de9b6;color:black;" type="submit"> Lanjut</button>
		        </div>
		      </form>
	  	</div>
	  </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>
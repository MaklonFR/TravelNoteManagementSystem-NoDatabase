<?php
      if (!isset($_SESSION)) 
        {
        session_start();       
        }
  	   if(isset($_SESSION['admin'])){
    	  header('location: home.php');
  	  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UKK - RPL SMKN 1 KUWUS PAKET 1</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <!-- Google fonts - Popppins for copy-->
    <link href="css/font.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.default.c1992928.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.0a822280.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
  </head>
  <body>
    <!--HEADER (BAGIAN ATAS)-->
    <header class="header mb-2">
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow ">
        <a class="sidebar-toggler text-gray-500 me-4 me-lg-5 lead">
          <img class="avatar avatar-sm p-7 me-2" src="img/logo.png">PEDULI DIRI
        </a>
        <ul class="ms-auto d-flex align-items-center list-unstyled mb-0">
          <li class="nav-item dropdown ms-auto">
            <a class="nav-link pe-0" id="userInfo" href="#" 
             data-bs-toggle="dropdown">
             <img class="avatar p-1" src="img/avatar-7.png" alt="Jason Doe">
            </a>
            
          </li>
        </ul>
      </nav>
    </header>

    <div class="page-holder bg-gray-100">
      <div class="container-fluid px-lg-4 px-xl-5">
        <div class="row">
            <!-- Basic Form-->
            <div class="col-lg-4"></div>
            <div class="col-lg-4 mb-5">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-heading text-center">Form Login</h4>
                </div>
                <div class="card-body">
                  <p class="text-center">Silahkan masukan NIK dan Nama Lengkap!</p>
                  <form id="flogin_regis">
                    <div class="mb-3">
                      <label class="form-label text-uppercase">NIK</label>
                      <input class="form-control" type="number" name="nik" id="nik"
                      placeholder="Masukan NIK">
                    </div>
                    <div class="mb-3">       
                      <label class="form-label text-uppercase" aria="nama">Nama Lengkap</label>
                      <input class="form-control" type="text" name="nama" id="nama"
                      placeholder="Masukan Nama Lengkap">
                    </div>
                    <div class="mb-3">      
                      <button class="btn btn-primary px-4" id="regis" type="button">Register</button> 
                      <button class="btn btn-primary" id="login" type="button">Log in</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          <div class="col-lg-4"></div>
        </div>
       </div>

      
      <!--FOOTER (BAGIAN BAWAH)-->
        <footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 text-center text-md-start fw-bold">
                <p class="mb-2 mb-md-0 fw-bold">UKK RPL SMKN 1 Kuwus &copy; 2022</p>
              </div>
              <div class="col-md-6 text-center text-md-end text-gray-400">
                <p class="mb-0">Template bubbly</p>
              </div>
            </div>
          </div>
        </footer>
    </div>

    <!-- JavaScript files-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.5.1.js"></script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->

 <script type="text/javascript"> 
 $("document").ready(function(){

  /* KONDISI SAAT KLIK TOMBOL REGISTER*/
  $("#regis").click(function(){
    var nik = $("#nik").val();
    var nama = $("#nama").val();
    if ( (nik=="") || (nama=="") )
    {
      alert("Field belum diisi!"); return;
    }
    $.ajax({
      url     : "crud/register.php",
      method  : "POST",
      data    : { nik:nik, nama:nama },
        success:function (data) {
        //alert(data);
        if (data=="OK")
        {
          document.getElementById("flogin_regis").reset();
          alert("Register Successfuly!");
        } else 
        if (data=="ERROR")
        {
          document.getElementById("flogin_regis").reset();
          alert("Register Error!");
        }
      }
    })
  });

  /* KONDISI SAAT KLIK TOMBOL LOGIN*/
  $("#login").click(function(){
    var nik  = $("#nik").val();
    var nama = $("#nama").val();
    if ( (nik=="") || (nama=="") )
    {
      alert("Field belum diisi!"); return;
    }
    $.ajax({
      url     : "crud/login.php",
      method  : "POST",
      data    : { nik:nik, nama:nama },
        success:function (data) {
        //alert(data); return;
        if (data=="OK")
        {
          document.getElementById("flogin_regis").reset();
          alert("Login Successfuly!");
          window.location.href="home.php";  
        } else 
        if (data=="ERROR")
        {
          document.getElementById("flogin_regis").reset();
          alert("Terjadi kesalahan! Error Username dan Password");
        }
      }
    })
  });

 });

 </script>

 <link rel="stylesheet" href="css/all.css">
</body>

</html>
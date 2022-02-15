<?php
	if (!isset($_SESSION)) {
		session_start();	
	}

	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
		header('location: index.php');
	}
?>
<div id="myhome" class="row mb-3">
            <h2 class="text-center">SELAMAT DATANG DI APLIKASI PEDULI DIRI</h2>
            <div class="card hover-animate text-center mb-4">
              <div class="card-body">
                <div class="icon icon-xl mx-auto mb-4 bg-primary-light">
                      <svg class="svg-icon text-primary">
                        <use xlink:href="orion-svg-sprite.57a86639.svg#man-1"> </use>
                      </svg>
                </div>
                <h3 class="h5">Halo, <?php echo $_SESSION['nama']?></h3>
                <p class="text-muted text-sm card-text">
                    Aplikasi Peduli diri adalah aplikasi catatan perjalanan dikembangkan <br>untuk merekap
                    setiap catatan perjalanan penumpang <br> mulai tanggal, waktu, alamat,
                    lokasi tujuan dan suhu tubuh.
                </p>
                  <a class="" type="button" onclick="myprofile()" href="#"> 
                    <span class="">Lihat Profil</span>
                  </a>
              </div>
            </div>
</div>

<!-- Simple card-->
<div class="row" id="profil">
<div class="col-lg-4"></div>
 <div class="col-lg-4 card mb-2"><img class="card-img-top img-fluid" src="img/avatar-7.png" alt="Card image cap">
       <div class="card-body">
        <h5 class="card-title text-center">PROFIL</h5>
        <p class="sidebar-link-title text-center">NIK: <?php echo $_SESSION['admin'];?> <br>
        Nama: <?php echo $_SESSION['nama'];?> 
        </p><a class="btn btn-primary" onclick="myhome()" href="#">Kembali ke Home</a>
       </div>
</div>
<div class="col-lg-4"></div>
</div>

<script>
$("document").ready(function(){
  $("#profil").hide();
});
function myhome()
{
  $("#myhome").show();
  $("#profil").hide();
}
function myprofile()
{
  $("#myhome").hide();
  $("#profil").show();
}
</script>
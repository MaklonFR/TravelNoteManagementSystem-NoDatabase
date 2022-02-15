<?php
	if (!isset($_SESSION)) {
		session_start();		
	}
?>

<div class="row"> 
         <div class="col-lg-2"></div>
          <div class="col-lg-8 mb-5">
           <div class="card">
               <div class="card-header">
                 <h4 class="card-heading text-center">Isi Data Perjalanan</h4>
               </div>
              <div class="card-body">
 
                <form class="form-horizontal" id="fadd">    
                 <div class="row">
                  <div class="col-md-12">
                    <input id="id" name="id" value="<?php echo $_SESSION['admin']; ?>" hidden>
                    <div class="mb-3">
                      <label class="mb-2">Taggal:</label>
                      <div class="input-group mb-3"><span class="input-group-text">TG</span>
                        <input class="form-control" id="tgl" name="tgl" type="date" aria-label="-">
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="mb-2">Waktu:</label>
                      <div class="input-group mb-3"><span class="input-group-text">W</span>
                        <input class="form-control" id="wkt" name="wkt" type="text" aria-label="-">
                      </div>
                    </div>
                    
                    <div class="mb-3">
                      <label class="mb-2">Alamat:</label>
                      <div class="input-group mb-3"><span class="input-group-text">Al</span>
                        <input class="form-control" id="al" name="al" type="text" aria-label="-">
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="mb-2">Lokasi yang dikunjung:</label>
                      <div class="input-group mb-3"><span class="input-group-text">LK</span>
                        <input class="form-control" id="lk" name="lk" type="text" aria-label="-">
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="mb-2">Suhu Tubuh:</label>
                      <div class="input-group mb-3"><span class="input-group-text">ST</span>
                        <input class="form-control" id="st" name="st" type="text" aria-label="-">
                      </div>
                    </div>

                  </div>
                  <div class="mb-3">      
                      <button class="btn btn-primary px-4" id="add" type="button">Simpan Data</button> 
                    </div>
                </div>
              </form>

            </div>
           </div>
          </div> <div class="col-lg-2"></div>

<script type="text/javascript"> 
 $("document").ready(function(){

  /* KONDISI SAAT KLIK TOMBOL REGISTER*/
  $("#add").click(function(){
    var id  = $("#id").val();
    var tgl = $("#tgl").val();
    var wkt = $("#wkt").val();
    var al  = $("#al").val();
    var lk  = $("#lk").val();
    var st  = $("#st").val();

    if ( (tgl=="") || (wkt=="") || (al=="") || (lk=="") || (st=="")  )
    {
      alert("Field belum diisi!"); return;
    }
    $.ajax({
      url     : "crud/add.php",
      method  : "POST",
      data    : { 
                  id:id,
                  tgl:tgl, 
                  wkt:wkt,
                  al:al,
                  lk:lk,
                  st:st
                },
        success:function (data) {
        //alert(data); return;
        if (data=="OK")
        {
          document.getElementById("fadd").reset();
          alert("Add Successfuly!");
          tampil_catatan();
        } else 
        if (data=="ERROR")
        {
          document.getElementById("fadd").reset();
          alert("Add Error!");
        }
      }
    })
  });

 });

 </script>

</div>
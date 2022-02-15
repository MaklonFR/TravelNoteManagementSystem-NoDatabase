<?php
//print_r($_POST);

if (!isset($_SESSION)) {

    session_start();
}
?>

<div class="row">
           <div class="col-lg-2"> </div>
           <div class="col-lg-8 mb-5">
            <div class="card">
              <div class="card-header">
                <h4 class="card-heading text-center">DATA PERJALANAN</h4>
              </div>
              <div style="overflow-x:auto;" class="card-body"> 
              <label class="col-md-9 form-label">Cari dengan tanggal atau suhu tubuh:</label>
                <div class="col-lg-4">
                  <input class="form-control" name="cari" id="cari"
                  type="text" placeholder="Ketik disini untuk pencarian..">
               </div>       
                <input id="id" name="id" value="<?php echo $_SESSION['admin']; ?>" hidden>                   
                <table class="table table-striped table-hover card-text">
                  <thead>
                    <tr>
                      <th>Tanggal </th>
                      <th>Waktu </th>
                      <th>Alamat </th>
                      <th>Lokasi Tujuan</th>
                      <th>Suhu</th>
                    </tr>
                  </thead>
                  
                    <tbody id="tampil">

                    </tbody>
                  
                </table>
              </div>
            </div>
           </div>
          <div class="col-lg-2"> </div>
</div>

<script type="text/javascript"> 
  $(document).ready(function() {

    $('input[name="cari"]').keyup(function(){ 
	    	var searchterm = $(this).val();
			
			if(searchterm.length > 1) {
				var match = $('tr.data-row:contains("' + searchterm + '")');
				var nomatch = $('tr.data-row:not(:contains("' + searchterm + '"))');				
				match.addClass('selected');
				nomatch.css("display", "none");
			} else {
				$('tr.data-row').css("display", "");
				$('tr.data-row').removeClass('selected');				
			}
    });

    data_tampil();
			
  });

  function data_tampil()
  {
    var id  = $("#id").val();
    $.ajax({
      url     : "crud/show_catatan.php",
      method  : "POST",
      data    : { 
                  id:id
                },
        success:function (data) {
        //alert(data); return;
        $("#tampil").html(data).refresh;
        }

      });

  }
 </script>
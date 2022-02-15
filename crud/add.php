<?php
//print_r($_POST);
if(isset($_POST['id'])!==null)
 {
    $id  = $_POST['id'];
    $tgl = $_POST['tgl'];
	  $wkt = $_POST['wkt'];
    $al  = $_POST['al'];
    $lk  = $_POST['lk'];
    $st  = $_POST['st'];

	//path to save txt file

  $myFile = "../data/$id.txt";
	$fh = fopen($myFile, 'a') or die("can't open file");
  //add file 
  fwrite($fh, $tgl.''.";");
  fwrite($fh, $wkt.''.";");
  fwrite($fh, $al.''.";");
  fwrite($fh, $lk.''.";");
  fwrite($fh, $st.''.";");
  fwrite($fh, ""."\n");
  fclose($fh);
    
    $data="OK"; 
    echo $data;
  } else
    {
    $data="ERROR";
    echo $data;
    }
?>
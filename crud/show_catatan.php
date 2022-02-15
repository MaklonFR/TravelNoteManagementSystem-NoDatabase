<?php
//print_r($_POST);
if (!isset($_SESSION)) {
    session_start();
}

if(isset($_POST['id'])!==null)
 {
    $id    = $_POST['id'];
    $path  = "../data/$id.txt";
   // open the file
   if (file_exists($path)) {
    if (($file = fopen($path, "r")) !== false) {
        while(($row = fgets($file)) != false) {
         echo "<tr class='data-row'>";
         $col = explode(';',$row);
         
         foreach($col as $data) {
         
         echo "<td>". trim($data)."</td>";
         
         }
         echo "</tr>";
         }
         fclose($file);
     }
    
    } else 
    {
        echo "<tr>
        <td class='text-danger'>Data kosong</td>
        <td class='text-danger'>Data kosong</td>
        <td class='text-danger'>Data kosong</td>
        <td class='text-danger'>Data kosong</td>
        <td class='text-danger'>Data kosong</td>
        </tr>";
        
    } 
 
} 
?>
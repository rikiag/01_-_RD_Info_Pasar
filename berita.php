<?php
 
 mysql_connect("localhost", "root", "");
 mysql_select_db("barang");

 $sql = mysql_query(" SELECT * FROM upload");
 while ($baris=mysql_fetch_array($sql))
 {
  
  $formatted = date('d-M-Y H:i:s', strtotime($baris['Waktu']));
  echo $formatted;
  echo "<br>";
  echo "harga :".$baris[1]."<br><br>";
  echo "<img src=image/".$baris['Path'].">";
  echo"<br><br><hr>";
 }
?>
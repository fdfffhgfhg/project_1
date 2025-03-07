<p>Liên hệ</p>
<?php
   $sql_lh = "SELECT * from tbl_lienhe where id=1";
   $query_lh = mysqli_query($mysqli,$sql_lh);
?>
<?php
while($row = mysqli_fetch_array($query_lh)){
?>
  <p><?php echo $row['thongtinlienhe']?></p>  
<?php
 }
?>

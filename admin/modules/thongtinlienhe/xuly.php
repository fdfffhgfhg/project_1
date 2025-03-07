<?php
  include('../../config/connect.php');
  $thongtinlienhe = $_POST['thongtinlienhe'];
  $id = $_GET['id'];
  if(isset($_POST['capnhatlienhe'])){
    // sua thong tin danh muc
     $sql_update = "UPDATE tbl_lienhe SET thongtinlienhe ='".$thongtinlienhe."' where id = '$id'";
     mysqli_query($mysqli,$sql_update);
    header('Location:../../index.php?action=quanlylienhe&query=capnhat');
  }
?>
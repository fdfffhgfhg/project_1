<?php
  include('../../config/connect.php');
  $tendanhmucbaiviet = $_POST['tendanhmucbaiviet'];
  $thutu = $_POST['thutu'];
  if(isset($_POST['themdanhmucbaiviet'])){
    $sql_them = "INSERT INTO tbl_danhmucbaiviet(tendanhmuc_baiviet,thutu)
                VALUE ('".$tendanhmucbaiviet."',' ".$thutu."')";
    mysqli_query($mysqli,$sql_them);
    header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
  }
  elseif(isset($_POST['suadanhmucbaiviet'])){
    // sua thong tin danh muc
     $sql_update = "UPDATE tbl_danhmucbaiviet SET tendanhmuc_baiviet ='".$tendanhmucbaiviet."' , thutu = '".$thutu."' where id_danhmuc_baiviet = $_GET[iddanhmucbaiviet]";
     mysqli_query($mysqli,$sql_update);
    header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
  }
  else{
     $id = $_GET['iddanhmucbaiviet'];
     $mysql_delete = "DELETE from tbl_danhmucbaiviet where id_danhmuc_baiviet = '".$id."'";
     mysqli_query($mysqli,$mysql_delete);
     header('Location:../../index.php?action=quanlydanhmucbaiviet&query=them');
  }
?>
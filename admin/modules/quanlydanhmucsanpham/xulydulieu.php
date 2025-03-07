<?php
  include('../../config/connect.php');
  $tenloaisanpham = $_POST['tendanhmuc'];
  $thutu = $_POST['thutu'];
  $sql_truyxuat = mysqli_query($mysqli,"SELECT * FROM danhmuc");


  if(isset($_POST['themdanhmuc'])){
    $check = true;
    if(empty($tenloaisanpham) || empty($thutu)){
      $check = false;
    }
    while($row = mysqli_fetch_array($sql_truyxuat)){
      if($tenloaisanpham == $row['tendanhmuc']){
        $check = false;
      }
      if($thutu == $row['thutu']){
        $check = false;
      }
    }
    if($check){
    $sql_them = "INSERT INTO danhmuc(tendanhmuc,thutu)
                VALUE ('".$tenloaisanpham."',' ".$thutu."')";
    mysqli_query($mysqli,$sql_them);
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }else{
      echo '<p style="color:red">Thông tin điền vào bị lỗi . Có thể do thông tin điền vào đã tồn tại trong CSDL. Hoặc có thể thông tin bị trống. Vui lòng trở lại và nhập lại</p>
            <a href="../../index.php?action=quanlydanhmucsanpham&query=them">Quay lại</a>';
     // header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }
  }
  elseif(isset($_POST['suadanhmuc'])){
    $check = true;
    if(empty($tenloaisanpham) || empty($thutu)){
      $check = false;
    }
    if($check){
    // sua thong tin danh muc
     $sql_update = "UPDATE danhmuc SET tendanhmuc ='".$tenloaisanpham."' , thutu = '".$thutu."' where id_danhmuc = $_GET[iddanhmuc]";
     mysqli_query($mysqli,$sql_update);
     header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }else{    
      echo '<p style="color:red">Thông tin điền vào bị lỗi . Có thể do thông tin điền vào bị trùng lặp hoặc để trống .  Vui lòng trở lại và nhập lại</p>';
    }
  }
  else{
     $id = $_GET['iddanhmuc'];
     $mysql_delete = "DELETE from danhmuc where id_danhmuc = '".$id."'";
     mysqli_query($mysqli,$mysql_delete);
     header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
  }
?>
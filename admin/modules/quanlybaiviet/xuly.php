<?php
  include('../../config/connect.php');
  $tenbaiviet = $_POST['tenbaiviet'];
   // xu ly file hinh anh
  $hinhanh = $_FILES['hinhanh']['name'];
  $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
  $hinhanh = time().'_'.$hinhanh;


  $tomtat = $_POST['tomtat'];
  $noidung = $_POST['noidung'];
  $tinhtrang = $_POST['tinhtrang'];
  $danhmuc = $_POST['danhmuc'];


  if(isset($_POST['thembaiviet'])){
    $sql_them = "INSERT INTO tbl_baiviet(tenbaiviet,hinhanh,tomtat,noidung,id_danhmuc_baiviet,tinhtrang)
                VALUE ('".$tenbaiviet."','".$hinhanh."' ,'".$tomtat."' ,'".$noidung."' , '".$danhmuc."', '".$tinhtrang."')";
    mysqli_query($mysqli,$sql_them);
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    header('Location:../../index.php?action=quanlybaiviet&query=them');
  }
  elseif(isset($_POST['suabaiviet'])){
    // sua thong tin bai viet
    if(!empty($_FILES['hinhanh']['name'])){
    move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
    $sql_update = "UPDATE tbl_baiviet SET tenbaiviet ='".$tenbaiviet."' ,  hinhanh = '".$hinhanh."' ,
                   tomtat = '".$tomtat."' , noidung = '".$noidung."' , tinhtrang = '".$tinhtrang."', 
                   id_danhmuc_baiviet = '".$danhmuc."' where id_baiviet = $_GET[idbaiviet]";
    // xoa anh cu
    $sql = "SELECT * FROM tbl_baiviet WHERE id_baiviet = '$_GET[idbaiviet]' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    while($row = mysqli_fetch_array($query)){
    unlink('uploads/'.$row['hinhanh']);
    }
    }
    else{
    $sql_update = "UPDATE tbl_baiviet SET tenbaiviet ='".$tenbaiviet."' ,
                   tomtat = '".$tomtat."' , noidung = '".$noidung."' ,
                    tinhtrang = '".$tinhtrang."' , id_danhmuc_baiviet = '".$danhmuc."' 
                     where id_baiviet = $_GET[idbaiviet]";
    }
    mysqli_query($mysqli,$sql_update);
    header('Location:../../index.php?action=quanlybaiviet&query=them');
  }
  else{
     $id = $_GET['idbaiviet'];
     $sql = "SELECT * FROM tbl_baiviet WHERE id_baiviet = '".$id."' LIMIT 1";
     $query = mysqli_query($mysqli,$sql);
     while($row = mysqli_fetch_array($query)){
      unlink('uploads/'.$row['hinhanh']);
     }
     $mysql_delete = "DELETE from tbl_baiviet where id_baiviet = '".$id."'";
     mysqli_query($mysqli,$mysql_delete);
     header('Location:../../index.php?action=quanlybaiviet&query=them');
  }
?>
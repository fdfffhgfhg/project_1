<?php
  include('../../config/connect.php');
  $tensanpham = $_POST['tensanpham'];
  $masanpham = $_POST['masanpham'];
  $giasp = $_POST['giasp'];
  $soluong = $_POST['soluong'];
   // xu ly file hinh anh
  $hinhanh = $_FILES['hinhanh']['name'];
  $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
  $hinhanh = time().'_'.$hinhanh;
  $tomtat = $_POST['tomtat'];
  $noidung = $_POST['noidung'];
  $tinhtrang = $_POST['tinhtrang'];
  $danhmuc = $_POST['danhmuc'];
  $sql_truyxuat = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham");

  if(isset($_POST['themsanpham'])){
    $check = true;
    // Nếu bất kỳ một trong các trường này để trống -> không hợp lệ 
    if(empty($tensanpham)||empty($masanpham)||empty($giasp)||empty($soluong)||empty($hinhanh)||empty($noidung)||empty($danhmuc)){
      $check = false;
    }
    // Nếu giá sản phẩm và số lượng không đúng định dạng số -> báo lỗi
    if(!ctype_digit($giasp)||!ctype_digit($soluong)){
      $check = false;
    }
    // Nếu thông tin tên sản phẩm và mã sản phẩm bị trung lặp -> báo lỗi
    while($row = mysqli_fetch_array($sql_truyxuat)){
      if($tensanpham == $row['tensanpham']){
        $check = false;
      }
      if($masanpham == $row['masanpham']){
        $check = false;
      }
    }

    if($check){
    $sql_them = "INSERT INTO tbl_sanpham(tensanpham,masanpham,giasanpham,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc)
                VALUE ('".$tensanpham."','".$masanpham."' , '".$giasp."' , '".$soluong."' ,'".$hinhanh."' ,'".$tomtat."' ,'".$noidung."' , '".$tinhtrang."' , '".$danhmuc."')";
    mysqli_query($mysqli,$sql_them);
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    header('Location:../../index.php?action=quanlysp&query=them');
    }else{
      echo '<p style="color:red">Thông tin điền vào bị lỗi . Có thể do thông tin điền vào đã tồn tại trong CSDL. Hoặc có thể thông tin bị trống. Vui lòng trở lại và nhập lại</p>
      <a href="../../index.php?action=quanlysp&query=them">Quay lại</a>';
    }
  }
  elseif(isset($_POST['suasanpham'])){
    $check = true;
    // Nếu bất kỳ một trong các trường này để trống -> không hợp lệ 
    if(empty($tensanpham)||empty($masanpham)||empty($giasp)||empty($soluong)||empty($hinhanh)||empty($noidung)||empty($danhmuc)){
      $check = false;
    }
    // Nếu giá sản phẩm và số lượng không đúng định dạng số -> báo lỗi
    if(!ctype_digit($giasp)||!ctype_digit($soluong)){
      $check = false;
    }
    if($check){ 
    // sua thong tin danh muc
    if(!empty($_FILES['hinhanh']['name'])){
    move_uploaded_file($hinhanh_tmp, 'uploads/'.$hinhanh);
    $sql_update = "UPDATE tbl_sanpham SET tensanpham ='".$tensanpham."' , masanpham = '".$masanpham."' , giasanpham = '".$giasp."' , soluong = '".$soluong."' , hinhanh = '".$hinhanh."' ,
    tomtat = '".$tomtat."' , noidung = '".$noidung."' , tinhtrang = '".$tinhtrang."', id_danhmuc = '".$danhmuc."' where id_sanpham = $_GET[idsanpham]";
    // xoa anh cu
    $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    while($row = mysqli_fetch_array($query)){
    unlink('uploads/'.$row['hinhanh']);
    }
    }
    else{
    $sql_update = "UPDATE tbl_sanpham SET tensanpham ='".$tensanpham."' , masanpham = '".$masanpham."' , giasanpham = '".$giasp."' , soluong = '".$soluong."' ,
    tomtat = '".$tomtat."' , noidung = '".$noidung."' , tinhtrang = '".$tinhtrang."' , id_danhmuc = '".$danhmuc."'  where id_sanpham = $_GET[idsanpham]";
    }
    mysqli_query($mysqli,$sql_update);
    header('Location:../../index.php?action=quanlysp&query=them');
    }else{
      echo '<p style="color:red">Thông tin điền vào bị lỗi . Có thể do thông tin điền vào bị trùng lặp hoặc để trống .  Vui lòng trở lại và nhập lại</p>';
    }
}
  else{
     $id = $_GET['idsanpham'];
     $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '".$id."' LIMIT 1";
     $query = mysqli_query($mysqli,$sql);
     while($row = mysqli_fetch_array($query)){
      unlink('uploads/'.$row['hinhanh']);
     }
     $mysql_delete = "DELETE from tbl_sanpham where id_sanpham = '".$id."'";
     mysqli_query($mysqli,$mysql_delete);
     header('Location:../../index.php?action=quanlysp&query=them');
  }
?>
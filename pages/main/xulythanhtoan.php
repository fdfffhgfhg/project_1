<?php
   session_start();
   include("../../admin/config/connect.php");
   require('../../carbon/autoload.php');
   use Carbon\Carbon;
   use Carbon\CarbonInterval;
   $now = Carbon::now('Asia/Ho_Chi_Minh');
   $id_khachhang = $_SESSION['id_khachhang'];
   $code_order = rand(0,9999);
   // lay id van chuyen
   $cart_payment = $_POST['payment'];
   $id_dangky = $_SESSION['id_khachhang'];
   $sql = "SELECT * FROM tbl_shipping
           WHERE id_dangky = '$id_dangky'
            LIMIT 1";
   $query = mysqli_query($mysqli,$sql);
   $row = mysqli_fetch_array($query);
   $id_shipping = $row['id_shipping'];
   $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date,cart_payment,cart_shipping)
                VALUE('".$id_khachhang."','".$code_order."',1,'".$now."','".$cart_payment."','".$id_shipping."');";
   $cart_query = mysqli_query($mysqli,$insert_cart);
   if($cart_query){
      foreach($_SESSION['cart'] as $key => $value){
        $id_sanpham = $value['id'];
        $soluong = $value['soluong'];
        $insert_detail = "INSERT INTO tbl_cart_detail(id_sanpham,code_cart,soluongmua)
                          VALUE('".$id_sanpham."','".$code_order."','".$soluong."'); ";
        mysqli_query($mysqli,$insert_detail);
      }
   }
   unset($_SESSION['cart']);
   header("Location:../../index.php?quanly=camon");
?>
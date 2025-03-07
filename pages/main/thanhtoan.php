<?php
   session_start();
   include("../../admin/config/connect.php");
   require('../../carbon/autoload.php');
   use Carbon\Carbon;
   use Carbon\CarbonInterval;
   $now = Carbon::now('Asia/Ho_Chi_Minh');
   $id_khachhang = $_SESSION['id_khachhang'];
   $code_order = rand(0,9999);
   $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date)
                VALUE('".$id_khachhang."','".$code_order."',1,'".$now."');";
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
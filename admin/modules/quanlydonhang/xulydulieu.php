<?php
use Carbon\Carbon;
use Carbon\CarbonInterval;
require("../../../carbon/autoload.php");
include("../../config/connect.php");
$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
if(isset($_GET['code'])){
      $code_cart = $_GET['code'];
      $sql = "UPDATE tbl_cart
              SET cart_status = 0
              WHERE code_cart = '".$code_cart."'";
      $query = mysqli_query($mysqli,$sql);

      $sql_lietke_dh = "SELECT * FROM tbl_cart_detail,tbl_sanpham 
                        WHERE tbl_cart_detail.id_sanpham=tbl_sanpham.id_sanpham
                        AND tbl_cart_detail.code_cart='$code_cart'
                        ORDER BY tbl_cart_detail.id_cart_detail DESC";
      $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
      $sql_thongke = "SELECT * FROM tbl_thongke
                      WHERE ngay_dat = '$now'";
      $query_thongke = mysqli_query($mysqli,$sql_thongke);
      $total = 0;
      $giatien = 0;
      while($row = mysqli_fetch_array($query_lietke_dh)){
            $total += $row['soluongmua'];
            $giatien += $row['giasanpham']*$row['soluongmua'];
      }
      if(mysqli_num_rows($query_thongke) == 0){
            $soluongban = $total;
            $doanhthu = $giatien;
            $donhang = 1;
            $sql_update_thongke = "INSERT INTO tbl_thongke(ngay_dat,soluongban,doanhthu,donhang) VALUE ('$now','$soluongban','$doanhthu','$donhang')";
            $query_update_thongke = mysqli_query($mysqli,$sql_update_thongke);
      }elseif(mysqli_num_rows($query_thongke) != 0){
            while($row_tk = mysqli_fetch_array($query_thongke)){
                 $soluongban = $row_tk['soluongban'] + $total;
                 $doanhthu = $row_tk['doanhthu'] + $giatien;
                 $donhang = $row_tk['donhang'] + 1;
                 $sql_update_thongke = "UPDATE tbl_thongke 
                                        SET soluongban = '$soluongban' , doanhthu = '$doanhthu' , donhang = '$donhang'
                                        WHERE ngay_dat = '$now'"; 
                 $query_update_thongke = mysqli_query($mysqli,$sql_update_thongke);
            }
      }

      header("Location:../../index.php?action=quanlydonhang&query=lietke");

}

?>
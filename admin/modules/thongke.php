<?php
     use Carbon\Carbon;
     use Carbon\CarbonInterval;
     include('../config/connect.php');
     require('../../carbon/autoload.php');

     if(isset($_POST['thoigian'])){
          $thoigian = $_POST['thoigian'];
     }else{
          $thoigian = '';
          $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
     }


     if($thoigian == '7ngay'){
          $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
     }else if($thoigian == '28ngay'){
          $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(28)->toDateString();
     }
     else if($thoigian == '90ngay'){
          $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(90)->toDateString();
     }
     else if($thoigian == '365ngay'){
          $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
     }
     $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
     $sql = "SELECT * FROM tbl_thongke where ngay_dat BETWEEN '$subdays' AND '$now' ORDER BY ngay_dat ASC";
     $sql_query = mysqli_query($mysqli,$sql);

     while($row = mysqli_fetch_array($sql_query)){
          $chart_data[] = array(
               'date' => $row['ngay_dat'],
               'order' => $row['donhang'],
               'sales' => $row['doanhthu'],
               'quantity' => $row['soluongban']
          );

     }
    //print_r($chart_data);
     echo $data = json_encode($chart_data);






?>
<?php
   session_start();
   include('config/connect.php');
   if(isset($_POST['dangnhap'])){
    
    
    $taikhoan = $_POST['username'];
    $matkhau = md5($_POST['password']);
    $sql = "SELECT * FROM tbl_admin 
            where username = '".$taikhoan."'
            and password = '".$matkhau."'
            limit 1";
    $row= mysqli_query($mysqli,$sql);
    $count = mysqli_num_rows($row);
    if($count > 0){
        $_SESSION['dangnhap'] = $taikhoan;
        header("Location:index.php");
    }else{
        echo '<script>alert("Tai khoan hoac mat khau khong dung, vui long nhap lai.")</script>';
        header("Location:login.php");
    }
   }
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Đăng nhập Admin</title>
        <style type="text/css">
            body{
                background: #f2f2f2;
            }
            .wrapper-login{
                margin : auto auto;
                width : 25%;
                padding : 150px;
            }
            .table-login{
                width : 100%;
                text-align: center;
                border-collapse: collapse;
                border : 1px solid black;          
            }
            .table-login tr{
                border : 1px solid black;
            }
            table.table-login tr td{
                padding : 8px;
            }
        </style>
     </head>
     <body>
     <div class="wrapper-login">
        <form action="" method="post" autocomplete="off">
        <table class="table-login">
          <tr style="border:1px solid black;">
            <td colspan="2"><h3>Trang đăng nhập cho admin</h3></td>
          </tr>  
         <tr>
            <td>Tài khoản</td>
            <td><input type="text" name="username"></td>
         </tr>
         <tr>
            <td>Mật khẩu</td>
            <td><input type="password" name="password"></td>
         </tr>
         <tr>
            <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
         </tr>
        </table>
        </form>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     </body>
</html>
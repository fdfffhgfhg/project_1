<?php
   if(isset($_POST['doimatkhau'])){
    $taikhoan = $_POST['email'];
    $matkhau_cu = md5($_POST['password_cu']);
    $matkhau_moi = md5($_POST['password_moi']);
    
    $sql = "SELECT * FROM tbl_dangky
            where email = '".$taikhoan."'
            and matkhau = '".$matkhau_cu."'
            limit 1";
    $row= mysqli_query($mysqli,$sql);
    $count = mysqli_num_rows($row);
    if($count > 0){
        $sql_update = "update tbl_dangky 
                       set matkhau = '".$matkhau_moi."'
                       where email = '".$taikhoan."'
                       and matkhau = '".$matkhau_cu."';";
        $query_update = mysqli_query($mysqli,$sql_update);
        echo '<p style="color:green;">Mật khẩu thay đổi thành công</p>';
       // header("Location:index.php");
    }else{
        echo '<script>alert("Tai khoan hoac mat khau khong dung, vui long nhap lai.")</script>';
    }
   }
?>
<form action="" autocomplete="off" method="post" autocomplete="off">
        <table class="table-login" border="1" style="text-align: center;border-collapse:collapse;">
          <tr style="border:1px solid black;">
            <td colspan="2"><h3>Đổi mật khẩu</h3></td>
          </tr>  
         <tr>
            <td>Tài khoản</td>
            <td><input type="text" name="email"></td>
         </tr>
         <tr>
            <td>Mật khẩu cũ</td>
            <td><input type="password" name="password_cu"></td>
         </tr>
         <tr>
            <td>Mật khẩu mới</td>
            <td><input type="password" name="password_moi"></td>
         </tr>
         <tr>
            <td colspan="2"><input type="submit" name="doimatkhau" value="Đổi mật khẩu"></td>
         </tr>
        </table>
</form>
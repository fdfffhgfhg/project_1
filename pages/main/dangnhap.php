<?php
   if(isset($_POST['dangnhap'])){
    
    $temp = $_POST['email'];
    if(preg_match('/^[a-zA-Z0-9._%+-]+@gmail\.com$/',$temp)){
        $email = $temp;
    }
    else{
        $email = '';
    }
    $matkhau = md5($_POST['password']);
    if(!empty($email)&&!empty($matkhau)){
    $sql = "SELECT * FROM tbl_dangky 
            where email = '".$email."'
            and matkhau = '".$matkhau."'
            limit 1";
    $row= mysqli_query($mysqli,$sql);
    $count = mysqli_num_rows($row);
    if($count > 0){
        $row_data = mysqli_fetch_array($row);
        $_SESSION['id_khachhang'] = $row_data['id_dangky'];
        $_SESSION['dangky'] = $row_data['tenkhachhang'];
        echo '<p style="color:green">Đăng nhập thành công</p>';
    }else{
        echo '<p style="color:red">Tài khoản hoặc mật khẩu bị sai , vui lòng nhập lại</p>';
    }
   }
   else{
      echo '<p style="color:red">Thông tin điền vào bị thiếu hoặc không đúng định dạng , vui lòng nhập lại</p>';
   }
}
?>



<form action="" method="post" autocomplete="off">
        <table border="1" class="table-login" style="text-align: center;border-collapse:collapse" >
          <tr>
            <td colspan="2"><h3>Trang đăng nhập cho khách hàng</h3></td>
          </tr>  
         <tr>
            <td>Tài khoản</td>
            <td><input type="text" name="email" placeholder="Email"></td>
         </tr>
         <tr>
            <td>Mật khẩu</td>
            <td><input type="password" name="password" placeholder="Password"></td>
         </tr>
         <tr>
            <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
         </tr>
        </table>
</form>
<?php
   if(isset($_POST['dangky'])){
    $tenkhachhang = $_POST['hovaten'];

    $temp = $_POST['email'];
    if(preg_match('/^[a-zA-Z0-9._%+-]+@gmail\.com$/',$temp)){
        $email = $temp;
    }
    else{
        $email = '';
    }
    $dienthoai = $_POST['dienthoai'];
    if(!ctype_digit($dienthoai)){
        $dienthoai = '';
    }
    $diachi = $_POST['diachi'];
    $matkhau = md5($_POST['matkhau']);
    if(!empty($tenkhachhang) && !empty($email) && !empty($dienthoai) &&!empty($diachi) && !empty($matkhau)){
         $sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai)
                        value ('".$tenkhachhang."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
        if($sql_dangky){
            echo '<p style="color:green">Đăng ký thành công</p>';
            $_SESSION['dangky'] = $tenkhachhang;
            $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli);    
        }
    }
    else{
        echo '<p style="color:red">Thông tin điền bị thiếu hoặc không hợp lệ , vui lòng điền lại</p>';
    }
   }
?>


<p>Đăng ký thành viên</p>
<style type="text/css">
    table.dangky tr td{
        padding : 5px;
        text-align:center;
    }
</style>
<form action="" method="POST">
<table class="dangky" border="1" width="50%" style="border-collapse: collapse;">
    <tr>
        <td> Họ và tên </td>
        <td> <input type="text" size="50" name="hovaten"></td>
    </tr>
    <tr>
        <td> Email </td>
        <td> <input type="text" size="50" name="email"></td>
    </tr>
    <tr>
        <td> Điện thoại </td>
        <td> <input type="text" size="50" name="dienthoai"></td>
    </tr>
    <tr>
        <td> Địa chỉ </td>
        <td> <input type="text" size="50" name="diachi"></td>
    </tr>
    <tr>
        <td> Mật khẩu </td>
        <td> <input type="text" size="50" name="matkhau"></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" name="dangky" value="Đăng ký"></td>
        <td><a href="index.php?quanly=dangnhap">Đã có tài khoản?</a></td>
    </tr>
</table>
</form>
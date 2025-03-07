<div class="container">		
<div class="arrow-steps clearfix">
          <div class="step done"><span> <a href="index.php?quanly=giohang"> Giỏ hàng</a></span> </div>
          <div class="step current"><span><a href="index.php?quanly=vanchuyen">Vận chuyển</a></span> </div>
          <div class="step"><span> <a href="index.php?quanly=thongtinthanhtoan">Thanh toán</a></span> </div>
          <div class="step"><span> <a href="index.php?quanly=donhangdadat">Lịch sử đơn hàng</a></span> </div>
</div>
<h4>Thông tin vận chuyển</h4>
<?php
    if(isset($_POST['themvanchuyen'])){
        $name = $_POST['name'];
        $temp = $_POST['phone'];
        if(ctype_digit($temp)){
            $phone = $temp;
        }else{
            $phone = '';
        }
        $address = $_POST['address'];
        $note = $_POST['note'];
        $id_dangky=$_SESSION['id_khachhang'];
        if(!empty($name)&&!empty($phone)&&!empty($address)&&!empty($note)){
        $sql = "INSERT INTO tbl_shipping(name,phone,diachi,note,id_dangky) VALUES ('$name','$phone','$address','$note','$id_dangky')";
        $query = mysqli_query($mysqli,$sql);
        if($query){
            echo '<script>alert("Thêm thông tin thành công")</script>';
        }
        }
        else{
            echo '<p style="color:red">Thông tin bị thiếu hoặc không hợp lệ , vui lòng kiểm tra lại</p>';
        }
    }
    elseif(isset($_POST['capnhatvanchuyen'])){
        $name = $_POST['name'];
        $temp = $_POST['phone'];
        if(ctype_digit($temp)){
            $phone = $temp;
        }else{
            $phone = '';
        }
        $address = $_POST['address'];
        $note = $_POST['note'];
        $id_dangky=$_SESSION['id_khachhang'];
        if(!empty($name)&&!empty($phone)&&!empty($address)&&!empty($note)){
        $sql = "UPDATE tbl_shipping
                SET name = '$name',
                 phone = '$phone',
                 diachi = '$address',
                 note = '$note',
                 id_dangky = '$id_dangky'
                 WHERE id_dangky = '$id_dangky'";
        $query = mysqli_query($mysqli,$sql);
        if($query){
            echo '<script>alert("Cập nhật thông tin thành công")</script>';
        }
        }
        else{
            echo '<p style="color:red">Thông tin bị thiếu hoặc không hợp lệ , vui lòng kiểm tra lại</p>';
        }
    }
?>
<div class="row">
<?php
  $id_dangky = $_SESSION['id_khachhang'];
  $sql = "SELECT * FROM tbl_shipping
           WHERE id_dangky = '$id_dangky'
           LIMIT 1";
  $query = mysqli_query($mysqli,$sql);
  $count = mysqli_num_rows($query);
  if($count > 0){
    $row = mysqli_fetch_array($query);
    $name = $row['name'];
    $phone = $row['phone'];
    $address = $row['diachi'];
    $note = $row['note'];
  }
  else{
    $name = '';
    $phone = '';
    $address = '';
    $note = '';
  }
?>
<div class="col-md-4">
<form action="" autocomplete="off" method="POST">
    <div class="form-group">
        <label for="name">Tên khách hàng</label>
        <input type="text" name="name" placeholder="...." value="<?php echo $name?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="phone">Điện thoại</label>
        <input type="text" name="phone" value="<?php echo $phone?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="add">Địa chỉ</label>
        <input type="text" name="address" value="<?php echo $address?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="note">Ghi chú</label>
        <input type="text" name="note" class="form-control">
    </div>
    <?php
    if(empty($name) && empty($phone)){
    ?>
    <button type="submit" name="themvanchuyen" class="btn btn-primary">Thêm thông tin</button>
    <?php
    }elseif(!empty($name) && !empty($phone)){
    ?>
    <button type="submit" name="capnhatvanchuyen" class="btn btn-success">Cập nhật thông tin</button>
    <?php
    }
    ?>
</form>
</div>

<!--Thong tin gio hang-->

<table style="width:100%;
            text-align:center;
            border-collapse:collapse;"
            border="1">
    <tr>
       <th>Id sản phẩm</th>
       <th>Mã sản phẩm</th>
       <th>Tên sản phẩm</th>
       <th>Hình ảnh</th>
       <th>Số lượng</th>
       <th>Giá sản phẩm</th>
       <th>Thành tiền</th>
    </tr>
    <?php if(isset($_SESSION['cart'])){
        $tongtien = 0;
        $i = 0;
        foreach($_SESSION['cart'] as $cart_item){
            $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
            $tongtien += $thanhtien;
            $i++;
     ?>   
    <tr>  
       <td><?php echo $i ?></td>
       <td><?php echo $cart_item['masp']?></td>
       <td><?php echo $cart_item['tensanpham']?></td>
       <td><img src="admin/modules/quanlysanpham/uploads/<?php echo $cart_item['hinhanh']?> " width="150px"></td>
       <td>   
         <?php echo $cart_item['soluong']?>   
      </td>
       <td><?php echo number_format($cart_item['giasp'],0,',','.').'vnd'?></td>
       <td><?php echo number_format($thanhtien,0,',','.').'vnd'?></td>
    </tr>
    <?php
        }
     ?>
     <tr>
     <td colspan="8">
        <p style="float:left">Tổng tiền : <?php echo number_format($tongtien,0,',','.').'vnd' ?><br></p>
        <div style="clear:both"></div>
        <?php
          if(isset($_SESSION['dangky'])){
            ?>
            <p><a href="index.php?quanly=thongtinthanhtoan">Hình thức thanh toán</a></p>
         <?php
          }else{
         ?>
         <p><a href="index.php?quanly=dangky">Đăng ký đặt hàng</a></p>
         <?php
          }
          ?>
    </td> 
     </tr>
     <?php
    }else{
    ?>
      <td colspan="6"><p>Hiện tại giỏ hàng trống</p></td> 
    <?php
    }
    ?>
    <tr>
    </tr>
</table>
</div>
</div>
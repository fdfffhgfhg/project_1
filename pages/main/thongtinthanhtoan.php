<div class="container">		
<div class="arrow-steps clearfix">
          <div class="step done"><span> <a href="index.php?quanly=giohang">Giỏ hàng</a></span> </div>
          <div class="step done"><span> <a href="index.php?quanly=vanchuyen">Vận chuyển</a></span> </div>
          <div class="step current"><span> <a href="index.php?quanly=thongtinthanhtoan">Thanh toán</a></span> </div>
          <div class="step"><span> <a href="index.php?quanly=donhangdadat">Lịch sử đơn hàng</a></span> </div>
</div>
<form action="pages/main/xulythanhtoan.php" method="POST">
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
    <div class="col-md-8">
         <h4>Thông tin vận chuyển và giỏ hàng</h4>
         <ul>
            <li>Họ và tên : <?php echo $name ?> </li>
            <li>Số điện thoại : <?php echo $phone ?> </li>
            <li>Địa chỉ : <?php echo $address ?> </li>
            <li>Ghi chú : <?php echo $note ?> </li>
         </ul>
         <h5>Giỏ hàng của bạn</h5>
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
            <td><?php echo number_format($tongtien,0,',','.').'vnd'?></td>
            </tr>
            <?php
              }
            ?>
            <tr>
            <td colspan="8">
            <p style="float:left">Tổng tiền : <?php echo number_format($tongtien,0,',','.').'vnd' ?><br></p>
            <div style="clear:both"></div>
            </td> 
            </tr>
            <?php
            }
            ?>
            <tr>
            </tr>
            </table>
    </div>
    <div class="col-md-4 pttt">
         <h4>Phương thức thanh toán</h4>
         <div class="custom-control custom-radio">
           <input type="radio" id="customRadio1" name="payment" class="custom-control-input" value="Tiền mặt" checked>
           <label class="custom-control-label" for="customRadio1">
              Tiền mặt
           </label>
         </div>
         <div class="custom-control custom-radio">
           <input type="radio" id="customRadio2" name="payment" class="custom-control-input" value="Chuyển khoản">
           <label class="custom-control-label" for="customRadio2">
              Chuyển khoản
           </label>
         </div>
         <div class="custom-control custom-radio">
           <input type="radio" id="customRadio3" name="payment" class="custom-control-input" value="Momo">
           <label class="custom-control-label" for="customRadio3">
           <img src="images/momo.png" width="32px" height="32px">
              Momo
           </label>
         </div>
         <div class="custom-control custom-radio">
           <input type="radio" id="customRadio4" name="payment" class="custom-control-input" value="Vnpay">
           <label class="custom-control-label" for="customRadio4">
           <img src="images/vnpay.png" width="60px" height="24px">
              VnPay
           </label>
         </div>
         <input type="submit" name="thanhtoanngay" value="Thanh toán ngay" class="btn btn-danger">
    </div>
</div>
</div>
</div>
</form>

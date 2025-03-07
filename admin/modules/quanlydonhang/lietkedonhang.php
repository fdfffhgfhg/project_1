<p>Liệt kê đơn hàng</p>

<?php
    $sql_lietke_dh = "SELECT * FROM tbl_cart,tbl_dangky
                      where tbl_cart.id_khachhang = tbl_dangky.id_dangky
                      order by id_cart desc";
    $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
    
?>
<table style="width:100%" border="1" style="border-collapse: collapse;">
    <tr>
        <th>Id</th>
        <th>Mã đơn hàng</th>
        <th>Tên khách hàng</th>
        <th>Địa chỉ</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Tình trạng</th>
        <th>Ngay dat</th>
        <th>Quản lý<th>
    </tr>
    <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_dh)){
        $i++;
    ?>
    <tr>
        <td style="text-align: center;"><?php echo $i ?></td>
        <td style="text-align: center;"><?php echo $row['code_cart']?></td>
        <td style="text-align: center;"><?php echo $row['tenkhachhang']?></td>
        <td style="text-align: center;"><?php echo $row['diachi']?></td>
        <td style="text-align: center;"><?php echo $row['email']?></td>
        <td style="text-align: center;"><?php echo $row['dienthoai']?></td>
        <td>
            <?php
              if($row["cart_status"] == 1){
                 echo '<a href="modules/quanlydonhang/xulydulieu.php?code='.$row['code_cart'].'">Đơn hàng mới</a>';
              }
              else{
                echo 'Đã xử lý';
              }
            ?>
        </td>
        <td><?php echo $row['cart_date'] ?></td>
        <td style="text-align: center;">
            <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart']?>">Xem don hang</a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
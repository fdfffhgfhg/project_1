<h3>Chi tiết đơn hàng</h3>
<?php
    $sql_lietke_dh = "SELECT * FROM tbl_cart_detail,tbl_sanpham
                      where tbl_cart_detail.id_sanpham = tbl_sanpham.id_sanpham
                      and tbl_cart_detail.code_cart = '$_GET[code]'
                      order by id_cart_detail desc";
    $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
    
?>
<table style="width:100%" border="1" style="border-collapse: collapse;">
    <tr>
        <th>Id</th>
        <th>Mã đơn hàng</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
    </tr>
    <?php
    $i = 0;
    $tongtien = 0;
    while($row = mysqli_fetch_array($query_lietke_dh)){
        $i++;
        $thanhtien = $row['giasanpham']*$row['soluongmua'];
        $tongtien += $thanhtien;
    ?>
    <tr>
        <td style="text-align: center;"><?php echo $i ?></td>
        <td style="text-align: center;"><?php echo $row['code_cart']?></td>
        <td style="text-align: center;"><?php echo $row['tensanpham']?></td>
        <td style="text-align: center;"><?php echo $row['soluongmua']?></td>
        <td style="text-align: center;"><?php echo number_format($row['giasanpham'] , 0 , "," , ".").'vnd'?></td>
        <td style="text-align: center;"><?php echo number_format($row['giasanpham']*$row['soluongmua'], 0 , "," , ".").'vnd'?></td>
        <td></td>
    </tr>
    <?php
    }
    ?>
    <tr>
        <td colspan="6">
             <p>Tổng tiền : <?php echo number_format($tongtien,0,",",".").'vnd' ?></p>
        </td>
    </tr>
</table>
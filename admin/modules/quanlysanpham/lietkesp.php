<?php
    $sql_lietke = "SELECT * FROM tbl_sanpham,danhmuc where tbl_sanpham.id_danhmuc = danhmuc.id_danhmuc order by id_sanpham desc";
    $query_lietke = mysqli_query($mysqli,$sql_lietke);
    
?>

<p>Liệt kê sản phẩm</p>
<table style="width:100%" border="1" style="border-collapse: collapse;">
    <tr>
        <th>Id</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Giá sản phẩm</th>
        <th>Số lượng</th>
        <th>Danh mục</th>
        <th>Mã sản phẩm</th>
        <th>Tóm tắt</th>
        <th>Trạng thái</th>
        <th>Quản lý<th>
    </tr>
    <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke)){
        $i++;
    ?>
    <tr>
        <td style="text-align: center;"><?php echo $i ?></td>
        <td style="text-align: center;"><?php echo $row['tensanpham']?></td>
        <td style="text-align: center;"><img src = "modules/quanlysanpham/uploads/<?php echo $row['hinhanh']?>" width = "150px"></td>
        <td style="text-align: center;"><?php echo $row['giasanpham']?></td>
        <td style="text-align: center;"><?php echo $row['soluong']?></td>
        <td style="text-align: center;"><?php echo $row['tendanhmuc']?></td>
        <td style="text-align: center;"><?php echo $row['masanpham']?></td>
        <td style="text-align: center;"><?php echo $row['tomtat']?></td>
        <td style="text-align: center;">
            <?php 
                  if($row['tinhtrang'] == 1)
                    {echo "Kích hoạt";}
                  else
                    {echo "Ẩn";}
            ?>
        </td>
        <td style="text-align: center;">
            <a href="modules/quanlysanpham/xulydulieu.php?idsanpham=<?php echo $row['id_sanpham']?>">Xóa</a>
          | <a href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham']?>">Sửa</a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
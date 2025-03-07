<?php
    $sql_lietke = "SELECT * FROM tbl_baiviet,tbl_danhmucbaiviet
                 where tbl_baiviet.id_danhmuc_baiviet = tbl_danhmucbaiviet.id_danhmuc_baiviet
                  order by id_baiviet desc";
    $query_lietke = mysqli_query($mysqli,$sql_lietke); 
?>

<p>Liệt kê bài viết</p>
<table style="width:100%" border="1" style="border-collapse: collapse;">
    <tr>
        <th>Id</th>
        <th>Tên bài viết</th>
        <th>Hình ảnh</th>
        <th>Danh mục</th>
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
        <td style="text-align: center;"><?php echo $row['tenbaiviet']?></td>
        <td style="text-align: center;"><img src = "modules/quanlybaiviet/uploads/<?php echo $row['hinhanh']?>" width = "150px"></td>
        <td style="text-align: center;"><?php echo $row['tendanhmuc_baiviet']?></td>
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
            <a href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id_baiviet']?>">Xóa</a>
          | <a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['id_baiviet']?>">Sửa</a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
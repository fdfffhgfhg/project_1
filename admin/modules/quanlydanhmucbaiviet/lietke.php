<?php
    $sql_lietke = "SELECT * FROM tbl_danhmucbaiviet order by thutu asc";
    $query_lietke = mysqli_query($mysqli,$sql_lietke);
    
?>

<p>Danh mục bài viết</p>
<table style="width:100%" border="1" style="border-collapse: collapse;">
    <tr>
        <th>Id</th>
        <th>Tên danh mục bài viết</th>
        <th>Quản lý<th>
    </tr>
    <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke)){
        $i++;
    ?>
    <tr>
        <td style="text-align: center;"><?php echo $i ?></td>
        <td style="text-align: center;"><?php echo $row['tendanhmuc_baiviet']?></td>
        <td style="text-align: center;">
            <a href="modules/quanlydanhmucbaiviet/xuly.php?iddanhmucbaiviet=<?php echo $row['id_danhmuc_baiviet']?>">Xóa</a>
          | <a href="?action=quanlydanhmucbaiviet&query=sua&iddanhmucbaiviet=<?php echo $row['id_danhmuc_baiviet']?>">Sửa</a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
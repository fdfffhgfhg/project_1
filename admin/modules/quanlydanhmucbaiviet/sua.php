<?php
    $sql_suadanhmuc_baiviet = "SELECT * FROM tbl_danhmucbaiviet WHERE id_danhmuc_baiviet = '$_GET[iddanhmucbaiviet]' LIMIT 1";
    $query_suadanhmuc_baiviet = mysqli_query($mysqli,$sql_suadanhmuc_baiviet);
?>
<p>Sửa danh muc bài viết</p>
<table border="1" width="50%" style="border-collapse: collapse">
    <form method="POST" action="modules/quanlydanhmucbaiviet/xuly.php?iddanhmucbaiviet=<?php echo $_GET['iddanhmucbaiviet']?>">
    <?php
    while($row = mysqli_fetch_array($query_suadanhmuc_baiviet)){
    ?>    
    <tr>
        <td>Tên danh mục bài viết</td>
        <td><input type="text" name="tendanhmucbaiviet" width="100%" value="<?php echo $row['tendanhmuc_baiviet']?>"></td>
    </tr>
    <tr>
        <td>Thứ tự</td>
        <td><input type="text" name="thutu" value="<?php echo $row['thutu']?>"></td>
    </tr>
    <tr>
        <td colspan="2" style = "text-align: center;"><input type="submit" name="suadanhmucbaiviet" value="Sửa danh mục bai viet"></td>
    </tr>
    <?php
    }
    ?>
    </form>
</table>
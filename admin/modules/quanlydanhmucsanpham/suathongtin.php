<?php
    $sql_suadanhmuc = "SELECT * FROM danhmuc WHERE id_danhmuc = '$_GET[iddanhmuc]' ORDER BY thutu DESC LIMIT 1";
    $query_suadanhmuc = mysqli_query($mysqli,$sql_suadanhmuc);
?>
<p>Sửa thông tin danh mục</p>
<table border="1" width="50%" style="border-collapse: collapse">
    <form method="POST" action="modules/quanlydanhmucsanpham/xulydulieu.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>">
    <?php
    while($dong = mysqli_fetch_array($query_suadanhmuc)){
    ?>    
    <tr>
        <td>Tên danh mục</td>
        <td><input type="text" name="tendanhmuc" width="100%" value="<?php echo $dong['tendanhmuc']?>"></td>
    </tr>
    <tr>
        <td>Thứ tự</td>
        <td><input type="text" name="thutu" value="<?php echo $dong['thutu']?>"></td>
    </tr>
    <tr>
        <td colspan="2" style = "text-align: center;"><input type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm"></td>
    </tr>
    <?php
    }
    ?>
    </form>
</table>
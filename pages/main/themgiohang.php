<?php
     //session_destroy();
     session_start();
     include('../../admin/config/connect.php');
     // Them so luong gio hang
        if(isset($_SESSION['cart'])&&$_GET['cong']){
          $id = $_GET['cong'];
          foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){
              $product[] = array('tensanpham'=>$cart_item['tensanpham'],
                                 'id'=>$cart_item['id'],
                                 'soluong'=>$cart_item['soluong'],
                                 'giasp'=>$cart_item['giasp'],
                                 'hinhanh'=>$cart_item['hinhanh'],
                                 'masp'=>$cart_item['masp']);
            }
            elseif($cart_item['id']==$id){
              $product[] = array('tensanpham'=>$cart_item['tensanpham'],
                                 'id'=>$cart_item['id'],
                                 'soluong'=>$cart_item['soluong']+1,
                                 'giasp'=>$cart_item['giasp'],
                                 'hinhanh'=>$cart_item['hinhanh'],
                                 'masp'=>$cart_item['masp']);
            }
          $_SESSION['cart'] = $product;
          header('Location:../../index.php?quanly=giohang');
          }
        }
     // Tru so luong
     if(isset($_SESSION['cart'])&&$_GET['tru']){
      $id = $_GET['tru'];
      foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['id']!=$id){
          $product[] = array('tensanpham'=>$cart_item['tensanpham'],
                             'id'=>$cart_item['id'],
                             'soluong'=>$cart_item['soluong'],
                             'giasp'=>$cart_item['giasp'],
                             'hinhanh'=>$cart_item['hinhanh'],
                             'masp'=>$cart_item['masp']);
        }
        elseif($cart_item['id']==$id){
              if($cart_item['soluong']>1){
                  $product[] = array('tensanpham'=>$cart_item['tensanpham'],
                             'id'=>$cart_item['id'],
                             'soluong'=>$cart_item['soluong']-1,
                             'giasp'=>$cart_item['giasp'],
                             'hinhanh'=>$cart_item['hinhanh'],
                             'masp'=>$cart_item['masp']);
          }
        }
      $_SESSION['cart'] = $product;
      header('Location:../../index.php?quanly=giohang');
      }
    }
     // Xoa san pham
       if(isset($_SESSION['cart'])&&$_GET['xoa']){
       $id = $_GET['xoa'];
       foreach($_SESSION['cart'] as $cart_item){
          if($cart_item['id']!=$id){
            $product[] = array('tensanpham'=>$cart_item['tensanpham'],
                               'id'=>$cart_item['id'],
                               'soluong'=>$cart_item['soluong'],
                               'giasp'=>$cart_item['giasp'],
                               'hinhanh'=>$cart_item['hinhanh'],
                               'masp'=>$cart_item['masp']);
          }
          $_SESSION['cart'] = $product;
          header('Location:../../index.php?quanly=giohang');
          
       }
     }
     // Xoa tat ca
     if(isset($_GET['xoatatca']) && $_GET['xoatatca']){
        unset($_SESSION['cart']);  //chi dinh sessioncart de xoa
        header('Location:../../index.php?quanly=giohang');
     }
     // Them san pham vao gio hang
     if(isset($_POST['themgiohang'])){
        $id = $_GET['idsanpham'];
        $soluong = 1;
        $sql = "select * from tbl_sanpham where id_sanpham = '".$id."' limit 1";
        $query = mysqli_query($mysqli,$sql);
        $row = mysqli_fetch_array($query);
        if($row){
           $new_product = array(array('tensanpham'=>$row['tensanpham'],
                                        'id'=>$id,
                                        'soluong'=>$soluong,
                                        'giasp'=>$row['giasanpham'],
                                        'hinhanh'=>$row['hinhanh'],
                                        'masp'=>$row['masanpham']));
            // kiem tra gio hang da ton tai
            if(isset($_SESSION['cart'])){
              $found = false;
              foreach($_SESSION['cart'] as $cart_item){
                if($cart_item['id'] == $id){
                    $product[] = array('tensanpham'=>$cart_item['tensanpham'],
                                        'id'=>$cart_item['id'],
                                        'soluong'=>$cart_item['soluong']+1 ,
                                        'giasp'=>$cart_item['giasp'],
                                        'hinhanh'=>$cart_item['hinhanh'],
                                        'masp'=>$cart_item['masp']); 
                    $found = true;
                }
                else{
                    $product[] = array('tensanpham'=>$cart_item['tensanpham'],
                    'id'=>$cart_item['id'],
                    'soluong'=>$cart_item['soluong'],
                    'giasp'=>$cart_item['giasp'],
                    'hinhanh'=>$cart_item['hinhanh'],
                    'masp'=>$cart_item['masp']); 
                }
              }
              if($found == false){
                $_SESSION['cart'] = array_merge($product,$new_product);
              }
              else{
                $_SESSION['cart'] = $product;
              }
            }
            else{
              $_SESSION['cart'] = $new_product;   
            }                         
        }
        header('Location:../../index.php?quanly=giohang');
     }
?>
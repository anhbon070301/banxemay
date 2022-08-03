<?php
include "header.php";
?>

<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> MOWO - MOTO WORLD </title>
    <title> MOWO - MOTO WORLD </title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="/banxemaymvc/public/CSS/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/banxemaymvc/public/CSS/shop-homepage.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript -->
    <script src="/banxemaymvc/public/JS/jquery.min.js"></script>
    <script src="/banxemaymvc/public/JS/bootstrap.bundle.min.js"></script>

</head>

<body>
    <!-- Page Content -->
    <div class="container">
        <main>
            <div class="container-fluid">

                <div class="card mb-4">
                    <div class="card-header">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="/banxemaymvc/Thanhtoan/donhang/"> ĐƠN HÀNG </a></li>
                            <li class="breadcrumb-item active">
                                QUẢN LÝ GIỎ HÀNG
                            </li>
                        </ol>
                    </div>
                    <div class="card-header">
                        <i class="fa fa-shopping-cart"></i>
                        Dữ liệu giỏ hàng
                        &emsp; &emsp;
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- <form id="cart-from" action="/banxemaymvc/Cart/update/<?Php echo $value['id'] ?>" method="POST" > -->
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th> IDSP </th>
                                        <th> Tên sản phẩm</th>
                                        <th> Hình ảnh</th>
                                        <th> Giá $</th>
                                        <th> Số lượng </th>
                                        <th> Thành tiền </th>
                                        <th> Xóa </th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php

                                    foreach ($cart as $key => $value) :
                                        if ($key > 0) {
                                    ?>
                                            <tr>
                                                <td><?php echo $key++ ?></td>
                                                <td><?php echo $value['tensp'] ?></td>
                                                <td><img src="<?php echo $value['hinhanh'] ?>" alt="" sizes="" srcset=""></td>
                                                <td><?php echo $value['gia'] ?></td>
                                                <td>
                                                    <form action="/banxemaymvc/Cart/update/<?Php echo $value['id'] ?>/" method="post">
                                                        <input type="hidden" name="id" value="<?Php echo $value['id'] ?>">
                                                        <input type="hidden" name="tensp" value="<?Php echo $value['tensp'] ?>">
                                                        <input type="hidden" name="hinhanh" value="<?Php echo $value['hinhanh'] ?>">
                                                        <input type="hidden" name="gia" value="<?Php echo $value['gia'] ?>">
                                                        <input type="text" name="soluong" size="2" value="<?php echo $value['soluong'] ?>">
                                                        <button type="submit">Cập Nhật</button>
                                                    </form>
                                                </td>
                                                <td><?php echo number_format($value['gia'] * $value['soluong']) ?></td>
                                                <td>
                                                    <form action="/banxemaymvc/Cart/delete/<?Php echo $value['id'] ?>" method="post">
                                                        <input type="hidden" name="id" value="<?Php echo $value['id'] ?>">
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>

                                                </td>
                                            </tr>

                                    <?php  }
                                    endforeach ?>
                                    <tr>
                                        <td>Tổng tiền</td>
                                        <td colspan="6">
                                            <?php echo number_format(tongtien($cart)) ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- </form> -->
                            <a href="/banxemaymvc/Thanhtoan/muaxe/" class="btn btn-info">Đặt hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- /.container -->

    <!-- Footer -->

</body>

</html>
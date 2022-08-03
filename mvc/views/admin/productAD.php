<?php 
    if($_SESSION['USER'] == '')
    {
    header('Location: /banxemaymvc/Admin/login');    
    }
?>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> MOWO - MOTO WORLD </title>
    <link href="/banxemaymvc/public/CSS/styles.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/banxemaymvc/public/JS/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="/banxemaymvc/public/JS/chart-area-demo.js"></script>
    <script src="/banxemaymvc/public/JS/chart-bar-demo.js"></script>
    <script src="/banxemaymvc/public/JS/chart-pie-demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!--Logo-->
        <a class="navbar-brand" href="/banxemaymvc/Admin/home"> Moto World </a>

        <!--Logout-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#"> Đổi mật khẩu </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/banxemaymvc/Admin/logout"> Đăng xuất </a>
                    </div>
                </li>
            </ul>
        </form>
    </nav>

    <!--Menu-->
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading"> DANH MỤC </div>
                        <a class="nav-link collapsed" href="product.php" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-motorcycle"></i></div>
                            SẢN PHẨM
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">

                                <?php
                                    while($row = mysqli_fetch_array($data["hang"]))
                                    {
                                    ?>
                                                
                                        <a class="nav-link" href="/banxemaymvc/Product/show/<?=$row["tenhang"]?>"><?=$row["tenhang"]?></a>
                            
                                    <?php
                                    }
                                ?>
                            </nav>
                        </div>

                        <a class="nav-link" href="/banxemaymvc/Category/show/">
                            <div class="sb-nav-link-icon"> <i class="fas fa-warehouse"> </i></div>
                            HÃNG XE
                        </a>

                        <a class="nav-link" href="/banxemaymvc/Donhang/show/">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                            ĐƠN HÀNG
                        </a>
                        <a class="nav-link" href="/banxemaymvc/User/show/">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            KHÁCH HÀNG
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php
                    // //nếu có session tên dangnhap thì ta thực hiện lệnh dưới
                    if (isset($_SESSION['user']) && $_SESSION['user'] != NULL) {
                        echo $_SESSION['user'];
                    }
                    ?>
                </div>
            </nav>
        </div>

        <!--Content-->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4"> SẢN PHẨM <?php echo '' . $data["tenhang"] . ''; ?>
                    </h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/banxemaymvc/Admin/home"> DANH MỤC </a></li>
                        <li class="breadcrumb-item active">
                            SẢN PHẨM <?php echo '' . $data["tenhang"] . ''; ?>
                        </li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-motorcycle"></i>
                            Dữ liệu sản phẩm

                            &emsp; &emsp;

                            <a href="/banxemaymvc/Product/addProduct" class="btn btn-primary"> Thêm sản phẩm </a>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th> Chức năng </th>
                                            <th> ID</th>
                                            <th> Hình ảnh</th>
                                            <th> Tên sản phẩm</th>
                                            <th> Giá $</th>
                                            <th> Dài Rộng Cao</th>
                                            <th> Chiều cao yên </th>
                                            <th> Vỏ trước/sau</th>
                                            <th> Động cơ</th>
                                            <th> Dung tích xi lanh</th>
                                            <th> Công suất</th>
                                            <th> Dung tích nhớt</th>
                                            <th> Dung tích xăng</th>
                                            <th> Thắng trước/sau</th>
                                            <th> Hộp số</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                                <?php
                                                while($row = mysqli_fetch_array($data["product"]))
                                                {
                                                ?>
                                                            
                                                            <tr>
                                                        <td > 
                                                            <form method="post">
                                                                <input value=" <?= $row["id"] ?>" type="hidden" name="id" id="id">
                                                                <input value="<?= $row["tenhang"] ?>" type="hidden" name="tenhang" id="tenhang">    
                                                                <a class="btn btn-primary" href="/banxemaymvc/Product/updateProduct/<?= $row["id"] ?>/<?= $row["tenhang"] ?> "> Sửa </a> &emsp;   
                                                                <a class="btn btn-primary" href="/banxemaymvc/Product/delete/<?= $row["id"] ?>/<?= $row["tenhang"] ?> "> Xóa </a> &emsp;   
                                                            </form>
                                                        </td> 
                                                        <td> <?= $row["id"] ?> </td>
                                                        <td> <img src=' <?= $row["hinhanh"] ?>' height="100" width-max="100" alt="Khong tai duoc"> </td>
                                                        <td><?= $row["tensp"] ?></td>
                                                        <td><?= $row["gia"] ?></td>
                                                        <td><?= $row["kichthuoc"] ?></td>
                                                        <td><?= $row["chieucaoyen"] ?></td>  
                                                        <td><?= $row["sizebanh"] ?></td>  
                                                        <td><?= $row["engine"] ?></td> 
                                                        <td><?= $row["CC"] ?></td>  
                                                        <td><?= $row["congsuat"] ?></td> 
                                                        <td><?= $row["CCnhot"] ?></td>  
                                                        <td><?= $row["CCxang"] ?></td> 
                                                        <td><?= $row["phanh"] ?></td>  
                                                        <td><?= $row["gear"] ?></td> 
                                                  </tr>
                                       
                                                <?php
                                                }
                                                ?>
                                               
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted"> Copyright &copy; MOWO - MOTO WORLD 2021 </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
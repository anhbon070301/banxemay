<?php 
    if($_SESSION['USER'] == '')
    {
    header('Location: /banxemaymvc/Admin/login');    
    }
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> ADMIN </title>
    <link href="/banxemaymvc/public/CSS/styles_1.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/banxemaymvc/public/JS/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="/banxemaymvc/public/JS/datatables-demo.js"></script>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="/banxemaymvc/Admin/home"> MOWO </a>

        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

        </form>

        <!-- Navbar-->
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
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading"> DANH MỤC </div>
                        <a class="nav-link collapsed" href="product.jsp" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
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
                    //nếu có session tên dangnhap thì ta thực hiện lệnh dưới
                    if (isset($_SESSION['user']) && $_SESSION['user'] != NULL) {
                        echo $_SESSION['user'];
                    }
                    ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4"> HÃNG XE </h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/banxemaymvc/Admin/home"> DANH MỤC </a></li>
                        <li class="breadcrumb-item active"> QUẢN LÝ HÃNG XE </li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-users"></i>
                            Dữ liệu hãng
                            &emsp; &emsp;
                            <a href="/banxemaymvc/Category/addcategory" class="btn btn-primary"> Thêm sản phẩm </a>
                        </div>
                        <div class="md-form mt-4" >
                            <!-- <form action="" method="post" style="display: flex;">
                            &emsp; &emsp;
                            <input class="form-control" name="tim" style="width: 25%;" type="text" placeholder="Search" name="btnTim" aria-label="Search">
                            &emsp; &emsp;
                            <input type="submit" class="btn btn-outline-primary" name="btnTim" value="Tìm kiếm">
                            </form>                             -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th> Tên hãng </th>
                                            <th> Logo </th>
                                            <th> Chức năng </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                            while($rows = mysqli_fetch_array($data["category"]))
                                            {
                                            echo '<tr>
                                                        <td>' . $rows['tenhang'] . '</td>
                                                        <td> <img src=' . $rows['logo'] . ' height="100" width-max="100" alt="Khong tai duoc"> </td>   
                                                        <td> 
                                                            <form method="post" action="">
                                                            <input value="' . $rows['tenhang'] . '" type="hidden" name="tenhang" id="tenhang">
                                                            <a class="btn btn-primary" href="/banxemaymvc/Category/updatecategory/' . $rows['tenhang'] . '"> Sửa </a> &emsp;   
                                                            <a class="btn btn-primary" href="/banxemaymvc/Category/delete/' . $rows['tenhang'] . '" name="xoa" id="xoa"> Xóa </a>
                                                            </form>
                                                        </td> 
                                                  </tr>';
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
                        <div class="text-muted">Copyright &copy; MOWO - MOTO WORLD 2021</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>

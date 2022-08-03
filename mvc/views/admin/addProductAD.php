<!DOCTYPE html>
<?php 
    if($_SESSION['USER'] == '')
    {
    header('Location: /banxemaymvc/Admin/login');    
    }
?>

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
                                    $tenhang=$row["tenhang"];
                                ?>
                                            
                                    <a class="nav-link" href="/banxemaymvc/Product/show/<?=$tenhang?>"><?=$tenhang?></a>
                        
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
                    <h1 class="mt-4"> THÊM SẢN PHẨM </h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/banxemaymvc/Admin/home"> DANH MỤC </a></li>
                        <li class="breadcrumb-item active"> Thêm sản phẩm </li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-users"></i>
                            Thêm sản phẩm
                        </div>

                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="id_category"> Hãng </label>
                                            <select name="tenhang" id="tenhang">

                                                <?php
                                                // lấy dữ liệu hãng ra
                                                $servername = "localhost";
                                                $username = "root";
                                                $password = "";
                                                $dbname = "admin";
                                                
                                                // Create connection
                                                $conn = new mysqli($servername, $username, $password, $dbname);
                                                $sql = 'select * from hang';
                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    echo'<option>'.$row["tenhang"].'</option>  ';
                                                }
                                                } else {
                                                echo "0 results";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Tên sản phẩm </label>
                                            <input class="form-control py-4" id="name" name="name" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Giá </label>
                                            <input class="form-control py-4" id="gia" name="gia" type="text" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="small mb-1"> Hình ảnh </label>
                                    <input class="form-control py-4" id="hinhanh" name="hinhanh" type="text" />
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Kích thước </label>
                                            <input class="form-control py-4" id="kichthuoc" name="kichthuoc" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Chiều cao yên </label>
                                            <input class="form-control py-4" id="chieucaoyen" name="chieucaoyen" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Kích thước bánh </label>
                                            <input class="form-control py-4" id="kichthuocbanh" name="kichthuocbanh" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Động cơ </label>
                                            <input class="form-control py-4" id="dongco" name="dongco" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Dung tích </label>
                                            <input class="form-control py-4" id="cc" name="cc" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Công suất </label>
                                            <input class="form-control py-4" id="congsuat" name="congsuat" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="name"> Dung tích nhớt </label>
                                            <input class="form-control py-4" id="ccnhot" name="ccnhot" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Dung tích xăng </label>
                                            <input class="form-control py-4" id="ccxang" name="ccxang" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Phanh </label>
                                            <input class="form-control py-4" id="phanh" name="phanh" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1"> Hộp số </label>
                                            <input class="form-control py-4" id="hopso" name="hopso" type="text" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-4 mb-0">
                                    <button name="them" class="btn btn-primary btn-block"> THÊM </button>
                                </div>
                            </form>
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
<?php 
    if($_SESSION['USER'] == '')
    {
    header('Location: /banxemaymvc/Admin/login');    
    }
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> MOWO - MOTO WORLD </title>
    <link href="/banxemaymvc/public/CSS/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/banxemaymvc/public/JS/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="/banxemaymvc/public/JS/chart-area-demo.js"></script>
    <script src="/banxemaymvc/public/JS/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="/banxemaymvc/public/JS/datatables-demo.js"></script>

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
                        <a class="dropdown-item" href="#"> ?????i m???t kh???u </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/banxemaymvc/Admin/logout"> ????ng xu???t </a>
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
                        <div class="sb-sidenav-menu-heading"> DANH M???C </div>
                        <a class="nav-link collapsed" href="product.jsp" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-motorcycle"></i></div>
                            S???N PH???M
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <?php
                                // l???y d??? li???u h??ng ra
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
                            H??NG XE
                        </a>

                        <a class="nav-link" href="/banxemaymvc/Donhang/show/">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                            ????N H??NG
                        </a>
                        <a class="nav-link" href="/banxemaymvc/User/show/">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            KH??CH H??NG
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php
                    //n???u c?? session t??n dangnhap th?? ta th???c hi???n l???nh d?????i
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
                    <h1 class="mt-4"> ????N H??NG
                    </h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/banxemaymvc/Admin/home"> DANH M???C </a></li>
                        <li class="breadcrumb-item active">
                            QU???N L?? ????N H??NG
                        </li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-shopping-cart"></i>
                            D??? li???u ????n h??ng
                            &emsp; &emsp;
                        </div>
                        <div class="md-form mt-4" >
                            <!-- <form action="" method="post" style="display: flex;">
                            &emsp; &emsp;
                            <input class="form-control" name="tim" style="width: 25%;" type="text" placeholder="Search" name="btnTim" aria-label="Search">
                            &emsp; &emsp;
                            <input type="submit" class="btn btn-outline-primary" name="btnTim" value="T??m ki???m">
                            </form>                             -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered " id="" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th> Ch???c n??ng </th>
                                            <th> ID </th>
                                            <th> ID_User </th>
                                            <th> T??n </th>
                                            <th> T???ng ti???n </th>
                                            <th> S??? ??i???n tho???i </th>
                                            <th> Email </th>
                                            <th> ?????a ch??? </th>
                                            <th> Ghi ch?? </th>
                                            <th> Tr???ng th??i</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php                                        
                                        // l???y d??? li???u h??ng ra
                                                                              
                                        while($row = mysqli_fetch_array($data["donhang"])){
                                            echo '<tr>
                                                        <td> 
                                                            <div class="btn-group">
                                                                <div class="btn-group" >                            
                                                                    <form method="post" action="/banxemaymvc/Donhang/delete/' . $row['id'] . '">                                                                    
                                                                        <input value="' . $row['id'] . '" type="hidden" name="id" id="id">
                                                                        <button class="btn btn-primary" name="xoa" id="xoa"> X??a  &emsp;</button>                                                                                                                                        
                                                                    </form >    
                                                                </div>
                                                                &emsp;
                                                                <div class="btn-group">
                                                                    <form action="/banxemaymvc/Donhang/showGioHang/' . $row['id'] . '" method="post" >                                                                    
                                                                        <input value="' . $row['id'] . '" type="hidden" name="id" id="id">
                                                                        <button class="btn btn-primary"  name="sanpham" id=""> S???n Ph???m </button>                                                                    
                                                                    </form>  
                                                                </div>
                                                            </div>
                                                        </td> 
                                                        <td>' . $row['id'] . '</td>
                                                        <td>' . $row['id_user'] . '</td>  
                                                        <td>' . $row['ten'] . '</td>  
                                                        <td>' . $row['tongtien'] . '</td>
                                                        <td>' . $row['sdt'] . '</td>
                                                        <td>' . $row['email'] . '</td>  
                                                        <td>' . $row['diachi'] . '</td>  
                                                        <td>' . $row['ghichu'] . '</td> 
                                                        ';
                                            if ($row['trangthai'] == 0) {
                                                echo '<td>Ch??a x??? l??</td>';
                                            } else {
                                                echo '<td>Ho??n Th??nh</td>';
                                            }
                                            echo '                                                     
                                                        
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
                        <div class="text-muted"> Copyright &copy; MOWO - MOTO WORLD 2021 </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
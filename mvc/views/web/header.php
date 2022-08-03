<?php
// include('cartfunction.php');
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
function tongtien($cart)
{
  $tongtien = 0;
  foreach ($cart as $key => $value) {
    $tongtien +=  floatval($value['gia']) *  floatval($value['soluong']);
  }
  return $tongtien;
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> MOWO - MOTO WORLD </title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="/banxemaymvc/public/CSS/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="/banxemaymvc/public/CSS/shop-homepage.css" rel="stylesheet">
  <!-- Bootstrap core JavaScript -->
  <script src="/banxemaymvc/public/JS/scripts.js"></script>
  <script src="/banxemaymvc/public/JS/jquery.min.js"></script>
  <script src="/banxemaymvc/public/JS/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/banxemaymvc/Trangchu/home"> MOWO <i class="fa fa-motorcycle logo-icon"></i> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarResponsive">

        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/banxemaymvc/Trangchu/home">TRANG CHỦ
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"> GIỚI THIỆU </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"> TIN TỨC </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"> DỊCH VỤ </a>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse " id="navbarResponsive">



        <ul class="navbar-nav  ml-auto">

          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user fa-fw"></i>
              <i> <?php if (isset($_SESSION['USER'])) {
                    $user = $_SESSION['USER'];
                    echo $user['username'];
                  }
                  ?></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
              <?php
              if (isset($_SESSION['USER'])) {
                echo '
                     <a class="dropdown-item" href="/banxemaymvc/User/updateP/' . $user["email"] . '"> Đổi mật khẩu </a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="/banxemaymvc/User/logout"> Đăng xuất </a>';
              } else {
                echo ' <a class="dropdown-item" href="/banxemaymvc/User/login"> Đăng nhập </a>';
              }

              // if (isset( $data["gmail"])) {
              //   echo '
              //        <a class="dropdown-item"   href="/banxemaymvc/User/updateP/'.$data["gmail"].'"> Đổi mật khẩu </a>
              //        <div class="dropdown-divider"></div>
              //        <a class="dropdown-item" href="/banxemaymvc/User/login"> Đăng xuất </a>
              //        <div class="dropdown-divider"></div>
              //        <a class="dropdown-item" href="/banxemaymvc/User/delete/'.$data["gmail"].'"> Xóa tài khoản </a>';

              //      }else{
              //        echo ' <a class="dropdown-item" href="/banxemaymvc/User/login"> Đăng nhập </a>';
              //      }
              ?>
            </div>
          </li>

          <li class="nav-item ">
            <a href="/banxemaymvc/Cart/add/">
              <i class="fa fa-shopping-cart" style="padding-top: 12px;">
                <?php
                if (count($cart) == 0) {
                  echo '';
                } else {
                  echo (count($cart) - 1) . ' giỏ hàng ' . number_format(tongtien($cart)) . ' $';
                }
                ?>
              </i>
            </a>
          </li>
        </ul>

      </div>

    </div>
  </nav>

  <body>


</html>
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
  <!-- Page Content -->
  <div class="container">

    <div class="row">
      <div class="col-lg-3">
        <br>
        <div class="list-group">
          <?php
          // lấy dữ liệu hãng ra
          while ($row = mysqli_fetch_array($data["hang"])) {
            echo '<a class="list-group-item" href="' . $row['tenhang'] . '"> <img class="d-block img-fluid" src=' . $row['logo'] . ' alt="Khong tai duoc"> </a>  <p> </p>';
          }
          ?>
        </div>
      </div>

      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>

          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <?php
              $tenhang = $data["tenhang"];
              echo '<img class="d-block img-fluid" src="/banxemaymvc/public/HINH/LOGO/' . $tenhang . '.jpg" alt="Khong tai duoc">';

              ?>
            </div>
          </div>

          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
          <?php
          while ($row = mysqli_fetch_array($data["product"])) {
            echo '
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="thumbnail">
                  <a href="/banxemaymvc/Product/series/' . $row['id'] . '/' . $row['tenhang'] . '"> <img class="card-img-top" src=' . $row['hinhanh'] . '  height="200" alt="khongtaiduoc"> </a>
                    </div>
                  <div class="card-footer">
                    <h4 style="color: firebrick;" class="card-title"> ' . $row['tensp'] . ' </h4>
                  </div>

                  <div class="card-body">
                    <h5> ' . $row['gia'] . ' $ </h5>
                  </div>
                </div>
            </div> ';
          } ?>
        </div>

        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; MOWO - MOTO WORLD 2021</p>
    </div>
    <!-- /.container -->
  </footer>
</body>

</html>
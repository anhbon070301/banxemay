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
  <script src="/banxemaymvc/public/JS/jquery.min.js"></script>
  <script src="/banxemaymvc/public/JS/bootstrap.bundle.min.js"></script>


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
            while($row = mysqli_fetch_array($data["hang"])) { 
              echo '<a class="list-group-row" href="/banxemaymvc/Product/hang_xe/' . $row['tenhang'] . '"> <img class="d-block img-fluid" src=' . $row['logo'] . ' alt="Khong tai duoc"> </a>  <p> </p>';
            }
           ?>        
        </div>
      </div>
        <?php
            while($row = mysqli_fetch_array($data["product_id"]))
            {
            echo'
      <div class="col-lg-9">
        <center>
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">       
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="d-block img-fluid" src='.$row['hinhanh'].'  alt="Firstslide">
                <h2 style="color: firebrick;"> '.$row['tensp'].' </h2>
                <h5> Giá: '.$row['gia'].' $</h5>     
                 
                <form   action="/banxemaymvc/Cart/add/" method = "post">
                        <input type="hidden" name="id" id="id" value="'.$row['id'].'"/>
                        <input type="hidden" name="tensp" id="tensp" value="'.$row['tensp'].'"/>
                        <input type="hidden" name="gia" id="gia" value="'.$row['gia'].'"/>
                        <input type="hidden" name="hinhanh" id="hinhanh" value="'.$row['hinhanh'].'"/>
                        Số lượng : <input type="number" name="soluong" id="soluong" value="1"/>                     
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-shopping-cart"> </i> 
                        </button>
                </form>
            </div>                       
          </div>       
        </div> 
        </center>  
     
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <table class="table table-striped table-bordered table-list">
                    <tbody>
                        <tr> 
                            <td> <strong> Dài x Rộng x Cao : </strong> '.$row['kichthuoc'].' </td> 
                            <td> <strong> Độ cao yên : </strong> '.$row['chieucaoyen'].' </td>                     
                        </tr>
                        <tr> 
                            <td> <strong> Cỡ lốp trước/sau : </strong> '.$row['sizebanh'].' </td> 
                            <td> <strong> Loại động cơ : </strong> '.$row['engine'].' </td>                     
                        </tr>
                        <tr> 
                            <td> <strong> Dung tích xy-lanh : </strong> '.$row['CC'].' </td> 
                            <td> <strong> Công suất tối đa : </strong> '.$row['congsuat'].' </td>                     
                        </tr>
                        <tr> 
                            <td> <strong> Dung tích nhớt máy : </strong> '.$row['CCnhot'].' </td> 
                            <td> <strong> Dung tích xăng : </strong> '.$row['CCxang'].' </td>                     
                        </tr>
                        <tr> 
                            <td> <strong> Phanh trước/sau: </strong> '.$row['phanh'].' </td> 
                            <td> <strong> Hộp số : </strong> '.$row['gear'].' </td>                      
                        </tr>
                    </tbody>
                </table>    
        </div>           
        </div> ';}?>  
        
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->
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
<!-- <form onsubmit = "return donhang()" action="dathang.php">   -->
<!-- <form   action="cart.php?action=add" method = "post"> -->
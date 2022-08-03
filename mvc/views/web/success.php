<?php
include "header.php";

?>
<?php if (isset($_SESSION['USER'])) {
    $user = $_SESSION['USER'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>success</title>
</head>

<body>
    <section class="success">
        <div class="row justify-content-center">
            <div class="col-lg-7 ">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">ĐẶT HÀNG THÀNH CÔNG</h3>
                        <p>Chào
                            <span style="font-size: 20px; color: #378000;">
                                <?php echo $user['username']; ?>
                            </span>
                            , đơn hàng của bạn với mã
                            <span style="font-size: 20px; color: #378000;">MOWO
                                <?php
                                // $index = 1;
                                $row = mysqli_fetch_array($data["giohang"]);
                                echo '  ' . $row['id'];
                                ?>
                            </span> đã được đặt thành công. <br>
                            Đơn hàng của bạn đã được xác nhận . <br>
                            <!-- <span style="font-weight: bold;">Hiện tại do đang trong Chương trình Sale lớn, đơn hàng của quý khách sẽ gửi chậm hơn so với thời gian dự kiến từ 10-15 ngày. Rất mong quý khách thông cảm vì sự bất tiện này!</span><br> -->
                            <span style="color: red;">(Lưu ý: MOWO moto sẽ gọi xác nhận đơn hàng, mong bạn để ý cuộc gọi của MOWO)</span><br>
                            Cảm ơn <span style="font-size: 20px; color: #378000;"><?php echo $user['username']; ?></span> đã tin dùng sản phẩm của MOWO moto.
                        </p>
                        <div class="success-button">
                            <a href="/banxemaymvc/Thanhtoan/chitietdonhang/<?php echo $row['id'] ?>"><button>XEM CHI TIẾT ĐƠN HÀNG</button></a>
                            <a href="/banxemaymvc/Trangchu/home"><button>TIẾP TỤC MUA SẮM</button></a>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <p>Mọi thắc mắc quý khách vui lòng liên hệ hotline <span style="font-size: 20px; color: red;">0972529194</span> hoặc chat với kênh hỗ trợ trên website để được hỗ trợ nhanh nhất.</p>
                            <div class="col-md-6">
                                <div class="form-group">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
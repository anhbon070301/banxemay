<?php if (isset($_SESSION['USER'])) {
    $user = $_SESSION['USER'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> MOWO - MOTO WORLD </title>
    <link href="/banxemaymvc/public/CSS/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/banxemaymvc/public/JS/scripts.js"></script>
</head>
<style>
    .cachtren {
        margin-top: 100px;
    }
</style>

<body class="bg-primary " style="background-image: url('http://maxmoto.com.vn/wp-content/uploads/2019/12/21MY_Ninja_ZX-10R_GN1_action_11.jpg');">

    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4"> <strong> ĐỔI MẬT KHẨU </strong> </h3>
                                </div>
                                <div class="card-body">

                                    <form action="" method='post'>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user['email'] ?>">
                                        </div>



                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mật khẩu cũ</label>
                                            <input name="matkhaucu" type="password" class="form-control" id="exampleInputPassword1" placeholder="Vui lòng nhập mật khẩu cũ">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mật khẩu</label>
                                            <input name="matkhau" type="password" class="form-control" id="exampleInputPassword1" placeholder="Vui lòng nhập mật khẩu mới">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mật khẩu nhập lại</label>
                                            <input name="matkhaunl" type="password" class="form-control" id="exampleInputPassword1" placeholder="Vui lòng nhập lại mật khẩu mới">
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <input class="btn btn-primary" type="submit" name="doimk" value="Xác Nhận">
                                            <a class="small" href="/banxemaymvc/User/login"> Đăng nhập ?</a>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <div id="layoutAuthentication_footer " style="opacity: 0.8;">
            <footer class="py-4 bg-dark mt-auto ">
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
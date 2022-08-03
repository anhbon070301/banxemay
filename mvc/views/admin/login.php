
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MOWO - MOTO WORLD </title>
    <link href="/banxemaymvc/public/CSS/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/banxemaymvc/public/JS/scripts.js"></script>
</head>

<body  style="background-image: url('http://maxmoto.com.vn/wp-content/uploads/2019/12/21MY_Ninja_ZX-10R_GN1_action_11.jpg');">

    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content" style="margin-top: 4rem;">
            <main>
                <div class="container">
                    <div  class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4"> <strong> ĐĂNG NHẬP </strong> </h3>
                                </div>
                                <div class="card-body">

                                    <form method="post" >
                                        <input type="hidden" value="1" name="s">
                                        <?php
                                            if(!empty($_SESSION["username"])){
                                        ?>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress"> EMAIL </label>
                                            <input class="form-control py-4" id="username" name="username" type="text" value="<?= $_SESSION["username"]?>" />
                                        </div>
                                        <?php
                                            }else{
                                        ?>
                                            <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress"> USERNAME </label>
                                            <input class="form-control py-4" id="username" name="username"  type="text" />
                                        </div>
                                        <?php
                                            }
                                            ?>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword"> MẬT KHẨU </label>
                                            <input class="form-control py-4" id="password" name="password" type="password" />
                                        </div>
                                        <?php
                                        //nếu có session tên dangnhap thì ta thực hiện lệnh dưới
                                        if (isset($_SESSION['dangnhap']) && $_SESSION['dangnhap'] != NULL) {
                                            echo '<p style="color: red"> ' . $_SESSION['dangnhap'];
                                            ' </p>';
                                        }
                                        ?>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <input class="btn btn-primary" name="dangnhap" type="submit" value="Đăng Nhập">
                                            <a class="small" href="#"> Quên mật khẩu ?</a>
                                        </div>
                                       
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <footer style="margin-top: 5rem;" class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; MOWO - MOTO WORLD 2020</p>
    </div>
    </footer>
</body>
</html>
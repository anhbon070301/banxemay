
<?php

    class User extends Controller
    {

        function add()
        {
            if (isset($_POST['dangky'])) {
                $UserMD = $this->model("User_MD");
                $username = (isset($_POST['username'])) ? $_POST['username'] : "";
                $password = (isset($_POST['password'])) ? $_POST['password'] : "";
                $matkhaulai = (isset($_POST['nhaplai'])) ? $_POST['nhaplai'] : "";
                $email = (isset($_POST['email'])) ? $_POST['email'] : "";
                if ($username === "" || $password === "" || $matkhaulai === "" || $email === "") {
                    echo '<script> alert("Vui lòng nhập đầy đủ thông tin đăng kí! "); </script>';
                    $this->view("register");
                } else {
                    if ($password != $matkhaulai) {
                        echo '<script> alert("Mật khẩu không trùng! "); </script>';
                        $this->view("register");
                    } else {
                        $register = $UserMD->dangki($username, $password, $email, $matkhaulai);
                        // $this->view("register");
                        echo '<script> alert("Đăng kí thành công! "); </script>';
                        header('Location: ./login');
                    }
                }
            } else {
                $this->view("register");
            }
        }
        function login()
        {

            if (isset($_POST['dangnhap'])) {
                $UserMD = $this->model("User_MD");
                $password = (isset($_POST['password'])) ? $_POST['password'] : "";
                $email = (isset($_POST['email'])) ? $_POST['email'] : "";
                if ($password === "" || $email === "") {
                    // echo '<script> alert("Vui lòng nhập đầy đủ thông tin đăng nhập! "); </script>';
                    $_SESSION['dangnhap'] = 'Vui lòng nhập đầy đủ thông tin đăng nhập! !';
                    $this->view("login");
                } else {
                    $UserMD->Login($email, $password);
                    $ProductMD = $this->model("Product_MD");
                    $this->view('trangchu', ["gmail" => $email,"hang"=>$ProductMD->showTH()]);
                }
            } else {
                $this->view("login");
            }
        }

        function updateP($gmail)
        {
            if (isset($_POST['doimk'])) {
                $UserMD = $this->model("User_MD");
                $email = (isset($_POST["email"])) ? $_POST["email"] : "";
                $matkhau = (isset($_POST["matkhau"])) ? $_POST["matkhau"] : "";
                $matkhaucu = (isset($_POST["matkhaucu"])) ? $_POST["matkhaucu"] : "";
                $matkhaunl = (isset($_POST["matkhaunl"])) ? $_POST["matkhaunl"] : "";

                if ($matkhau == "" || $matkhaunl == "") {
                    echo '<script> alert("Vui lòng nhập đầy đủ thông tin! "); </script>';
                    $this->view("doiMK", ['gmail' => $gmail]);
                } else {

                    if ($matkhau != $matkhaunl) {
                        echo '<script> alert("Mật khẩu nhập lại sai! "); </script>';
                        $this->view("doiMK", ['gmail' => $gmail]);
                    } else {
                        $UserMD->updatePMD($email, $matkhaucu, $matkhau);
                        echo '<script> alert("Đổi thành công!"); </script>';
                        $this->view("trangchu", ['gmail' => $email]);
                    }
                }
            } else {
                $this->view("doiMK", ['gmail' => $gmail]);
            }
        }
        function show()
        {
            $trangthai = 0;
            if (isset($_POST["btnTim"])) {
                $trangthai = 1;
            } else {
                $trangthai = 0;
            }
            $productMD = $this->model("Product_MD");
            $UserMD = $this->model("User_MD");

            $this->viewAD("userAD", ["user" => $UserMD->showMD($trangthai), "hang"=>$productMD->showTH()]);
        }
        function delete($id)
        {
            $UserMD = $this->model("User_MD");
            $UserMD->deleteMD($id);
            header('Location: /banxemaymvc/User/show/');
        }
        function logout()
        {
            if (isset($_SESSION['USER']) && $_SESSION['USER'] != NULL) {
                unset($_SESSION['USER']);
                header('Location: /banxemaymvc/Trangchu/home');
            }
        }
    }
?>

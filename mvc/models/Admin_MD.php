<?php
    class admin_MD extends DB {

        function Login($username, $password)
        {
            $sql = 'select * from taikhoan where username = "'.$username.'" and password = "'.$password.'" ';
            $query = mysqli_query($this->con, $sql);
            $date = mysqli_fetch_assoc($query);
            $num_rows = mysqli_num_rows($query);
            if ($num_rows == 0) {
                // echo '<script> alert("Sai tài khoản hoặc mật khẩu! Đăng nhập thất bại! "); </script>';
                $_SESSION['dangnhap'] = 'Tài khoản mật khẩu không đúng !';
                require_once('./mvc/views/admin/login.php');
                die();
            } else {
                $_SESSION['USER'] = $date;
                echo '<script> alert( Đăng nhập thành công! "); </script>';
            }
        }
        
    }
?>
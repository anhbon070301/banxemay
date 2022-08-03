<?php
 class User_MD extends DB {

        function dangki($username,$password,$email,$matkhaulai){
                $sqlloi1 = "select * from user where email ='" . $email . "'";
                $resultloi1 =$this->con ->query($sqlloi1);
                if ($resultloi1->num_rows > 0) {
                    echo '<script> alert("Gmail này đã được sử dụng! "); </script>';
                    require_once('./mvc/views/web/register.php');
                    die();
                } else {
                        $sql = "INSERT INTO user ( username, password, email) VALUES ('$username','$password','$email')";
                        mysqli_query($this->con, $sql);
                        $_SESSION["gmail"] = $email;
                    
                }   
        }
        function Login($email, $password)
        {
            $sql = 'select * from user where email = "' . $email . '" and password = "' . $password . '" ';
            $query = mysqli_query($this->con, $sql);
            $date = mysqli_fetch_assoc($query);
            $num_rows = mysqli_num_rows($query);
            if ($num_rows == 0) {
                // echo '<script> alert("Sai tài khoản hoặc mật khẩu! Đăng nhập thất bại! "); </script>';
                $_SESSION['dangnhap'] = 'Tài khoản mật khẩu không đúng !';
                require_once('./mvc/views/web/login.php');
                die();
            } else {
                $_SESSION['USER'] = $date;
                echo '<script> alert( Đăng nhập thành công! "); </script>';
            }
        }
        function updatePMD($email,$matkhaucu,$matkhau){
            $sqlloi = "select * from user where email ='" . $email . "' and password ='" . $matkhaucu . "'";
            $resultloi = $this->con->query($sqlloi);
            if ($resultloi->num_rows > 0) {
                $sql = "UPDATE user SET password='$matkhau' WHERE email='" . $email . "'";
                $this->con->query($sql) ;
               
            } else {
                echo '<script> alert("Sai mật khẩu cũ!"); </script>';
                require_once('./mvc/views/web/doiMK.php');
               die();
            }
        }  
        function showMD($trangthai){

            if ($trangthai == 1) {
                $tim = (isset($_POST["tim"])) ? $_POST["tim"] : "";
                $sql = " SELECT * FROM user where username like '%" . $tim . "%'";
                return mysqli_query($this->con, $sql);
            } else if ($trangthai == 0) {
                $sql = "SELECT * FROM user ";
                return mysqli_query($this->con, $sql);
            } 
          
          
        }
        function deleteMD($id){
            $sql = "delete from user where id='".$id."'";
            $this->con->query($sql);
        }


    }   
?>
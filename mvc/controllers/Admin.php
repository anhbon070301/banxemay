<?php
 class Admin extends Controller{

    function login(){

        if(isset( $_POST['dangnhap'])){
            $UserMD = $this->model("Admin_MD");
            $password = (isset($_POST['password'])) ? $_POST['password'] : "";
            $username = (isset($_POST['username'])) ? $_POST['username'] : "";
            if ( $password === "" || $username === "") {
                // echo '<script> alert("Vui lòng nhập đầy đủ thông tin đăng nhập! "); </script>';
                $_SESSION['dangnhap'] = 'Vui lòng nhập đầy đủ thông tin đăng nhập! !';
                $this->viewAD("login");
            } else {
            $productMD = $this->model("Product_MD");
               $UserMD->Login($username,$password);   
               $this->viewAD('trangchuAD',["username"=>$username,"hang"=>$productMD->showTH()]);    
            }
        }else{
            $this->viewAD("login");
        }
    }
    function logout(){
        if(isset($_SESSION['USER']) && $_SESSION['USER'] != NULL){
            unset($_SESSION['USER']);
            header('Location: /banxemaymvc/Admin/login');
        }
      
    }
    function home(){
        $productMD = $this->model("Product_MD");
        $this->viewAD("trangchuAD",["hang"=>$productMD->showTH()]);

    }
}
 ?>
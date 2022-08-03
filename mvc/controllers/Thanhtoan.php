<?php
 class Thanhtoan extends Controller{

    public function muaxe()
    {
        $this->view("thanhtoan");  
    }
    
    public function dathang()
    { 
        $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
        function tongtien($cart){
            $tongtien = 0;
            foreach($cart as $key => $value){
              $tongtien +=  floatval($value['gia']) *  floatval($value['soluong']);
            }
            return $tongtien;
        }
        if (isset($_SESSION['USER'])) {
            $user = $_SESSION['USER'];
        }
        if (isset($_POST['username'])) {
            $id_user = $user['id'];
            if ($id_user == 0) {
                header('location: /banxemaymvc/Thanhtoan/muaxe/');
            }else{
            $name = $_POST['username'];
            $tongtien = tongtien($cart);
            $sdt = $_POST['sdt'];
            $email= $_POST['email'];
            $diachi = $_POST['diachi'];
            $ghichu = $_POST['ghichu'];
        
            $CartMD = $this->model("Cart_MD");
            $CartMD->adddonhang( $id_user,$name,$tongtien,$sdt,$email,$diachi,$ghichu);
        }
        }
    }

    public function success()
    {
        if (isset($_SESSION['USER'])) {
            $user = $_SESSION['USER'];
        }
        $name = $user['username'];
        $GiohangMD = $this->model("Giohang_MD");
        $this->view("success",["giohang"=>$GiohangMD->donhang_id($name)] );
        
    }

    public function chitietdonhang($id)
    {
        $ChitietdonhangMD = $this->model("Giohang_MD");
        $this->view("chitietdonhang",["detail"=>$ChitietdonhangMD->chitietdonhang($id)]);
    }

    public function donhang()
    {
        if (isset($_SESSION['USER'])) {
            $user = $_SESSION['USER'];
            $id_user = $user['id'];
            $ChitietdonhangMD = $this->model("Giohang_MD");
            $this->view("chitietdonhang",["detail"=>$ChitietdonhangMD->donhang($id_user)]);
        }
        else {
            $this->view("chitietdonhang");
        }
    }
}
 
?>
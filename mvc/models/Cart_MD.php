<?php
 class Cart_MD extends DB {
    
    function adddonhang( $id_user,$name,$tongtien,$sdt,$email,$diachi,$ghichu ){
        $cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
        if (isset($_SESSION['USER'])) {
            $user = $_SESSION['USER'];
        }
        $query = mysqli_query($this->con, "INSERT INTO donhang( id_user, ten, tongtien, sdt, email, diachi, ghichu) VALUES ('$id_user','$name','$tongtien','$sdt','$email','$diachi','$ghichu')");       
        if ($query) {
                
            $id_donhang = mysqli_insert_id($this->con);
            foreach($cart as $value){
                mysqli_query($this->con,"INSERT INTO giohang(id_donhang, id_sanpham, soluong, gia, id_user) VALUES ('$id_donhang','$value[id]','$value[soluong]','$value[gia]','$id_user')");
            }
            unset($_SESSION['cart']);
            header('location: /banxemaymvc/Thanhtoan/success/');
        }
    }

}  
?>
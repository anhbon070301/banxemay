<?php
 class Cart extends Controller{

    public function index()
    {
        
        echo __METHOD__;
    }
    
    public function add()
    {
        $id ='';
        $gia = '';
        $soluong = '';
        $hinhanh = '';
        $tensp = '';
        if (isset($_POST['id']) && isset($_POST['gia']) && isset($_POST['soluong']) && isset($_POST['hinhanh']) && isset($_POST['tensp'])) {
            $id = $_POST['id'];
            $gia = $_POST['gia'];
            $soluong = $_POST['soluong'];
            $hinhanh = $_POST['hinhanh'];
            $tensp = $_POST['tensp'];
            
        }
        if ($soluong <=0) {
            $soluong = 1;
        }
        $item = [
            'id'=> $id,
            'tensp'=> $tensp,
            'hinhanh'=> $hinhanh,
            'gia'=> $gia,
            'soluong'=> $soluong
        ];
        if (isset($_SESSION['cart'][$id])) {
            // echo'có sản phẩm r';
            $_SESSION['cart'][$id]['soluong'] += $soluong;
        }
        else {
            $_SESSION['cart'][$id] = $item;
        }

        // echo"<pre>";
        // print_r($_SESSION['cart']);
        
        $this->view("viewcart",$_SESSION['cart'][$id]);
    }
    public function delete($id)
    {
        unset($_SESSION['cart'][$id]);
        $this->view("viewcart",$_SESSION['cart'],$id);
    }
    public function update($id)
    {
      
        $id ='';
        $gia = '';
        $soluong = '';
        $hinhanh = '';
        $tensp = '';
        if (isset($_POST['id']) && isset($_POST['gia']) && isset($_POST['soluong']) && isset($_POST['hinhanh']) && isset($_POST['tensp'])) {
            $id = $_POST['id'];
            $gia = $_POST['gia'];
            $soluong = $_POST['soluong'];
            $hinhanh = $_POST['hinhanh'];
            $tensp = $_POST['tensp'];
            
        }
        if ($soluong <=0) {
            $soluong = 1;
        }
        $item = [
            'id'=> $id,
            'tensp'=> $tensp,
            'hinhanh'=> $hinhanh,
            'gia'=> $gia,
            'soluong'=> $soluong
        ];
        if (isset($_SESSION['cart'][$id])) {
            // echo'có sản phẩm r';
            $_SESSION['cart'][$id] = $item;
        }
        $this->view("viewcart",$_SESSION['cart'],$id);
    }
}
?>

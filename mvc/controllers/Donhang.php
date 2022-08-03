<?php
 class Donhang extends Controller{

    public function show()
    {
        $donhangMD = $this->model("Giohang_MD");
        $productMD = $this->model("Product_MD");
        $this->viewAD("donhangAD",["donhang"=>$donhangMD->donhangAD(),"hang"=>$productMD->showTH()]);
    }

    public function showGioHang($id)
    {
        $giohangMD = $this->model("Giohang_MD");
        $productMD = $this->model("Product_MD");
        $this->viewAD("giohangAD",["giohang"=>$giohangMD->chitietdonhang($id),"hang"=>$productMD->showTH()]);
    }

    function delete($id)
    {
        $GiohangMD = $this->model("Giohang_MD");
        $GiohangMD->deleteGiohang($id);
        header('Location: /banxemaymvc/Donhang/show/');    
    }
}
 ?>
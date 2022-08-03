<?php

 class Trangchu extends Controller{

    public function home()
    {
        $ProductMD = $this->model("Product_MD");
        $this->view('trangchu',["hang"=>$ProductMD->showTH()]);
    }
}
?>
<?php

class Ajax extends Controller {
    function __construct()
    {
        $this->product = $this->model('ModelProduct');
    }
    function addCart() {
        $id = $_POST['id'];
        $number = $_POST['number'];

        print_r($this->product->addProductCart($id, $number));
    }

    function removeCart()
    {
        $id = $_POST['id'];
        print_r($this->product->removeItem($id));
    }

    function filterCatePro() {
        $id = $_POST['id'];
        
        $pro = $this->product->getAllCate('', 0, $id);
        $arr = [];
        foreach($pro as $item) {
            $item['detail_img'] = $this->product->getProImg($item['id'])['image'];
            array_push($arr, $item);
        }

        print_r(json_encode($arr));

    }
}
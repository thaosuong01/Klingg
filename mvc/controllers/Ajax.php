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
}
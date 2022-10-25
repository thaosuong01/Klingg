<?php
class Cart extends Controller {
    function index() {        
        return $this->view('client',[
            'page' => 'cart',
            'css' => ['cart'],
            'js' => ['ajax']
        ]);
    }
}
?>
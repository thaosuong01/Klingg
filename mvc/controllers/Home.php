<?php
class Home extends Controller {
    function index() {
        return $this->view('client',[
            'page'=>'home'
        ]);
    }
}
?>
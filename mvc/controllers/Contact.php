<?php
class Contact extends Controller {
    function index() {        
        return $this->view('client',[
            'page'=>'contact',
            'css' => ['contact'],
            'js' => ['ajax']
        ]);
    }
}
?>
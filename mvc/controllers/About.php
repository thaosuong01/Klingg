<?php
class About extends Controller {
    function index() {        
        return $this->view('client',[
            'page'=>'about',
            'css' => ['about'],
            'js' => ['ajax']
        ]);
    }
}
?>
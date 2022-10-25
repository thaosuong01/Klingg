<?php
class Information extends Controller {
    function index() {        
        return $this->view('client',[
            'page' => 'information',
            'css' => ['information'],
            'js' => ['ajax', 'info'],
            'header' => 0
        ]);
    }
}
?>
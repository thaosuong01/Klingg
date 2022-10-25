<?php
class Blog extends Controller {
    function index() {        
        return $this->view('client',[
            'page'=>'blog',
            'css' => ['blog'],
            'js' => ['ajax']
        ]);
    }
}
?>
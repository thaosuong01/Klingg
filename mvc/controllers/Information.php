<?php
class Information extends Controller {
    function index() {        
        return $this->view('client',[
            'page' => 'information',
            'css' => ['information'],
            'js' => [ 'info', 'validate', 'formvalidate','ajaxk'],
            'header' => 0
        ]);
    }
}
?>
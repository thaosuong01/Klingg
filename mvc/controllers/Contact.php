<?php
class Contact extends Controller {
    function __construct() {
        $this->categories = $this->model('ModelCategory');
    }
    function index() {        
        $categories = $this->categories->getAllCl();     
        return $this->view('client',[
            'page' => 'contact',
            'categories' => $categories,
            'css' => ['contact'],
            'js' => ['ajax']
        ]);
    }
}
?>
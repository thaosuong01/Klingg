<?php
class About extends Controller
{
    function __construct()
    {
        $this->categories = $this->model('ModelCategory');
    }
    function index()
    {
        $categories = $this->categories->getAllCl();

        return $this->view('client', [
            'page' => 'about',
            'categories' => $categories,
            'css' => ['about'],
            'js' => ['ajax']
        ]);
    }
}

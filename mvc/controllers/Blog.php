<?php
class Blog extends Controller
{
    function __construct()
    {
        $this->categories = $this->model('ModelCategory');
    }
    function index()
    {
        $categories = $this->categories->getAllCl();

        return $this->view('client', [
            'page' => 'blog',
            'categories' => $categories,
            'css' => ['blog'],
            'js' => ['ajax']
        ]);
    }
}

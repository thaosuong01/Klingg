<?php
class Home extends Controller {
    function __construct()
    {
        $this->trend = $this->model('ModelProduct');
    }

    function index() {
        $trendpro = $this->trend->getTrendPro();
        $trendproNew = [];
        foreach($trendpro as $item) {
            $item['detail_img'] = $this->trend->getTrendProImg($item['id'])['image'];
            array_push($trendproNew, $item);
        }
        
        return $this->view('client',[
            'page'=>'home',
            'trendpro' => $trendproNew,
            'css' => ['main'],
            'js' => ['ajax']
        ]);
    }
}
?>
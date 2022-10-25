<?php
class Detail extends Controller {

    private $products;
    private $categories;

    public function __construct() {
        $this->products = $this->model('ModelProduct');
        $this->categories = $this->model('ModelCategory');
    }

    function index($id) {  
        $product = $this->products->SelectProduct($id);
        $category = $this->categories->selectOneCate($product['cate_id']);
        $productImg = $this->products->SelectProductImg($id);
        $productSame = $this->products->getProInCate($id, $product['cate_id']);
                
        return $this->view('client',[
            'page'=>'detail',
            'css' => ['detail'],
            'js' => ['ajax'],
            'product' => $product,
            'category' => $category,
            'productImg' => $productImg,
            'productSame' => $productSame
        ]);
    }
}
?>
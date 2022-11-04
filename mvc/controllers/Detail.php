<?php
class Detail extends Controller {

    private $products;
    private $categories;
    private $comments;
    private $users;

    public function __construct() {
        $this->products = $this->model('ModelProduct');
        $this->categories = $this->model('ModelCategory');
        $this->comments = $this->model('ModelComment');
        $this->users = $this->model('ModelUser');
    }

    function index($id) {  
        $product = $this->products->SelectProduct($id);
        $category = $this->categories->selectOneCate($product['cate_id']);
        $categories = $this->categories->getAllCl();
        $productImg = $this->products->SelectProductImg($id);
        $productSame = $this->products->getProInCate($id, $product['cate_id']);
        $getComment = $this->comments->getAllComment($id);
        
        $sumStar = 0;
        if(!empty($getComment)) {
            foreach($getComment as $comment) {
                $sumStar += $comment['rating'];
            }
        }
        if($sumStar == 0) {
            $avgStar = 0;
        }
        else {
            $avgStar = number_format((float)$sumStar/count($getComment), 1);
        }
        
        $commentNew = [];
        foreach($getComment as $item) {
            $item['name'] = $this->users->getNameUser($item['user_id'])['name'];
            array_push($commentNew, $item);
        }
        return $this->view('client',[
            'page'=>'detail',
            'css' => ['detail'],
            'js' => ['ajax', 'comment'],
            'product' => $product,
            'category' => $category,
            'categories' => $categories,
            'productImg' => $productImg,
            'productSame' => $productSame,
            'comments' => $commentNew,
            'avgStar' => $avgStar
        ]);
    }

    function add_comment() {
        $ratingNum = $_POST['ratingNum'];
        $comment = $_POST['comment'];
        $userId = $_POST['user_id'];
        $proId = $_POST['pro_id'];
        $create_at = date('Y-m-d H:i:s');

        if($ratingNum <= 0) {
            echo 'Cho M, m ngu qua';
        }
        else {
            $insertCom = $this->comments->insertComment($ratingNum, $comment, $userId, $proId, $create_at);
            $getComment = $this->comments->getAllComment($proId);
            $commentNew = [];
            foreach($getComment as $item) {
                $item['name'] = $this->users->getNameUser($item['user_id'])['name'];
                array_push($commentNew, $item);
            }
            print_r(json_encode($commentNew));
        }
    }
}
?>
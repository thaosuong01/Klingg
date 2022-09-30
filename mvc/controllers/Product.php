<?php
class Product extends Controller
{

    private $products;
    private $categories;

    function __construct()
    {
        $this->products = $this->model('ModelProduct');
        $this->categories = $this->model('ModelCategory');
    }

    function list_product()
    {
        $keyword = '';
        $cate_id = 0;
        if(isset($_POST['search']) && ($_POST['search'] != '')) {
            $keyword = $_POST['keyword_product'];
            $_POST['search'] = '';
            if(!empty($_POST['category'])) {
                $cate_id = $_POST['category'];
            }
        }
        $products = $this->products->getAll($keyword, 0, (int)$cate_id);
        $categories = $this->categories->getAll();
        return $this->view('admin', [
            'page' => 'product/list',
            'products' => $products,
            'categories' => $categories,
            'js' => ['ajax', 'search'],
            'title' => 'Product'
        ]);
    }

    function add_product()
    {
        $msg = '';
        $type = '';
        $categories = $this->categories->getAll();
        if (isset($_POST['add_product']) && ($_POST['add_product'])) {
            $name = $_POST['productname'];
            $image = $_FILES['image']['name'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $desc = $_POST['description'];
            $create_at = date('Y-m-d H:i:s');
            $detail_img = $_FILES['detail_image'];
            for ($i = 0; $i < count($detail_img['name']); $i++) {
                $target_file = _UPLOAD . '/product/' .  basename($_FILES['detail_image']['name'][$i]);
                if (move_uploaded_file($_FILES['detail_image']['tmp_name'][$i], $target_file)) {
                } else {
                }
            }
            $target_file = _UPLOAD . '/product/' .  basename($_FILES['image']['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            } else {
            }

            $idProduct = $this->products->insertPro($name, $image, $category, $price, $desc, $create_at);
            foreach ($_FILES['detail_image']['name'] as $name) {
                $this->products->addImageProduct($idProduct, $name, $create_at);
            }
            if ($idProduct) {
                $type = 'success';
                $msg = 'Added product successfully';
                $_SESSION['msg'] = $msg;
                header('Location: ' . _WEB_ROOT . '/product/list_product');
            } else {
                $type = 'danger';
                $msg = 'System error';
            }

            unset($_POST['add_product']);
        }
        return $this->view('admin', [
            'page' => 'product/add',
            'categories' => $categories,
            'msg' => $msg,
            'type' => $type,
            'title' => 'Product'
        ]);
    }

    function delete_product($id)
    {
        $status = $this->products->deletePro($id);
        if ($status) {
            echo -1;
        } else {
            echo -2;
        }
    }
}

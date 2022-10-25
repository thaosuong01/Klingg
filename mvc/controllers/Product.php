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

    function index()
    {
        $cate_id = 0;
        if (isset($_GET['cate_id'])) {
            $cate_id = $_GET['cate_id'];
        }

        $products = $this->products->getAll('', 0, $cate_id);
        $categories = $this->categories->getAllCl();

        $productNew = [];
        foreach ($products as $item) {
            if (isset($this->products->getProImg($item['id'])['image'])) {
                $item['detail_img'] = $this->products->getProImg($item['id'])['image'];
                array_push($productNew, $item);
            }
        }

        return $this->view('client', [
            'page' => 'product',
            'css' => ['product'],
            'js' => ['ajax'],
            'products' => $productNew,
            'categories' => $categories,
        ]);
    }

    function list_product()
    {
        $keyword = '';
        $cate_id = 0;

        if (isset($_POST['search']) && ($_POST['search'] != '')) {
            $keyword = $_POST['keyword_product'];
            $_POST['search'] = '';

            if (!empty($_POST['category']))
                $cate_id = $_POST['category'];
        }

        $products = $this->products->getAll($keyword, 0, (int)$cate_id);
        $categories = $this->categories->getAll();

        return $this->view('admin', [
            'page' => 'product/list',
            'products' => $products,
            'categories' => $categories,
            'js' => ['ajax', 'search'],
            'title' => 'Product',
            'bg' => 'active',
            'pageactive' => 'product'
        ]);
    }

    function add_product()
    {
        $msg = '';
        $type = '';

        $categories = $this->categories->getAll();

        if (isset($_POST['add_product']) && ($_POST['add_product'])) {
            $image = $this->processImg($_FILES['product']['name'], $_FILES['product']['tmp_name']);
            $name = $_POST['productname'];
            $price = $_POST['price'];

            $category = $_POST['category'];
            $desc = $_POST['description'];
            $detail_img = $_FILES['detail_image'];

            $create_at = date('Y-m-d H:i:s');
            $image_array = array();

            for ($i = 0; $i < count($detail_img['name']); $i++) {
                $img = $this->processImg($detail_img['name'][$i], $detail_img['tmp_name'][$i]);
                array_push($image_array, $img);
            }

            $idProduct = $this->products->insertPro($name, $image, $category, $price, $desc, $create_at);
            if (!empty($image_array) && $image_array[0] != "") {

                foreach ($image_array as $name)
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
            'title' => 'Product',
            'js' => ['uploadImg'],
            'bg' => 'active',
            'pageactive' => 'product'
        ]);
    }

    function update_product($id)
    {
        $msg = [];
        $type = [];

        $product = $this->products->SelectProduct($id);
        $productImg = $this->products->SelectProductImg($id);
        $categories = $this->categories->getAll();

        if (isset($_POST['update_product']) && ($_POST['update_product'])) {
            $image = "";
            $updated_at = date('Y-m-d H:i:s');
            $image_array = array();

            $name = $_POST['productname'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $desc = $_POST['description'];

            $detail_img = $_FILES['detail_image'];

            if (!empty($detail_img))
                for ($i = 0; $i < count($detail_img['name']); $i++) {
                    $img = $this->processImg($detail_img['name'][$i], $detail_img['tmp_name'][$i]);
                    array_push($image_array, $img);
                }

            if (isset($_FILES['product']['name']))
                $image = $this->processImg($_FILES['product']['name'], $_FILES['product']['tmp_name']);

            $status = $this->products->updateProduct($id, $name, $image, $category, $price, $desc, $updated_at);

            if (count($image_array) > 0) {
                $this->products->deleteImgPro($id);
                foreach ($image_array as $name) {
                    $this->products->addImageProduct($id, $name, $updated_at);
                }
            }

            if ($status) {
                $type = 'success';
                $msg = 'Updated product successfully';
                $_SESSION['msg'] = $msg;
                header('Location: ' . _WEB_ROOT . '/product/list_product');
            } else {
                $type = 'danger';
                $msg = 'System error';
            }

            unset($_POST['update_product']);
        }

        return $this->view('admin', [
            'page' => 'product/update',
            'product' => $product,
            'categories' => $categories,
            'productImg' => $productImg,
            'msg' => $msg,
            'type' => $type,
            'title' => 'Product',
            'js' => ['uploadImg'],
            'bg' => 'active',
            'pageactive' => 'product'
        ]);
    }

    function delete_product($id)
    {
        $this->products->deleteImgPro($id);
        $status = $this->products->deletePro($id);
        if ($status) echo -1;
        else echo -2;
    }



    function processImg($filesName, $tmpName)
    {
        if (isset($filesName) && !empty($filesName)) {
            $date = new DateTimeImmutable();
            $fileNameArr = explode(".", $filesName);
            $name = $date->getTimestamp() . rand();
            $target_file = _UPLOAD . '/product/' .  basename($name . "." . $fileNameArr[1]);

            if (move_uploaded_file($tmpName, $target_file)) {
                return $name . "." . $fileNameArr[1];
            }
        }
    }
}

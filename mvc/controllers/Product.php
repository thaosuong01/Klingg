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
        if (isset($_POST['search']) && ($_POST['search'] != '')) {
            $keyword = $_POST['keyword_product'];
            $_POST['search'] = '';
            if (!empty($_POST['category'])) {
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

    function update_product($id)
    {
        $msg = [];
        $type = [];
        $product = $this->products->SelectProduct($id);
        $productImg = $this->products->SelectProductImg($id);
        $categories = $this->categories->getAll();
        if (isset($_POST['update_product']) && ($_POST['update_product'])) {
            $name = $_POST['productname'];
            $image = $_FILES['image']['name'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $desc = $_POST['description'];
            $updated_at = date('Y-m-d H:i:s');
            $detail_img = $_FILES['detail_image'];
            if (!empty($detail_img)) {
                for ($i = 0; $i < count($detail_img['name']); $i++) {
                    $target_file = _UPLOAD . '/product/' .  basename($_FILES['detail_image']['name'][$i]);
                    if (move_uploaded_file($_FILES['detail_image']['tmp_name'][$i], $target_file)) {
                    } else {
                    }
                }
            }

            if (!empty($image)) {
                $target_file = _UPLOAD . '/product/' .  basename($_FILES['image']['name']);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                } else {
                }
            }

            $status = $this->products->updateProduct($id, $name, $image, $category, $price, $desc, $updated_at);
            if(!empty($detail_img)) {
                $this->products->deleteImgPro($id);
                foreach ($_FILES['detail_image']['name'] as $name) {
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
            'title' => 'Product'
        ]);
    }

    function delete_product($id)
    {
        $this->products->deleteImgPro($id);
        $status = $this->products->deletePro($id);
        if ($status) {
            echo -1;
        } else {
            echo -2;
        }
    }
}

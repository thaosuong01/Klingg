<?php
class ModelProduct extends DB
{
    function getAll($keyword = '', $id = 0, $cate_id = 0)
    {
        $pro = "SELECT * FROM product WHERE 1";
        if (!empty($keyword)) {
            $pro .= " AND  name like '%" . $keyword . "%'";
        }

        if ($id > 0) {
            $pro .= " AND id <> $id";
        }
        if ($cate_id > 0) {
            $pro .= " AND cate_id = $cate_id";
        }
        return $this->pdo_query($pro);
    }

    function insertPro($name, $image, $cate_id, $price, $desc, $create_at)
    {
        $pro = "INSERT INTO product(name, image, cate_id, price, description, created_at) VALUE('$name', '$image', '$cate_id','$price', '$desc', '$create_at')";
        return $this->pdo_execute_lastInsertID($pro);
    }

    function addImageProduct($productId, $image, $create_at)
    {
        $insert = "INSERT INTO img_product(product_id, image, created_at) VALUE($productId, '$image', '$create_at')";
        return $this->pdo_execute($insert);
    }

    function deletePro($id)
    {
        $delete = "DELETE FROM product WHERE id = '$id'";
        return $this->pdo_execute($delete);
    }

    function SelectProduct($id)
    {
        $select = "SELECT * FROM product WHERE id = '$id'";
        if ($this->pdo_query_one($select)) {
            return $this->pdo_query_one($select);
        } else {
            return [];
        }
    }

    function SelectProductImg($id)
    {
        $select = "SELECT * FROM img_product WHERE product_id = '$id'";
        if ($this->pdo_query($select)) {
            return $this->pdo_query($select);
        } else {
            return [];
        }
    }

    function updateProduct($id, $name, $image, $cate_id, $price, $desc, $updated_at)
    {
        if (empty($image)) {
            $update = "UPDATE product SET name = '$name', cate_id = '$cate_id', price = '$price', description = '$desc', updated_at = '$updated_at' WHERE id = '$id'";
        } else {
            $update = "UPDATE product SET name = '$name', image = '$image', cate_id = '$cate_id', price = '$price', description = '$desc', updated_at = '$updated_at' WHERE id = '$id'";
        }
        return $this->pdo_execute($update);
    }

    function deleteImgPro($id)
    {
        $delete = "DELETE FROM img_product WHERE product_id = '$id'";
        return $this->pdo_execute($delete);
    }

    function updateImgProduct($productId, $image, $updated_at)
    {
        $update = "UPDATE img_product SET image = '$image', updated_at = '$updated_at' WHERE product_id = '$productId'";
        return $this->pdo_execute($update);
    }

    function getTrendPro()
    {
        $pro = "SELECT * FROM product ORDER BY view DESC LIMIT 3 ";
        return $this->pdo_query($pro);
    }

    function getTrendProImg($id)
    {
        $select = "SELECT * FROM img_product WHERE product_id = '$id' LIMIT 1";
        if ($this->pdo_query_one($select)) {
            return $this->pdo_query_one($select);
        } else {
            return [];
        }
    }

    function getProImg($id)
    {
        $select = "SELECT * FROM img_product WHERE product_id = '$id'";
        if ($this->pdo_query_one($select)) {
            return $this->pdo_query_one($select);
        } else {
            return [];
        }
    }

    function addProductCart($id, $number = 1)
    {
        $itemPro = $this->SelectProduct($id);
        $itemPro['number'] = $number;
        $itemPro['total'] = $itemPro['number'] * $itemPro['price'];

        $check = 0;
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

            foreach ($_SESSION['cart'] as $key => $item) {
                if (isset($item['id']) && $item['id']) {

                    if ($item['id'] == $id) {
                        if ($number > 1) {
                            $item['number'] = $item['number'] + $number;
                        } else  if ($number == 1) {

                            $item['number']++;
                        } else {
                            $item['number']--;
                        }
                        $item['total'] = $item['number'] * $item['price'];
                        $itemNew = $item;
                        $keyNew  = $key;
                        $check = 1;
                    }
                }
            }
            if ($check == 1) {
                $_SESSION['cart'][$keyNew] = [];
                $_SESSION['cart'][$keyNew] = $itemNew;
            } else {

                array_push($_SESSION['cart'], $itemPro);
            }
        } else {
            $_SESSION['cart'] = [];
            array_push($_SESSION['cart'], $itemPro);
        }
        return json_encode($_SESSION['cart']);
    }

    function  removeItem($id)
    {
        if (isset($_SESSION['cart']) && $_SESSION['cart']) {
            $keyRemove = -1;
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id'] == $id) {
                    $keyRemove = $key;
                }
            }
            if ($keyRemove > -1) {
                array_splice($_SESSION['cart'], $keyRemove, 1);
            }
        }
        return json_encode($_SESSION['cart']);
    }
}

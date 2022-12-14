<?php
class ModelCategory extends DB
{
    function countPro() {
        $number = "SELECT * FROM category";
        return count($this->pdo_query($number));

    }
    function chart_getAll(){
        $sql = "SELECT name FROM category ORDER BY ID";

        return $this->pdo_query($sql);
    }

    function data_chart_cate(){
        $sql = "SELECT category.id,count(product.name) as sl_pro FROM category INNER JOIN product ON category.id = product.cate_id GROUP BY category.name ORDER BY category.id";

        return $this->pdo_query($sql);
    }
    function getAll($keyword = '', $per_page = 5, $offset = 0)
    {
        if (!empty($keyword)) {
            $sql = "SELECT * FROM category WHERE name like '%" . $keyword . "%'";
        } else {
            $sql = "SELECT * FROM category ORDER BY name";
        }
        $sql .= " LIMIT $offset, $per_page";
        return $this->pdo_query($sql);
    }
    function getAllCl()
    {
        $sql = "SELECT category.id, category.name, count(product.cate_id) as count_cate FROM category INNER JOIN product ON category.id = product.cate_id GROUP BY category.name ORDER BY name";
        return $this->pdo_query($sql);
    }
    function insertCate($name, $created_at)
    {
        $cate = "INSERT INTO category(name, created_at) VALUE('$name', '$created_at')";
        return $this->pdo_execute($cate);
    }

    function selectOneCate($id)
    {
        $select = "SELECT * FROM category WHERE id = '$id'";
        return $this->pdo_query_one($select);
    }

    function updateCate($id, $name, $updated_at)
    {
        $cate = "UPDATE category SET name = '$name', updated_at = '$updated_at' WHERE id = '$id'";
        return $this->pdo_execute($cate);
    }

    function deleteCate($id)
    {
        $delete = "DELETE FROM category WHERE id = '$id'";
        return $this->pdo_execute($delete);
    }
}

<?php 


function getNameCate($id){
    $conn = new DB();

    $sql = "SELECT name FROM category WHERE id = $id";
    return $conn->pdo_query_one($sql);
}
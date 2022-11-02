<?php
class ModelComment extends DB {
    function insertComment($ratingNum, $comment, $userId, $proId, $create_at) {
        $com = "INSERT INTO comment(rating, comment, user_id, product_id, created_at) VALUE('$ratingNum', '$comment', '$userId', '$proId', '$create_at')";
        return $this->pdo_execute_lastInsertID($com);
    }

    function getAllComment($proId) {
        $com = "SELECT * FROM comment WHERE product_id = '$proId' order by created_at desc";
        return $this->pdo_query($com);
    }
}
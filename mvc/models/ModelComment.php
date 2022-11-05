<?php
class ModelComment extends DB {
    function insertComment($ratingNum, $comment, $userId, $proId, $create_at) {
        $com = "INSERT INTO comment(rating, comments, user_id, product_id, created_at) VALUE('$ratingNum', '$comment', '$userId', '$proId', '$create_at')";
        return $this->pdo_execute_lastInsertID($com);
    }

    function getAllComment($proId) {
        $com = "SELECT * FROM comment WHERE product_id = '$proId' order by created_at desc";
        return $this->pdo_query($com);
    }

    function getComments($keyword) {
        $com = "SELECT comment.*, users.name_user, users.email, product.name, product.image FROM (comment INNER JOIN users ON comment.user_id = users.id) INNER JOIN product ON comment.product_id = product.id";
        if (!empty($keyword)) {
            $com .= " AND name like '%" . $keyword . "%'";
        }
        $com .= " order by created_at desc";

        return $this->pdo_query($com);
    }

    function getAllCom($keyword = '', $per_page = 5, $offset = 0)
    {
        $comment = "SELECT comment.*, users.name_user, users.email, product.name, product.image FROM (comment INNER JOIN users ON comment.user_id = users.id) INNER JOIN product ON comment.product_id = product.id";
        if (!empty($keyword)) {
            $comment .= " AND name like '%" . $keyword . "%'";
        }

        $comment .= " order by created_at desc";

        $comment .= " LIMIT $offset, $per_page";

        return $this->pdo_query($comment);
    }

    function deleteComment($id)
    {
        $delete = "DELETE FROM comment WHERE id = '$id'";
        return $this->pdo_execute($delete);
    }
}
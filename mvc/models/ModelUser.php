<?php
class ModelUser extends DB {
    function getAll() {
        $sql = "SELECT * FROM users";
        return $this->pdo_query($sql);
    }

    function InsertUser($name, $email, $password, $create_at) {
        $insert = "INSERT INTO users(gr_id, name, email, password, created_at) VALUE(2, '$name', '$email', '$password', '$create_at')";
        return $this->pdo_execute($insert);
    }

    function SelectOneUser($email) {
        $select = "SELECT * FROM users WHERE email = '$email'";
        if($this->pdo_query_one($select)) {
            return $this->pdo_query_one($select);
        }
        else {
            return [];
        }
    }
}
?>
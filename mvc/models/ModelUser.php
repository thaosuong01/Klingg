<?php
class ModelUser extends DB
{

    function getAll($keyword = '', $id = 0, $gr_id = 0)
    {
        $sql = "SELECT * FROM users WHERE 1";
        if (!empty($keyword)) {
            $sql .= " AND  name like '%" . $keyword . "%'";
        }

        if ($id > 0) {
            $sql .= " AND id <> $id";
        }
        if ($gr_id > 0) {
            $sql .= " AND gr_id = $gr_id";
        }
        return $this->pdo_query($sql);
    }

    function getAllUser($keyword = '', $id = 0, $gr_id = 0, $per_page = 5, $offset = 0)
    {
        $user = "SELECT * FROM users WHERE 1";
        if (!empty($keyword)) {
            $user .= " AND  name like '%" . $keyword . "%'";
        }

        if ($id > 0) {
            $user .= " AND id <> $id";
        }
        if ($gr_id > 0) {
            $user .= " AND gr_id = $gr_id";
        }
      
        $user .= " LIMIT $offset, $per_page";
        return $this->pdo_query($user);
    }

    function InsertUser($name, $email, $password, $create_at)
    {
        $insert = "INSERT INTO users(gr_id, name, email, password, created_at) VALUE(2, '$name', '$email', '$password', '$create_at')";
        return $this->pdo_execute($insert);
    }

    function SelectOneUser($email)
    {
        $select = "SELECT * FROM users WHERE email = '$email'";
        if ($this->pdo_query_one($select)) {
            return $this->pdo_query_one($select);
        } else {
            return [];
        }
    }

    function SelectUser($id)
    {
        $select = "SELECT * FROM users WHERE id = '$id'";
        if ($this->pdo_query_one($select)) {
            return $this->pdo_query_one($select);
        } else {
            return [];
        }
    }

    function checkGroupUser($gr_id)
    {
        $select = "SELECT * FROM users WHERE gr_id = '$gr_id'";
        if ($this->pdo_query($select)) {
            return $this->pdo_query($select);
        } else {
            return [];
        }
    }

    function insert($name, $avatar, $group, $email, $password, $phone, $address, $desc, $create_at)
    {
        $insert = "INSERT INTO users(name, avatar, gr_id, email, password, phone, address, description, created_at) VALUE('$name', '$avatar', $group ,'$email', '$password', '$phone', '$address', '$desc', '$create_at')";
        return $this->pdo_execute($insert);
    }

    function updateUser($id, $name, $avatar, $group, $email, $password, $phone, $address, $desc, $updated_at)
    {
        if (!empty($password) && empty($avatar)) {
            $update = "UPDATE users SET name = '$name', gr_id = '$group', email = '$email', password = '$password', phone = '$phone', address = '$address', description = '$desc', updated_at = '$updated_at' WHERE id = '$id'";
        } else if (empty($password) && !empty($avatar)) {
            $update = "UPDATE users SET name = '$name', avatar = '$avatar', gr_id = '$group', email = '$email', phone = '$phone', address = '$address', description = '$desc', updated_at = '$updated_at' WHERE id = '$id'";
        } else if (empty($password) && empty($avatar)) {
            $update = "UPDATE users SET name = '$name', gr_id = '$group', email = '$email', phone = '$phone', address = '$address', description = '$desc', updated_at = '$updated_at' WHERE id = '$id'";
        } else {
            $update = "UPDATE users SET name = '$name', avatar = '$avatar', gr_id = '$group', email = '$email', password = '$password', phone = '$phone', address = '$address', description = '$desc', updated_at = '$updated_at' WHERE id = '$id'";
        }
        return $this->pdo_execute($update);
    }

    function deleteUser($id)
    {
        $delete = "DELETE FROM users WHERE id = '$id'";
        return $this->pdo_execute($delete);
    }

    public function getone_UserID($id)
    {
        $sql = "SELECT * FROM users where id = '$id'";
        return  $this->pdo_query_one($sql);
    }

    function getNameUser($id) {
        $userName = "SELECT name FROM users WHERE id = '$id'";
        return  $this->pdo_query_one($userName);
    }
}

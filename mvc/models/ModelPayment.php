<?php
class ModelPayment extends DB
{
    function countPro()
    {
        $number = "SELECT * FROM bill";
        return count($this->pdo_query($number));
    }

    function insertBill($phone, $address, $total, $method, $user_id, $created_at)
    {
        $insert = "INSERT INTO bill(phone, address, total, method, price_ship, user_id, created_at) VALUE('$phone', '$address', '$total', '$method', 2, '$user_id', '$created_at')";
        return $this->pdo_execute_lastInsertID($insert);
    }

    function insertDetailBill($idPro, $image, $namePro, $price, $number, $total, $idbill, $created_at)
    {
        $sql = "INSERT INTO detail_bill(id_pro, image, name_pro, price, number, total, id_bill, created_at) VALUES ('$idPro','$image','$namePro','$price','$number','$total','$idbill','$created_at' )";

        $this->pdo_execute($sql);
    }

    function getBill($keyword = '', $status = -1)
    {
        $sql = "SELECT bill.*, users.name_user,users.email FROM  bill INNER JOIN users ON bill.user_id = users.id";
        if (!empty($keyword)) {
            $sql .= " AND name like '%" . $keyword . "%'";
        }
        if ($status > -1) {
            $sql .= " AND status = $status";
        }
        $sql .= " order by id desc";
        return $this->pdo_query($sql);
    }

    function getAllBill($keyword = '', $status = -1, $per_page = 5, $offset = 0)
    {
        $bill = "SELECT bill.*, users.name_user,users.email FROM  bill INNER JOIN users ON bill.user_id = users.id";
        if (!empty($keyword)) {
            $bill .= " AND name like '%" . $keyword . "%'";
        }

        if ($status > -1) {
            $bill .= " AND status = $status";
        }

        $bill .= " order by id desc";

        $bill .= " LIMIT $offset, $per_page";

        return $this->pdo_query($bill);
    }

    function getOneBill($id)
    {
        $sql = "SELECT * FROM bill WHERE id= '$id'";

        $sql .= " order by id desc";
        return $this->pdo_query_one($sql);
    }
    function getBillDetail($id)
    {
        $sql = "SELECT * FROM detail_bill WHERE id_bill= '$id'";

        $sql .= " order by id desc";
        return $this->pdo_query($sql);
    }

    function getBillFromUser($keyword = '', $status = -1, $user_id = 0)
    {
        $select = "SELECT * FROM bill WHERE 1 ";
        if ($status > -1) {
            $select .= " AND status = $status ";
        }
        if ($user_id > 0) {
            $select .= " AND user_id = $user_id ";
        }
        if ($keyword  != '') {
            $select .= " AND name like '%" . $keyword . "%'";
        }
        $select .= " ORDER BY created_at DESC";
        return $this->pdo_query($select);
    }

    function editStatus($id, $status, $updated_at)
    {
        $sql = "UPDATE bill SET status= '$status', updated_at= '$updated_at' WHERE id= '$id' ";

        return $this->pdo_execute($sql);
    }
}

<?php
class ModelPayment extends DB
{
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
        $sql = "SELECT * FROM bill WHERE 1";
        if (!empty($keyword)) {
            $sql .= " AND  name like '%" . $keyword . "%'";
        }
        if ($status > -1) {
            $sql .= " AND status = $status";
        }
        $sql .= " order by id desc";
        return $this->pdo_query($sql);
    }

    function getOneBill($id)
    {
        $sql = "SELECT * FROM bill WHERE id= '$id'";

        $sql .= " order by id desc";
        return

            $this->pdo_query_one($sql);
    }
    function getBillDetail($id)
    {
        $sql = "SELECT * FROM detail_bill WHERE id_bill= '$id'";

        $sql .= " order by id desc";
        return

            $this->pdo_query($sql);
    }

    function editStatus($id, $status, $updated_at)
    {
        $sql = "UPDATE bill SET status= '$status', updated_at= '$updated_at' WHERE id= '$id' ";

        return $this->pdo_execute($sql);
    }
}

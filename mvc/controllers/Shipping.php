<?php
class Shipping extends Controller {
    function index() {        
        return $this->view('client',[
            'page' => 'shipping',
            'css' => ['information'],
            'js' => ['ajax', 'shipping'],
            'header' => 0
        ]);
    }
    private $bill;
    public function __construct() {
        $this->bill = $this->model('ModelPayment');
    }

    function createBill() {
        $method = $_POST['method'];
        $user_id = $_SESSION['user']['id'];

        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $created_at = date('Y-m-d H:i:s');
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            if (isset($item['id']) && $item['id']) {
                $total += (float)$item['total'];
            }
        }
        $idBill = $this->bill->insertBill($phone, $address, $total + 2, $method, $user_id, $created_at);
        if ($idBill) {
            foreach ($_SESSION['cart'] as $item) {
                if (isset($item['id']) && $item['id']) {

                    $this->bill->insertDetailBill($item['id'], $item['image'], $item['name'], $item['price'], $item['number'],  $item['total'], $idBill, $created_at);
                }
            }
            $_SESSION['cart'] = [];
        }
        echo $idBill;
    }
}
?>
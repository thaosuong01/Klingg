<?php
class Payment extends Controller {

    public function __construct() {
        $this->bill = $this->model('ModelPayment');
    }

    function detail($id) {    
        $bill = $this->bill->getOneBill($id);
        $detailBill = $this->bill->getBillDetail($id);

        return $this->view('client',[
            'page' => 'payment',
            'css' => ['information'],
            'js' => ['ajax', 'payment'],
            'header' => 0,
            'bill' => $bill,
            'detailBill' => $detailBill
        ]);
    }
}
?>
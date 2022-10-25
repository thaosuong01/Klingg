<?php
class Bill extends Controller
{
    private $bills;
    private $users;
    function __construct()
    {
        $this->bills = $this->model('ModelPayment');
        $this->users = $this->model('ModelUser');
    }
    function list_bill()
    {
        $keyword = '';
        $status = -1;

        if (isset($_POST['search']) && ($_POST['search'] != '')) {
            $keyword = $_POST['keyword_bill'];
            $_POST['search'] = '';

            if ($_POST['status'] > -1)
                $status = $_POST['status'];
        }

        $bills = $this->bills->getBill($keyword, $status);
        $users = $this->users->getone_UserID($bills[0]['user_id']);

        return $this->view('admin', [
            'page' => 'bill/list',
            'js' => ['ajax', 'search'],
            'bills' => $bills,
            'users' => $users,
            'title' => 'Bill',
            'bg' => 'active',
            'pageactive' => 'bill'
        ]);
    }

    function detailbill($id)
    {
        $bills = $this->bills->getOneBill($id);
        $detailBill = $this->bills->getBillDetail($id);

        $msg = '';
        $type = '';
        if (isset($_POST['update_status']) && $_POST['update_status']) {
            $status = $_POST['status'];
            $updated_at = ('Y-m-d H:i:s');
            $update = $this->bills->editStatus($id, $status, $updated_at);

            if ($update) {
                $msg = 'Update Successfull';
                $type = 'success';
                $_SESSION['msg'] = $msg;
                header('Location:' . _WEB_ROOT . '/bill/list_bill');
            } else {
                $msg = 'Update Faild';
                $type = 'error';
            }
        }

        return $this->view('admin', [
            'page' => 'bill/detailbill',
            'css' => ['information'],
            'js' => ['ajax', 'payment'],
            'header' => 0,
            'bill' => $bills,
            'detailBill' => $detailBill,
            'title' => 'Bill',
            'bg' => 'active',
            'pageactive' => 'bill',
            'msg' => $msg,
            'type' => $type
        ]);
    }
}

<?php
class Bill extends Controller
{
    private $bills;
    private $per_page = 5;
    private $offset = 0;

    function __construct()
    {
        $this->bills = $this->model('ModelPayment');
        $this->users = $this->model('ModelUser');
    }
    function list_bill()
    {
        $keyword = '';
        $status = -1;

        if (isset($_GET['search']) && ($_GET['search'] != '') || !empty($_GET['keyword_bill'])) {
            if (!empty($_GET['keyword_bill'])) {
                $keyword =  $_GET['keyword_bill'];
            }
            // $_GET['search'] = '';

            if (isset($_GET['status']) && $_GET['status'] > -1)
                $status = $_GET['status'];
        }

        // echo $status;
        // die;
        $countBill = count($this->bills->getBill($keyword, $status));

        $maxPage = ceil($countBill / $this->per_page);

        if (!empty($_GET['page'])) {
            $page = $_GET['page'];
            if ($page < 1 || $page > $maxPage) {
                $page = 1;
            }
        } else {
            $page = 1;
        }

        $this->offset = ($page - 1) * $this->per_page;
        $getBills = $this->bills->getBill($keyword, $status);

        $bills = $this->bills->getAllBill($keyword, $status, $this->per_page, $this->offset);

        return $this->view('admin', [
            'page' => 'bill/list',
            'js' => ['ajax', 'search'],
            'bills' => $bills,
            'getBill' => $getBills,
            'title' => 'Bill',
            'bg' => 'active',
            'pageactive' => 'bill',
            'maxPage' => $maxPage,
            'pageNum' => $page,
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

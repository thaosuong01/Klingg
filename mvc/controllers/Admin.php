<?php
class Admin extends Controller
{
    private $groups;
    private $users;
    private $bills;
    private $products;
    function __construct()
    {
        $this->groups = $this->model('ModelGroup');
        $this->users = $this->model('ModelUser');
        $this->products = $this->model('ModelProduct');
        $this->bills = $this->model('ModelPayment');
        $this->cate = $this->model('ModelCategory');

    }
    function index()
    {
        $countBill = count($this->bills->getBill('', -1));
        $countUser = count($this->users->getAll());
        $countProduct = count($this->products->getAllFilter());

        $bills = $this->bills->getBill('', -1);
        $total = 0;
        foreach($bills as $bill) {
            $total += $bill['total'];
        }
        $cates = $this->cate->chart_getAll();
        $arr= [ ];
        foreach($cates as $cate){
            $arr[] = $cate['name'];
        }
        $arr = json_encode(array_values($arr));

        $data_arr_cate = [];
        $data_chart_cate = $this->cate->data_chart_cate();
        foreach($data_chart_cate as $data){
            $data_arr_cate[] = $data['sl_pro'];
        }
        $data_arr_cate = json_encode(array_values($data_arr_cate));
        // echo '<pre>';
        // print_r();
        // die();
       if (isset($_SESSION['user']) && $_SESSION['user']['gr_id'] == 1) {
            return $this->view('admin', [
                'page' => 'dashboard',
                'bg' => 'active',
                'js'=>['chart'],
                'pageactive' => 'dashboard',
                'title' => 'Dashboard',
                'bill' => $countBill,
                'user' => $countUser,
                'product' => $countProduct,
                'totalBill' => $total,
                'chart_cate'=>$arr,
                'data_chart_cate'=>$data_arr_cate
            ]);
        } else {
            header('Location: ' . _WEB_ROOT . '');
        }
    }


    private $per_page = 5;
    private $offset = 0;
    // Group user
    function list_group()
    {
        $keyword = '';
        if (isset($_POST['search']) && ($_POST['search'] != '')) {
            $keyword = $_POST['keyword_group'];
            $_POST['search'] = '';
        }
        $allProductNum = $this->groups->countPro();

        $maxPage = ceil($allProductNum / $this->per_page);

        if (!empty($_GET['page'])) {
            $page = $_GET['page'];
            if ($page < 1 || $page > $maxPage) {
                $page = 1;
            }
        } else {
            $page = 1;
        }

        $this->offset = ($page - 1) * $this->per_page;

        $groups = $this->groups->getAll($keyword, $this->per_page, $this->offset);
        return $this->view('admin', [
            'page' => 'groups/list',
            'groups' => $groups,
            'js' => ['ajax', 'search'],
            'title' => 'User group',
            'bg' => 'active',
            'pageactive' => 'group',
            'maxPage' => $maxPage,
            'pageNum' => $page,
        ]);
    }

    function add_group()
    {
        $msg = '';
        $type = '';
        if (isset($_POST['add_group']) && ($_POST['add_group'])) {
            $name = $_POST['groupname'];
            $created_at = date('Y-m-d H:i:s');
            $groups = $this->groups->getAll();
            $check = 0;
            foreach ($groups as $group) {
                if ($group['name'] == $name) {
                    $check = 1;
                    break;
                } else {
                    $check = 0;
                }
            }

            if ($check == 1) {
                $type = 'danger';
                $msg = 'User group name already exists';
            } else {
                $status = $this->groups->insertGroup($name, $created_at);
                if ($status) {
                    $type = 'success';
                    $msg = 'User group created successfully';
                    $_SESSION['msg'] = $msg;
                    header('Location: ' . _WEB_ROOT . '/admin/list_group');
                } else {
                    $type = 'danger';
                    $msg = 'System error';
                }
            }
        }
        return $this->view('admin', [
            'page' => 'groups/add',
            'msg' => $msg,
            'type' => $type,
            'bg' => 'active',
            'pageactive' => 'group'
        ]);
    }

    function update_group($id)
    {
        $group = $this->groups->SelectOneGroup($id);
        if (isset($_POST['update_group']) && ($_POST['update_group'])) {
            $name = $_POST['groupname'];
            $updated_at = date('Y-m-d H:i:s');
            $groups = $this->groups->getAll();
            $check = 0;
            foreach ($groups as $group) {
                if ($group['name'] == $name) {
                    $check = 1;
                    break;
                } else {
                    $check = 0;
                }
            }
            $header = 0;
            if ($check == 1) {
                $header = 0;
                $type = 'danger';
                $msg = 'User group name already exists';
            } else {
                $status = $this->groups->updateGroup($id, $name, $updated_at);
                if ($status) {
                    $header = 1;
                    $type = 'success';
                    $msg = 'User group updated successfully';
                } else {
                    $header = 0;
                    $type = 'danger';
                    $msg = 'System error';
                }
            }

            if ($header === 0) {
                return $this->view('admin', [
                    'page' => 'groups/update',
                    'group' => $group,
                    'msg' => $msg,
                    'type' => $type,
                    'bg' => 'active',
                    'pageactive' => 'group'
                ]);
            } else {
                $_SESSION['msg'] = $msg;
                header('Location: ' . _WEB_ROOT . '/admin/list_group');
                return;
            }
        }
        if (!empty($group)) {
            return $this->view('admin', [
                'page' => 'groups/update',
                'group' => $group,
                'bg' => 'active',
                'pageactive' => 'group'
            ]);
        }
    }

    function delete_group($id)
    {
        $users = $this->users->checkGroupUser($id);
        if (!empty($users)) {
            echo count($users);
        } else {
            $status = $this->groups->deleteGroup($id);
            if ($status) {
                echo -1;
            } else {
                echo -2;
            }
        }
    }
}

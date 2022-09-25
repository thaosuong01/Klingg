<?php
class Admin extends Controller
{
    private $groups;
    private $users;
    function index()
    {
        if(isset($_SESSION['user']) && $_SESSION['user']['gr_id'] == 1){
            return $this->view('admin', [
                'page' => 'dashboard',
            ]);
        }
        else {
            header('Location: ' . _WEB_ROOT. '');
        }
    }

    function __construct()
    {
        $this->groups = $this->model('ModelGroup');
        $this->users = $this->model('ModelUser');

    }
    // Group user
    function list_group()
    {
        $keyword = '';
        if(isset($_POST['search']) && ($_POST['search'] != '')) {
            $keyword = $_POST['keyword_group'];
            $_POST['search'] = '';
        }
        $groups = $this->groups->getAll($keyword);
        return $this->view('admin', [
            'page' => 'groups/list',
            'groups' => $groups,
            'js' => ['ajax','search'],
            'title'=> 'User Group'
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
                    $msg = 'Added user group successfully';
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
            'type' => $type
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
                    $msg = 'Added user group successfully';
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
                    'type' => $type
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

            ]);
        }
    }

    function delete_group($id)
    {
        $users = $this->users->checkGroupUser($id);
        if(!empty($users)) {
            echo count($users);
        }
        else {
            $status = $this->groups->deleteGroup($id);
            if ($status) {
                echo -1;
            } else {
                echo -2;
            }
        }
    }
    
}

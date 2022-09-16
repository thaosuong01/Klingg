<?php
class Admin extends Controller
{
    function index()
    {
        return $this->view('admin', [
            'page' => 'dashboard',
        ]);
    }

    function __construct()
    {
        $this->groups = $this->model('ModelGroup');
    }
    function list_group()
    {
        $groups = $this->groups->getAll();
        return $this->view('admin', [
            'page' => 'groups/list',
            'groups' => $groups,
            'js' => ['ajax']
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
                $msg = 'Group name exist';
            } else {
                $status = $this->groups->insertGroup($name, $created_at);
                if ($status) {
                    $type = 'success';
                    $msg = 'Add group successful';
                } else {
                    $type = 'danger';
                    $msg = 'error';
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
                $msg = 'Group name exist';
            } else {
                $status = $this->groups->updateGroup($id, $name, $updated_at);
                if ($status) {
                    $header = 1;

                    $type = 'success';
                    $msg = 'Update group successful';
                } else {
                    $type = 'danger';
                    $header = 0;

                    $msg = 'error';
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

    function delete_group($id) {
        $status = $this->groups->deleteGroup($id);
        if($status) {
            echo 1;
        }
    }
}

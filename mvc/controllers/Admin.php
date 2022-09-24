<?php
class Admin extends Controller
{
    private $groups;
    private $users;
    function index()
    {
        return $this->view('admin', [
            'page' => 'dashboard',
        ]);
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
            'js' => ['ajax','search']
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
    
    // User
    function list_user()
    {
        $keyword = '';
        if(isset($_POST['search']) && ($_POST['search'] != '')) {
            $keyword = $_POST['keyword_user'];
            $_POST['search'] = '';
        }
        $users = $this->users->getAll($keyword);
        return $this->view('admin', [
            'page' => 'users/list',
            'users' => $users,
            'js' => ['ajax','search']
        ]);
    }

    function add_user()
    {
        $msg = '';
        $type = '';
        if (isset($_POST['add_user']) && ($_POST['add_user'])) {
            $name = $_POST['username'];
            $created_at = date('Y-m-d H:i:s');
            $users = $this->users->getAll();
            $check = 0;
            foreach ($users as $user) {
                if ($user['name'] == $name) {
                    $check = 1;
                    break;
                } else {
                    $check = 0;
                }
            }

            if ($check == 1) {
                $type = 'danger';
                $msg = 'User name already exists';
            } else {
                $status = $this->users->insert($name, $created_at);
                if ($status) {
                    $type = 'success';
                    $msg = 'Added user successfully';
                    $_SESSION['msg'] = $msg;
                    header('Location: ' . _WEB_ROOT . '/admin/list_user');
                } else {
                    $type = 'danger';
                    $msg = 'System error';
                }
            }
        }
        return $this->view('admin', [
            'page' => 'users/add',
            'msg' => $msg,
            'type' => $type
        ]);
    }

    function update_user($id)
    {
        $user = $this->users->SelectOneUser($id);
        if (isset($_POST['update_user']) && ($_POST['update_user'])) {
            $name = $_POST['username'];
            $updated_at = date('Y-m-d H:i:s');
            $users = $this->users->getAll();
            $check = 0;
            foreach ($users as $user) {
                if ($user['name'] == $name) {
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
                $msg = 'User user name already exists';
            } else {
                $status = $this->users->updateUser($id, $name, $updated_at);
                if ($status) {
                    $header = 1;
                    $type = 'success';
                    $msg = 'Added user user successfully';
                } else {
                    $header = 0;
                    $type = 'danger';
                    $msg = 'System error';
                }
            }

            if ($header === 0) {
                return $this->view('admin', [
                    'page' => 'users/update',
                    'user' => $user,
                    'msg' => $msg,
                    'type' => $type
                ]);
            } else {
                $_SESSION['msg'] = $msg;
                header('Location: ' . _WEB_ROOT . '/admin/list_user');
                return;
            }
        }
        if (!empty($user)) {
            return $this->view('admin', [
                'page' => 'users/update',
                'user' => $user,

            ]);
        }
    }

    function delete_user($id)
    {
        $users = $this->users->checkUser($id);
        if(!empty($users)) {
            echo count($users);
        }
        else {
            $status = $this->users->deleteUser($id);
            if ($status) {
                echo -1;
            } else {
                echo -2;
            }
        }
    }
}

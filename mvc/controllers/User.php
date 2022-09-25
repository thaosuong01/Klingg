<?php
class User extends Controller
{
    public function login()
    {
        return $this->view('client', [
            'page' => 'login',
            'js' => [
                'account'
            ]
        ]);
    }

    public function register()
    {
        return $this->view('client', [
            'page' => 'register',
            'js' => [
                'register'
            ]
        ]);
    }

    private $users;
    private $groups;
    function __construct()
    {
        $this->users = $this->model('ModelUser');
        $this->groups = $this->model('ModelGroup');
    }
    function handleRegister()
    {
        if (isset($_POST['register']) && $_POST['register'] != '') {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $name = $firstname . ' ' . $lastname;
            $email = $_POST['email'];
            $password = $_POST['password'];
            $create_at = date('Y-m-d H:i:s');
            $users = $this->users->getAll();
            $checkEmail = false;
            $message = '';
            if (!empty($users)) {
                foreach ($users as $user) {
                    if ($user['email'] == $email) {
                        $checkEmail = true;
                        break;
                    }
                }
            } else {
                $checkEmail = false;
            }
            $checkLogin = false;
            if ($checkEmail) {
                $message = 'Email already exists!';
                $checkLogin = false;
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $status = $this->users->InsertUser($name, $email, $password, $create_at);
                if ($status) {
                    $checkLogin = true;

                    $message = 'Successful account registration';
                } else {
                    $message = 'There was a problem with the system, please try again later';
                    $checkLogin = false;
                }
            }


            if ($checkLogin) {
                $_SESSION['msg'] = $message;
                header('Location: ' . _WEB_ROOT . '/user/login');
            } else {
                $this->view('client', [
                    'page' => 'register',
                    'msg' => $message
                ]);
            }
        }
    }

    function handleLogin()
    {
        if (isset($_POST['login']) && $_POST['login']) {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->users->SelectOneUser($email);
            $message = '';

            if (!empty($user)) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user'] = $user;

                    header('Location: ' . _WEB_ROOT . '/home');
                } else {
                    $_SESSION['msglg'] = 'Incorrect password';
                    $_SESSION['typelg'] = 'danger';

                    header('Location: ' . _WEB_ROOT . '/user/login');
                }
            } else {
                $_SESSION['msglg'] = 'Email is incorrect';
                $_SESSION['typelg'] = 'danger';

                header('Location: ' . _WEB_ROOT . '/user/login');
            }
        }
    }

    function logout()
    {
        unset($_SESSION['user']);
        header('Location: ' . _WEB_ROOT);
    }

    function list_user()
    {
        $keyword = '';
        $gr_id = 0;
        if (isset($_POST['search']) && ($_POST['search'] != '')) {
            $keyword = $_POST['keyword_user'];
            $_POST['search'] = '';
            if(!empty($_POST['group'])){
                $gr_id = $_POST['group'];

            }
        }
        $users = $this->users->getAll($keyword,0, (int)$gr_id);
        $groups = $this->groups->getAll();
        return $this->view('admin', [
            'page' => 'users/list',
            'users' => $users,
            'groups' => $groups,
            'js' => ['ajax', 'search'],
            'title'=> 'User'
        ]);
    }


    function add_user()
    {
        $msg = '';
        $type = '';
        $groups = $this->groups->getAll();
        if (isset($_POST['add_user']) && ($_POST['add_user'])) {
            $name = $_POST['username'];
            $avatar = $_FILES['avatar']['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $group = $_POST['group'];
            $desc = $_POST['description'];

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
                $target_file = _UPLOAD . '/avt/' .  basename($_FILES['avatar']['name']);
                if (move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)) {
                }
                $status = $this->users->insert($name, $avatar, $group, $email, $password, $phone, $address, $desc, $created_at);
                if ($status) {
                    $type = 'success';
                    $msg = 'Added user successfully';
                    $_SESSION['msg'] = $msg;
                    header('Location: ' . _WEB_ROOT . '/user/list_user');
                } else {
                    $type = 'danger';
                    $msg = 'System error';
                }
            }
        }
        return $this->view('admin', [
            'page' => 'users/add',
            'groups' => $groups,
            'msg' => $msg,
            'type' => $type
        ]);
    }

    function update_user($id)
    {
        $user = $this->users->SelectUser($id);
        $groups = $this->groups->getAll();
        if (isset($_POST['update_user']) && ($_POST['update_user'])) {
            $name = $_POST['username'];
            $avatar = $_FILES['avatar']['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (!empty($password)) {
                $password = password_hash($password, PASSWORD_DEFAULT);
            }
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $group = $_POST['group'];
            $desc = $_POST['description'];
            $updated_at = date('Y-m-d H:i:s');
            $users = $this->users->getAll('', $id);
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
                $status = $this->users->updateUser($id, $name, $avatar, $group, $email, $password, $phone, $address, $desc, $updated_at);
                if ($status) {
                    $header = 1;
                    $type = 'success';
                    $msg = 'Update user successfully';
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
                header('Location: ' . _WEB_ROOT . '/user/list_user');
                return;
            }
        }
        if (!empty($user)) {
            return $this->view('admin', [
                'page' => 'users/update',
                'user' => $user,
                'groups' => $groups
            ]);
        }
    }

    function delete_user($id)
    {
        $status = $this->users->deleteUser($id);
        if ($status) {
            echo -1;
        } else {
            echo -2;
        }
    }
}

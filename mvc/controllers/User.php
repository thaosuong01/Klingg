<?php
class User extends Controller
{
    public function login()
    {
        return $this->view('client', [
            'page' => 'login',
            'js' => ['account'],
            'css' => ['login']
        ]);
    }

    public function register()
    {
        return $this->view('client', [
            'page' => 'register',
            'js' => [
                'register'
            ],
            'css' => ['register']
        ]);
    }

    private $users;
    private $groups;
    private $products;
    function __construct()
    {
        $this->users = $this->model('ModelUser');
        $this->groups = $this->model('ModelGroup');
        $this->products = $this->model('ModelProduct');
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
                    'msg' => $message,
                    'css' => ['register']
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
                    $carts = $this->products->selectCart($user['id'])['carts'];
                    try{

                        if ($carts) {
                            $_SESSION['cart'] = json_decode($carts,true);
                        } else {
                            $_SESSION['cart'] = [];
                        }
    
                        header('Location: ' . _WEB_ROOT . '/home');
                    }catch (Exception $e) {
                        echo 'Caught exception: ',  $e->getMessage(), "\n";
                    }

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
        unset($_SESSION['cart']);
        header('Location: ' . _WEB_ROOT);
    }

    private $per_page = 5;
    private $offset = 0;

    function list_user()
    {
        $this->per_page = 5;
        $keyword = '';
        $gr_id = 0;
        if (isset($_POST['search']) && ($_POST['search'] != '') || !empty($_GET['keyword_user']) || !empty($_GET['group'])) {
            if (!empty($_GET['keyword_user'])) {

                $keyword =  $_GET['keyword_user'];
            }
            $_GET['search'] = '';

            if (!empty($_GET['group']))
                $gr_id = $_GET['group'];
        }

        $countUser = count($this->users->getAll($keyword, 0, $gr_id));
        $maxPage = ceil($countUser / $this->per_page);

        if (!empty($_GET['page'])) {
            $page = $_GET['page'];
            if ($page < 1 || $page > $maxPage) {
                $page = 1;
            }
        } else {
            $page = 1;
        }

        $this->offset = ($page - 1) * $this->per_page;

        $users = $this->users->getAllUser($keyword, 0, (int)$gr_id, $this->per_page, $this->offset);
        $groups = $this->groups->getAll();

        return $this->view('admin', [
            'page' => 'users/list',
            'users' => $users,
            'groups' => $groups,
            'maxPage' => $maxPage,
            'pageNum' => $page,
            'js' => ['ajax', 'search'],
            'title' => 'User',
            'bg' => 'active',
            'pageactive' => 'user'
        ]);
    }


    function add_user()
    {
        $msg = '';
        $type = '';
        $groups = $this->groups->getAll();
        if (isset($_POST['add_user']) && ($_POST['add_user'])) {
            $name = $_POST['username'];
            $avatar = $this->processImg();
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
                if ($user['email'] == $email) {
                    $check = 1;
                    break;
                } else {
                    $check = 0;
                }
            }

            if ($check == 1) {
                $type = 'danger';
                $msg = 'Email already exists';
            } else {
                $status = $this->users->insert($name, $avatar, $group, $email, $password, $phone, $address, $desc, $created_at);
                if ($status) {
                    $type = 'success';
                    $msg = 'User created successfully';
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
            'type' => $type,
            'title' => 'User',
            'js' => ['uploadImg'],
            'bg' => 'active',
            'pageactive' => 'user'
        ]);
    }

    function update_user($id)
    {
        $user = $this->users->SelectUser($id);
        $groups = $this->groups->getAll();
        if (isset($_POST['update_user']) && ($_POST['update_user'])) {

            $name = $_POST['username'];
            $avatar = $this->processImg();
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
                if ($user['email'] == $email) {
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
                $msg = 'Email already exists';
            } else {
                $status = $this->users->updateUser($id, $name, $avatar, $group, $email, $password, $phone, $address, $desc, $updated_at);
                if ($status) {
                    $header = 1;
                    $type = 'success';
                    $msg = 'User updated successfully';
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
                    'type' => $type,
                    'js' => ['uploadImg'],
                    'bg' => 'active',
                    'pageactive' => 'user'
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
                'groups' => $groups,
                'js' => ['uploadImg'],
                'bg' => 'active',
                'pageactive' => 'user'
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

    function processImg()
    {
        if (!empty($_FILES['avatar'])) {
            $date = new DateTimeImmutable();
            $fileNameArr = explode(".", $_FILES['avatar']['name']);
            if (isset($fileNameArr[1])) {
                $target_file = _UPLOAD . '/avt/' .  basename($date->getTimestamp() . "." . $fileNameArr[1]);

                if (move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)) {
                    return $date->getTimestamp() . "." . $fileNameArr[1];
                }
            }
        }
    }
}

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
    function __construct()
    {
        $this->users = $this->model('ModelUser');
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
}

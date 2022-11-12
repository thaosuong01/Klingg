<?php
class Account extends Controller
{
    function __construct()
    {
        $this->categories = $this->model('ModelCategory');
        $this->users = $this->model('ModelUser');
    }

    function index()
    {
        $categories = $this->categories->getAllCl();
        if (isset($_SESSION['user'])) {
            $user = $this->users->SelectUser($_SESSION['user']['id']);
        }

        return $this->view('client', [
            'page' => 'account',
            'categories' => $categories,
            'user' => $user,
            'css' => ['blog'],
            'js' => ['ajax', 'uploadImg']
        ]);
    }

    function edit_profile() {
        if (isset($_POST['update']) && ($_POST['update'])) {
            $id = $_SESSION['user']['id'];
            $name = $_POST['name'];
            $avatar = $this->processImg();
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $desc = $_POST['description'];
            $updated_at = date('Y-m-d H:i:s');

            $this->users->editProfile($id, $name, $avatar, $email, $address, $phone, $desc, $updated_at);
            if (isset($_SESSION['user'])) {
                $id = $_SESSION['user']['id'];
                $_SESSION['user'] = $this->users->SelectUser($id);
            }
            
        }
        header('Location: '. _WEB_ROOT .'/account');
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

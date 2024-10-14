<?php 
session_start();
require_once('./parts/db.php');
$account = filter_var($_POST['account'],FILTER_VALIDATE_EMAIL) ;//驗證email格式
$password = strip_tags(trim($_POST['password'])) ; //去空白並去掉html,xml,php標籤
$password_confirmation = strip_tags(trim($_POST['password_confirmation'])) ;
class Auth{
    public function login()
    {

    }
    public function logout()
    {
        unset($_SESSION['user']);//刪除變數
        session_destroy();//破壞session
        header('Location:index.php');//轉址回首頁
    }
    public function register()
    {

    }
    public function forgotpassword()
    {

    }
}
$auth = new Auth();
switch ($_POST['type']) {
    case 'register':
        # code...
        break;
    case 'login':
        # code...
    case 'logout':
    case 'forgot-password':
        break;
    default:
        # code...
        break;
}
<?php 
session_start();
require_once('./parts/db.php');
class Auth{
    private $conn;//承接服務的私有屬性
    public function __construct(PDO $conn) //注入服務
    {
        $this->conn = $conn;//承接服務
    }
    public function login()
    {
        $account = filter_var($_POST['account'],FILTER_VALIDATE_EMAIL) ;//驗證email格式
        $password = password_hash(strip_tags(trim($_POST['password'])),PASSWORD_DEFAULT); //去空白並去掉html,xml,php標籤並雜湊
        if(!$account){
            echo json_encode('email格式不正確.');
            exit; 
        }
        $check_account_sql = 'select email from users where email = :email and password = :password';
        $statement = $this->conn->prepare($check_account_sql);
        $statement->bindParam('email', $account, PDO::PARAM_STR);
        $statement->bindParam('password', $password, PDO::PARAM_STR);
        $statement->execute();
        if($statement->rowCount() > 0){
            $_SESSION['user'] = $account;
            session_regenerate_id();//更新sessionID
            header('Location :navigate.php');
            exit;
        }else{
            $check_account_sql = 'select email,password from users where email = :email ';
            $statement = $this->conn->prepare($check_account_sql);
            $statement->bindParam('email', $account, PDO::PARAM_STR);
            $statement->execute();
            if($statement->rowCount() > 0){
                echo json_encode('密碼不正確.');
                exit;
            }else{
                echo json_encode('無此帳號，需註冊.');
                exit;
            }
        }
    }
    public function logout()
    {
        unset($_SESSION['user']);//刪除變數
        session_destroy();//破壞session
        header('Location:index.php');//轉址回首頁
    }
    public function register()
    {
        $account = filter_var($_POST['account'],FILTER_VALIDATE_EMAIL) ;//驗證email格式
        $password = password_hash(strip_tags(trim($_POST['password'])),PASSWORD_DEFAULT); //去空白並去掉html,xml,php標籤並雜湊
      

        if(!$account){
            echo json_encode('email格式不正確.');
            exit;
        }
        $check_email_sql = 'select email from users where email = :email';
        $statement = $this->conn->prepare($check_email_sql);//準備pdo敘述
        $statement->bindParam('email', $account, PDO::PARAM_STR);//綁定一個參數到pdo敘述
        $statement->execute();
        if($statement->rowCount() > 0){
            echo json_encode('此email已經註冊過');
            exit;
        }else{
            $create_user_sql = 'insert into users values (:email,:password)';
            $statement = $this->conn->prepare($create_user_sql);
            $statement->bindParam('email', $account, PDO::PARAM_STR);
            $statement->bindParam('password', $password, PDO::PARAM_STR);   
            $statement->execute();
            if($statement->rowCount() > 0){
               $_SESSION['user'] = $account;
               session_regenerate_id();//更新sessionID
               header('Location :navigate.php');
               exit;
            }
        }
    }
    public function forgotpassword()
    {

    }
}
$auth = new Auth($conn);
switch ($_POST['type']) {
    case 'register':
        $auth->register();
        break;
    case 'login':
        $auth->login();
        break;
    case 'logout':
        $auth->logout();
        break;
    case 'forgot-password':
        break;
}
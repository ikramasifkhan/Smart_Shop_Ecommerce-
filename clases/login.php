<?php

/**
 * Description of login
 *
 * @author Radi
 */
class Login {

    private $link;

    public function __construct() {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'db_smart_shop';
        $this->link = mysqli_connect($host, $user, $password, $database);
        if (!$this->link) {
            die('Connection problem' . mysqli_error($this->link));
        }  
    }

    public function check_login_info($data){
        $email_address=$data['email_address'];
        $password= md5($data['password']);
        $query="SELECT * FROM tbl_admin WHERE email_address='$email_address' AND password='$password'";
        if(mysqli_query($this->link, $query)){
            $query_result=mysqli_query($this->link, $query);
            $check_admin_info= mysqli_fetch_assoc($query_result);
            if($check_admin_info){
                session_start();
                $_SESSION['admin_name']=$check_admin_info['admin_name'];
                $_SESSION['admin_id']=$check_admin_info['admin_id'];
                header('Location: admin_master.php');
            }else{
                $message='Please enter valid email and password';
                return $message;
            }
                
        } else {
            die('Query problem'.mysqli_error($this->link));
        }
    }

}

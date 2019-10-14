<?php
session_start();
function  admin_check_login_info($data){
    require '../db_connect.php';
    $password= md5($data['password']);
    $email_address=$data['email_address'];
    $query="SELECT * FROM tbl_admin WHERE email_address='$email_address' AND password='$password' ";
    if(mysqli_query($link, $query)){
        $query_result=mysqli_query($link, $query);
        $admin_info= mysqli_fetch_assoc($query_result);
        if($admin_info){
            
            $_SESSION['admin_name']=$admin_info['admin_name'];
            $_SESSION['admin_id']=$admin_info['admin_id'];
            
            header('Location: admin_master.php');
        } else {
            $message='Enter valid email adress or password';
            return $message;
        }
    } else {
        die('Query problem'.mysqli_error($link));
    }
}

function admin_logout(){
    unset($_SESSION['admin_name']);
    unset($_SESSION['admin_id']);
    header('Location: index.php');
}
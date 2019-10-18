<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of super_admin
 *
 * @author Radi
 */
class Super_admin {
    public function logout(){
        unset($_SESSION['admin_name']);
        unset($_SESSION['admin_id']);
        header('Location: index.php');
    }
}

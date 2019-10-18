<?php

/**
 * Description of db_coonect
 *
 * @author Radi
 */
class Db_coonect {
    protected  $connection;
    public function __construct() {
          $host='localhost';
          $user='root';
          $password='';
          $database = 'db_smart_shop';
          $this->connection= mysqli_connect($host, $user, $password, $database);
          if(!$this->connection){
              die('Connection problem'. mysqli_error($this->connection));
          }
          return $this->connection;
    }

}





















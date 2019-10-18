<?php

/**
 * Description of category
 *
 * @author Radi
 */
require 'db_coonect.php';
class category extends Db_coonect {
    
    public function save_category_info($data){
        $this->connection;
        $query="INSERT INTO tbl_category (category_name, category_description, publication_status)"
                . " VALUES ('$data[category_name]', '$data[category_description]', '$data[publication_status]')";
        if(mysqli_query($this->connection, $query)){
            $message="Your info saved successfully";
            return $message;
        } else {
            die('Query problem'. mysqli_query($this->connection, $query));
        }
    }
    
    public function select_all_category_info(){
        $this->connection;
        $query="SELECT * FROM tbl_category";
        if(mysqli_query($this->connection, $query)){
            $query_result= mysqli_query($this->connection, $query);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->connection));
        }
    }
    
    public function unpublish_category_info_by_category_id($category_id){
        $this->connection;
        $query="UPDATE tbl_category SET publication_status=0 WHERE category_id='$category_id'";
        if(mysqli_query($this->connection, $query)){
            $message='Info unpublished successfully';
            return $message;
        } else {
            die('Query problem'.mysqli_error($this->connection));
        }
    }
    
    public function publish_category_info_by_category_id($category_id){
        $query="UPDATE tbl_category SET publication_status=1 WHERE category_id='$category_id'";
        if(mysqli_query($this->connection, $query)){
            $message='Info published successfully';
            return $message;
        } else {
            die('Query problem'.mysqli_error($this->connection));
        }
    }
}

<?php
class Product{
    private $db_con;
    public function __construct() {
        $host_name="localhost";
        $user_name='root';
        $password='';
        $db_name='db_shop';
        $this->db_con=mysqli_connect($host_name, $user_name, $password, $db_name);
        if(!$this->db_con) {
            die('Connection Fail'.  mysqli_error($this->db_con));
         } 
    }
    public function save_product_info($data) {
        $sql="INSERT INTO tbl_product (product_name, category_name, brand_name,stock_amount,product_price,product_description) VALUES ('$data[product_name]', '$data[category_name]','$data[brand_name]','$data[stock_amount]','$data[product_price]','$data[product_description]')";
        if ( mysqli_query($this->db_con, $sql) ) {
            $message="Wao..Product info save successfully";
            return $message;
        } else {
            die('Query problem'.  mysqli_error($this->db_con));
        }  
    }
    public function select_all_product_info() {
        $sql="SELECT * FROM tbl_product";
        if ( mysqli_query($this->db_con, $sql) ) {
            $query_result=mysqli_query($this->db_con, $sql);
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_con));
        }
    }
    public function select_product_info_by_id($product_id) {
        $sql="SELECT * FROM tbl_product WHERE product_id='$product_id' ";
        if ( mysqli_query($this->db_con, $sql) ) {
            $query_result=mysqli_query($this->db_con, $sql);
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_con));
        }
    }
    
    public function update_product_info_by_id($data) {
        $sql="UPDATE tbl_product  SET product_name='$data[product_name]', category_name='$data[category_name]', brand_name='$data[brand_name]',stock_amount='$data[stock_amount]',product_price='$data[product_price]',product_description='$data[product_description]' WHERE product_id='$data[product_id]' ";
        if ( mysqli_query($this->db_con, $sql) ) {
            
            header('Location: view_product.php');
        } else {
            die('Query problem'.  mysqli_error($this->db_con));
        }
    }
    public function delete_product_info_by_id($product_id) {
        $sql="DELETE FROM tbl_product WHERE product_id='$product_id' ";
        if ( mysqli_query($this->db_con, $sql) ) {
            $message='Product info delete successfully !';
            return $message;
        } else {
            die('Query problem'.  mysqli_error($this->db_con));
        }
    }
    
    public function admin_logout() {
        unset($_SESSION['admin_name']);
        unset($_SESSION['admin_id']);
        
        
        header('Location: index.php');
    }
    
    
    
}
<?php

class Login {
    private $db_con;
    
    public function __construct() {
        $host_name="localhost";
        $user_name='root';
        $password='';
        $db_name='db_shop()';
        $this->db_con=mysqli_connect($host_name, $user_name, $password, $db_name);
        if(!$this->db_con) {
            die('Connection Fail'.mysqli_error($this->db_con));
         } 
    }
    public function admin_login_check($data) {
        $email_address=$data['email_address'];
        $password=md5($data['password']);
//        echo $email_address.'<br/>';
//        echo $password;
        $sql="SELECT * FROM tbl_admin WHERE email_address='$email_address' AND password='$password' ";
        if(mysqli_query($this->db_con,$sql)) {
           $query_result=mysqli_query($this->db_con, $sql); 
           $admin_info=mysqli_fetch_assoc($query_result);
//           echo '<pre>';
//           print_r($admin_info);
//           exit();
           if($admin_info) {
               session_start();
               $_SESSION['admin_name']=$admin_info['admin_name'];
               $_SESSION['admin_id']=$admin_info['admin_id'];
               
               header('Location:add_product.php');
           } else {
               $ex_message="Please use valid email address & password";
               return $ex_message;
           }
        } else {
            die('Query problem'.  mysqli_error($this->db_con) );
        }
    }
}

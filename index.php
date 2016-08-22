<?php 
   if(isset($_POST['btn'])) {
       require './classes/login.php';
       $obj_login=new Login();
       $ex_message=$obj_login->admin_login_check($_POST);
   }

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>MY Blog Login</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            /*            [class*='col-']{
                            border: 1px solid green;
                        }*/
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="height: 100px;"></div>  
            </div>
            <div class="row">
                <div class="col-md-12" style="height: 450px;">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="well well-sm text-primary text-center">
                                        Please fill All the information properly.
                                    </div>
                                    <?php if(isset($ex_message) ) { ?>
                                    <div class="well well-sm text-danger text-center">
                                        <?php 
                                            echo $ex_message; 
                                         ?>
                                    </div>
                                    <?php }  ?>
                                    <div class="well">
                                        <form class="form-horizontal" role="form" action="" method="post">
                                            <div class="form-group">
                                                <label class="control-level col-md-3"> Email</label>
                                                <div class="col-md-9">
                                                    <input type="email" name="email_address" class="form-control">
                                                </div> 
                                            </div>  
                                            <div class="form-group">
                                                <label class="control-level col-md-3"> Password</label>
                                                <div class="col-md-9">
                                                    <input type="password" name="password" class="form-control">
                                                </div> 
                                            </div>                     
                                            <div class="form-group">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <input type="submit" name="btn" value="LOGIN" class="btn btn-primary btn-block">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>  
            <div class="row">
                <div class="col-md-12" style="height: 50px;"></div>  
            </div>
        </div>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
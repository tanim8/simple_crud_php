<?php
session_start();
require './classes/product.php';
$obj_product=new Product();
        
    if(isset($_POST['btn'])) {
        $message=$obj_product->save_product_info($_POST);
    }
    
    if(isset($_GET['status'])) {
        $obj_product->admin_logout();
    }
    
?>


<!DOCTYPE HTML>
<html>
    <head>
        <title>MY Site</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center text-primary" style="height: 100px;">
                    <h1>Welcome <?php echo $_SESSION['admin_name']; ?>.</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4" style="height: 35px; padding: 0px;">
                    <a href="add_product.php" class="btn btn-primary btn-block">ADD PRODUCT</a>
                </div>
                <div class="col-lg-4" style="height: 35px; padding: 0px;">
                    <a href="view_product.php" class="btn btn-primary btn-block">VIEW PRODUCT</a>
                </div>
                <div class="col-lg-4" style="height: 35px; padding: 0px;">
                    <a href="?status=logout" class="btn btn-primary btn-block">Logout</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" style="height: 450px;">
                    <div class="row">
                        <div class="col-lg-offset-2 col-lg-8">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="well well-sm text-primary text-center">
                                       ADD PRODUCT FORM
                                    </div>
                                    <?php if (isset($message)) { ?>
                                    <div class="well well-sm text-success text-center">
                                       <?php echo $message; ?>
                                    </div>
                                    <?php } ?>
                                    <div class="well">
                                        <form class="form-horizontal" role='form' action="" method="post">
                                            <div class="form-group">
                                                <label class="control-label col-lg-3">Product Name</label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="product_name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-3">Category Name</label>
                                                <div class="col-lg-6">  
                                                    <input type="text" name="category_name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-3">Brand Name</label>
                                                <div class="col-lg-6">  
                                                    <input type="text" name="brand_name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-3">Stock Amount</label>
                                                <div class="col-lg-6">  
                                                    <input type="text" name="stock_amount" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-3">Product Price</label>
                                                <div class="col-lg-6">  
                                                    <input type="text" name="product_price" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-lg-3">Product Description</label>
                                                <div class="col-lg-6">  
                                                    <textarea name="product_description" class="form-control" style="resize: vertical;"></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-lg-offset-6 col-lg-3">
                                                    <input type="submit" name="btn" value="Create Product" class="btn btn-primary btn-block"> 
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
                <div class="col-lg-12" style="height: 30px;"></div>
            </div>
        </div>
        
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
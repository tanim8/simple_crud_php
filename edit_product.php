<?php
  
   
    $product_id=$_GET['product_id'];
    require './classes/product.php';
    $obj_product=new Product();
    $query_result=$obj_product->select_product_info_by_id($product_id);
    $product_info=mysqli_fetch_assoc($query_result);
    
    if(isset($_POST['btn'])) {
        $obj_product->update_product_info_by_id($_POST);
    }
    
    
?>


<!DOCTYPE HTML>
<html>
    <head>
        <title>MY Shop</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
       
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center text-primary" style="height: 100px;">
                       
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
                        <div class="col-lg-offset-3 col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="well well-sm text-primary text-center">
                                       Edit Product Form
                                    </div>
                                    <?php if (isset($message)) { ?>
                                    <div class="well well-sm text-success text-center">
                                       <?php echo $message; ?>
                                    </div>
                                    <?php } ?>
                                    <div class="well">
                                        <form name="edit_product_form" class="form-horizontal" role='form' action="" method="post">
                                            <div class="form-group">
                                                <label class="control-label col-lg-3">Product Name</label>
                                                <div class="col-lg-9">
                                                    <input type="text" name="product_name" value="<?php echo $product_info['product_name']; ?>" class="form-control">
                                                    <input type="hidden" name="product_id" value="<?php echo $product_info['product_id']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-3">Category Name</label>
                                                <div class="col-lg-9">  
                                                    <input type="text" name="category_name" value="<?php echo $product_info['category_name']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-3">Brand Name</label>
                                                <div class="col-lg-9">  
                                                    <input type="text" name="brand_name" value="<?php echo $product_info['brand_name']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-3">Stock Amount</label>
                                                <div class="col-lg-9">  
                                                    <input type="text" name="stock_amount" value="<?php echo $product_info['stock_amount']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-3">Product Price</label>
                                                <div class="col-lg-9">  
                                                    <input type="text" name="product_price" value="<?php echo $product_info['product_price']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-lg-3">Product Description</label>
                                                <div class="col-lg-9">  
                                                    <textarea name="product_description" class="form-control" style="resize: vertical;"><?php echo $product_info['product_description']; ?></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-lg-offset-3 col-lg-9">
                                                    <input type="submit" name="btn" value="UPDATE PRODUCT" class="btn btn-primary btn-block"> 
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





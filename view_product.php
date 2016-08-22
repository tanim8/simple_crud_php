<?php
    session_start();
    
    require './classes/product.php';
    $obj_product = new Product();
    
    if(isset($_GET['status'])) {
        if($_GET['status'] == 'delete') {
        $product_id=$_GET['product_id'];
        $message=$obj_product->delete_product_info_by_id($product_id);
        } else {
        $obj_product->admin_logout();
        }
    }
    
    
    $query_result = $obj_product->select_all_product_info();
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
                <div class="col-lg-12 text-primary text-center" style="height: 100px;">
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
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="well well-sm text-primary text-center">
                                        View Product Info
                                    </div>
                                    <?php if (isset($message)) { ?>
                                        <div class="well well-sm text-success text-center">
                                            <?php echo $message; ?>
                                        </div>
                                    <?php } ?>
                                    <div class="well">
                                        <div style="overflow-x: scroll;">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Product ID</th>
                                                    <th>Product Name</th>
                                                    <th>Category Name</th>
                                                    <th>Brand Name</th>
                                                    <th>Stock Amount</th>
                                                    <th>Product Price</th>
                                                    <th>Product Description</th>
                                                    <th>Action</th>
                                                </tr>
                                                <?php while ($product_info=  mysqli_fetch_assoc($query_result) ) { ?>
                                                <tr>
                                                    <td><?php echo $product_info['product_id']; ?></td>
                                                    <td><?php echo $product_info['product_name']; ?></td>
                                                    <td><?php echo $product_info['category_name']; ?></td>
                                                    <td><?php echo $product_info['brand_name']; ?></td>
                                                    <td><?php echo $product_info['stock_amount']; ?></td>
                                                    <td><?php echo $product_info['product_price']; ?></td>
                                                    <td><?php echo $product_info['product_description']; ?></td>
                                                    
                                                   
                                                    <td>
                                                        <a href="edit_product.php?product_id=<?php echo $product_info['product_id']; ?>" class="btn btn-success" title="Edit">
                                                            <span class="glyphicon glyphicon-edit"></span>
                                                        </a>
                                                        <a href="?status=delete&&product_id=<?php echo $product_info['product_id']; ?>" class="btn btn-danger" title="Delete" onclick="return check_delete_info(); " >
                                                            <span class="glyphicon glyphicon-trash"></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
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
        <script>
            function check_delete_info() {
                var check=confirm('Are you sure to delete this !');
                if(check == true) {
                    return ture;
                } else {
                    return false;
                }
            }
        </script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
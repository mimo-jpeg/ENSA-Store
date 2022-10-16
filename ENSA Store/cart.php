<?php
	ob_start();
	session_start();
	$pageTitle="Shop";
	include 'init.php';

	?>
<!-- Delete begin -->
<?php
    if(isset($_POST['remove'])){
        $remove = $_POST['remove'];
        foreach($remove as $id){
            $sub_total=$_SESSION['products_'.$id]['sub_total'];
            for($i=0;$i<count($_SESSION['id_products']);$i++){
                if($_SESSION['id_products'][$i] == $id){
                    unset($_SESSION['id_products'][$i]);
                    break;
                }
            }
            unset($_SESSION['products_'.$id]);
            $_SESSION['count'] -= 1;
            $_SESSION['total'] -= $sub_total;
        }
		header('location:cart.php');

    }



?>
<!-- Delete finish -->
<div id="content"><!-- #content Begin -->
    <div class="container"><!-- container Begin -->
        <div class="col-md-12"><!-- col-md-12 Begin -->

            <ul class="breadcrumb"><!-- breadcrumb Begin -->
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    Cart
                </li>
            </ul><!-- breadcrumb Finish -->

        </div><!-- col-md-12 Finish -->

        <div id="cart" class="col-md-9"><!-- col-md-9 Begin -->

            <div class="box"><!-- box Begin -->

                <form action="cart.php" method="post" ><!-- form Begin -->

                    <h1>Shopping Cart</h1>
                    <p class="text-muted">You currently have <?php echo (isset($_SESSION['count']))?  $_SESSION['count'] : "0";?> item(s) in your cart</p>

                    <div class="table-responsive"><!-- table-responsive Begin -->

                        <table class="table"><!-- table Begin -->

                            <thead><!-- thead Begin -->

                                <tr><!-- tr Begin -->

                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th colspan="1">Delete</th>
                                    <th colspan="2">Sub-Total</th>

                                </tr><!-- tr Finish -->

                            </thead><!-- thead Finish -->
                            <?php
                            if(isset($_SESSION['id_products']))
                            {
                                foreach($_SESSION['id_products'] as $product_id){
                                    if(isset($_SESSION['products_'.$product_id]))
                                    {
                            ?>
                            <tbody><!-- tbody Begin -->

                                <tr><!-- tr Begin -->

                                    <td>

                                        <img class="img-responsive" src= <?php echo "images/".$_SESSION['products_'.$product_id]['image'];?>>

                                    </td>

                                    <td>

                                        <a href= "details.php?productid=<?php echo $_SESSION['products_'.$product_id]['id'];?>" > <?php echo $_SESSION['products_'.$product_id]['product'] ;?></a>

                                    </td>

                                    <td>

                                    <?php echo $_SESSION['products_'.$product_id]['quantite'] ;?>

                                    </td>

                                    <td>

                                    <?php echo $_SESSION['products_'.$product_id]['price']." DH" ;?>

                                    </td>


                                    <td>

                                        <input type="checkbox" name="remove[]" value=<?php echo $_SESSION['products_'.$product_id]['id'] ;?>>

                                    </td>

                                    <td>

                                    <?php echo $_SESSION['products_'.$product_id]['sub_total']." DH" ;?>

                                    </td>

                                </tr><!-- tr Finish -->

                            </tbody><!-- tbody Finish -->

                            <tbody><!-- tbody Begin -->
                            <?php
                                    }
                                }
                            }
                            ?>

                            <?php
                            $total=0;
                            if(isset($_SESSION['total'])){
                                $total=$_SESSION['total'];
                            }
                            ?>
                                    <th colspan="5">Total</th>
                                    <th colspan="2"> <?php echo $total." DH"; ?></th>

                                </tr><!-- tr Finish -->

                            </tfoot><!-- tfoot Finish -->

                        </table><!-- table Finish -->

                    </div><!-- table-responsive Finish -->

                    <div class="box-footer"><!-- box-footer Begin -->

                        <div class="pull-left"><!-- pull-left Begin -->

                            <a href="shop.php" class="btn btn-default"><!-- btn btn-default Begin -->

                                <i class="fa fa-chevron-left"></i> Continue Shopping

                            </a><!-- btn btn-default Finish -->

                        </div><!-- pull-left Finish -->

                        <div class="pull-right"><!-- pull-right Begin -->

                            <button type="submit" name="update" class="btn btn-default"><!-- btn btn-default Begin -->

                                <i class="fa fa-refresh"></i> Update Cart

                            </button><!-- btn btn-default Finish -->

                            <a href="credit_card.php" class="btn btn-primary">

                                Proceed Checkout <i class="fa fa-chevron-right"></i>

                            </a>

                        </div><!-- pull-right Finish -->

                    </div><!-- box-footer Finish -->

                </form><!-- form Finish -->

            </div><!-- box Finish -->



        </div><!-- col-md-9 Finish -->

        <div class="col-md-3"><!-- col-md-3 Begin -->

            <div id="order-summary" class="box"><!-- box Begin -->

                <div class="box-header"><!-- box-header Begin -->

                    <h3>Order Summary</h3>

                </div><!-- box-header Finish -->

                <p class="text-muted"><!-- text-muted Begin -->

                    Shipping and additional costs are calculated based on value you have entered

                </p><!-- text-muted Finish -->

                <div class="table-responsive"><!-- table-responsive Begin -->

                    <table class="table"><!-- table Begin -->

                        <tbody><!-- tbody Begin -->

                            <tr><!-- tr Begin -->

                                <td> Order Sub-Total </td>
                                <th><?php echo $total." DH";?> </th>

                            </tr><!-- tr Finish -->

                            <tr><!-- tr Begin -->

                                <td> Shipping and Handling </td>
                                <td> $0 </td>

                            </tr><!-- tr Finish -->

                            <tr><!-- tr Begin -->

                                <td> Tax </td>
                                <th> $0 </th>

                            </tr><!-- tr Finish -->

                            <tr class="total"><!-- tr Begin -->

                                <td> Total </td>
                                <th> <?php echo $total." DH";?> </th>

                            </tr><!-- tr Finish -->

                        </tbody><!-- tbody Finish -->

                    </table><!-- table Finish -->

                </div><!-- table-responsive Finish -->

            </div><!-- box Finish -->

        </div><!-- col-md-3 Finish -->

    </div><!-- container Finish -->
</div><!-- #content Finish -->

<?php

    include("templates/footer.php");
    ob_end_flush();

?>
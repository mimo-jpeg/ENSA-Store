<?php
	ob_start();
	session_start();
	$pageTitle="Details";
	include 'init.php';

?>

    <div id="content"><!-- #content Begin -->
        <div class="container"><!-- container Begin -->
            <div class="col-md-12"><!-- col-md-12 Begin -->

                <ul class="breadcrumb"><!-- breadcrumb Begin -->
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        Shop
                    </li>
                </ul><!-- breadcrumb Finish -->

            </div><!-- col-md-12 Finish -->

        <div class="col-md-3"><!-- col-md-3 Begin -->

    <?php

        include("templates/sidebar.php");

    ?>

    <?php
		$productid=0;
		if(isset($_GET['productid']) && is_numeric($_GET['productid'])){
			$productid=$_GET['productid'];
		}else{
			$productid=0;
		}

  		$stmt=$con->prepare('SELECT * FROM products WHERE product_id = ?');
        $stmt->execute(array($productid));
        $row=$stmt->fetch();
        $count=$stmt->rowCount();

        if($count > 0){ // si il est superieur a 0 donc il existe !!

            $categorie_id=$row['product_category_id'];

            $stmat2=$con->prepare('SELECT * FROM categories WHERE cat_id = ?');

            $stmat2->execute(array($categorie_id));

            $categorie=$stmat2->fetch();
            }
		?>
        </div><!-- col-md-3 Finish -->

            <div class="col-md-9"><!-- col-md-9 Begin -->
                <div id="productMain" class="row"><!-- row Begin -->
                    <div class="col-sm-6" ><!-- col-sm-6 Begin -->
                        <div id="mainImage" align="center" ><!-- #mainImage Begin -->
                                <img  class="img-responsive" src=<?php echo 'images/'.$row['product_image']; ?> alt=<?php $row['product_title']; ?> >
                        </div><!-- mainImage Finish -->
                    </div><!-- col-sm-6 Finish -->

                    <div class="col-sm-6"><!-- col-sm-6 Begin -->
                        <div class="box"><!-- box Begin -->
                            <h1 class="text-center"><?php echo $row['product_title']; ?></h1>
                            <br>
                            <form action="checkout.php" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                                    <table width='100%' cellpadding="10px">
                                        <tr>
                                            <td><label >Quantity:</label></td>
                                            <td><input type="number" id="quantite" name="quantite" min="1" max="<?php echo $row['product_quantity']; ?>" value="1"></td>
                                        </tr>

                                        <tr>
                                            <td><label >Category:</label></td>
                                            <td><a style="color:grey;" href="categorie.php?catid=<?php echo $categorie['cat_id'];?>"><?php echo $categorie['cat_title'];?></a></td>
                                        </tr>
                                        <tr>
                                            <td><label >Price:</label></td>
                                            <td><p style="color:grey;font-size: 1.9rem;"><?php echo $row['product_price']." DH";?></p></td>
                                        </tr>

                                    </table>

									<input type="hidden" name="product_title" value="<?php echo $row['product_title']; ?>">
									<input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                    <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
									<input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
                                    <br>
                                    <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Add to cart</button></p>

                        </form><!-- form-horizontal Finish -->

                    </div><!-- box Finish -->


                </div><!-- col-sm-6 Finish -->


            </div><!-- row Finish -->
            <div class="box " id="details"><!-- box Begin -->
                <h2 class="text-center" style="color:#4fbfa8;">Description :</h2>
                <br> <br>      
                <?php echo $row['product_description']; ?>
                           
            </div><!-- box Finish -->

            <div class="shop-title">
                <h2>
                    Product you may like
                </h2>
            </div>

            <div class="row"><!-- row Begin -->

            <?php
				$stmt =$con->prepare("SELECT * FROM products WHERE product_category_id = '".$categorie_id."' LIMIT 3");
				$stmt->execute();

				$rows=$stmt->fetchAll();

				$i=0;
				foreach ($rows as $row) {
            ?>

                        <div class="col-sm-4 col-sm-6 center-responsive"><!-- col-sm-4 col-sm-6 single Begin -->

                            <div class="product" align="center"><!-- product Begin -->
                                <div class="box-img">
                                    <a href="details.php?productid=<?php echo $row['product_id']; ?>">

                                        <img class="img-responsive" src=<?php echo 'images/'.$row['product_image']; ?> alt=<?php $row['product_title']; ?>>

                                    </a>
                                </div>

                                <div class="text"><!-- text Begin -->

                                    <h3>
                                        <a href="details.php?productid=<?php echo $row['product_id']; ?>">
                                            <?php echo $row['product_title'] ?>
                                        </a>
                                    </h3>

                                    <p class="price"><?php echo $row['product_price'].' DH' ?></p>

                                    <p class="button">

                                        <a href="details.php?productid=<?php echo $row['product_id']; ?>" class="btn btn-info">View Details</a>

                                    </p>

                                </div><!-- text Finish -->

                            </div><!-- product Finish -->

                        </div><!-- col-sm-4 col-sm-6 single Finish -->
                        <?php
							}// La fin de notre boucle foreach !!
						?>

                    </div><!-- row Finish -->
           </div><!-- col-md-9 Finish -->

       </div><!-- container Finish -->
   </div><!-- #content Finish -->

   <?php

    include("templates/footer.php");
    ob_end_flush();
    ?>
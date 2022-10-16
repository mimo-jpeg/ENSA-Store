<?php
	ob_start();
	session_start();
	$pageTitle="Shop";
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

        </div><!-- col-md-3 Finish -->

        <div class="col-md-9"><!-- col-md-9 Begin -->
            <div class="shop-title">
                <h2>
                    Product Categories
                </h2>
            </div>

            <div class="row"><!-- row Begin -->

                <?php
                    $stmt =$con->prepare('SELECT * FROM products');
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

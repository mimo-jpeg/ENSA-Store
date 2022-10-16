<?php
	ob_start();
	session_start();
	$pageTitle="Home";
	include 'init.php';

	?>

   <div class="container" id="slider"><!-- container Begin -->

       <div class="col-md-12"><!-- col-md-12 Begin -->

           <div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide Begin -->

               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->

                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>


               </ol><!-- carousel-indicators Finish -->

               <div class="carousel-inner"><!-- carousel-inner Begin -->

                   <div class="item active">

                       <img src="images/banner/banner1.jpg" alt="Slider Image 1">

                   </div>

                   <div class="item">

                       <img src="images/banner/banner2.jpg" alt="Slider Image 2">

                   </div>



               </div><!-- carousel-inner Finish -->

               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->

                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span>

               </a><!-- left carousel-control Finish -->

               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- left carousel-control Begin -->

                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span>

               </a><!-- left carousel-control Finish -->

           </div><!-- carousel slide Finish -->

       </div><!-- col-md-12 Finish -->

   </div><!-- container Finish -->

   <div id="advantages"><!-- #advantages Begin -->

       <div class="container"><!-- container Begin -->

           <div class="same-height-row"><!-- same-height-row Begin -->

               <div class="col-sm-4"><!-- col-sm-4 Begin -->

                   <div class="box box-1 same-height"><!-- box same-height Begin -->

                       <div class="icon"><!-- icon Begin -->

                           <i class="fa fa-heart"></i>

                       </div><!-- icon Finish -->

                       <h3><a href="#">Best Offer</a></h3>

                       <p>Deals that can leave you speechless. </p>

                   </div><!-- box same-height Finish -->

               </div><!-- col-sm-4 Finish -->

               <div class="col-sm-4"><!-- col-sm-4 Begin -->

                   <div class="box box-1 same-height"><!-- box same-height Begin -->

                       <div class="icon"><!-- icon Begin -->

                           <i class="fa fa-tag"></i>

                       </div><!-- icon Finish -->

                       <h3><a href="#">Best Prices</a></h3>

                       <p>Low prices like no other place.</p>

                   </div><!-- box same-height Finish -->

               </div><!-- col-sm-4 Finish -->

               <div class="col-sm-4"><!-- col-sm-4 Begin -->

                   <div class="box box-1 same-height"><!-- box same-height Begin -->

                       <div class="icon"><!-- icon Begin -->

                           <i class="fa fa-thumbs-up"></i>

                       </div><!-- icon Finish -->

                       <h3><a href="#">100% Original</a></h3>

                       <p>Offer Ideas completly from SCRATCH!!.</p>

                   </div><!-- box same-height Finish -->

               </div><!-- col-sm-4 Finish -->

           </div><!-- same-height-row Finish -->

       </div><!-- container Finish -->

   </div><!-- #advantages Finish -->

    <!-- #hot Begin -->
    <div id="hot">
        <h2>
            Our Latest Products
        </h2>
    </div>
    <!-- #hot Finish -->

    <div id="content" class="container"><!-- container Begin -->

        <div class="row"><!-- row Begin -->

            <?php
				$stmt =$con->prepare('SELECT * FROM products LIMIT 6');
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

   </div><!-- container Finish -->

   <?php

    include("templates/footer.php");
    ob_end_flush();
    ?>

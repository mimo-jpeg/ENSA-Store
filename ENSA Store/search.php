<?php

    ob_start();
    session_start();
    include 'init.php';
    $pageTitle="SEARCH";

if(isset($_POST['search'])){
    $search=$_POST['search'];
?>
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Search
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
   <?php 
    
    include("templates/sidebar.php");
    
    ?>
               
        </div><!-- col-md-3 Finish -->
           <div class="col-md-9"><!-- col-md-9 Begin -->
               <div class="box"><!-- box Begin -->
                <?php
                        $stmt=$con->prepare("SELECT * FROM products WHERE product_title LIKE '%$search%' OR  product_description LIKE '%$search%' ");

                        $stmt->execute(array($search));

                        $rows=$stmt->fetchAll();

                        $count=count($rows);

                        if($count == 0){
                            echo '<h1>';
                            echo"<div class='alert alert-link'>There is no product like this name : <strong>$search</strong></div>";
                            echo '</h1>';
                        }
                        else{
                            echo '<h1>';
                            echo"<div class='alert alert-link'>Product like this name : <strong>$search</strong></div>";
                            echo '</h1>';
                ?>

               </div><!-- box Finish -->
                     <div class="row"><!-- row Begin -->

                                    <?php
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
                                <?php

                                    } // End else

                                ?>
                    </div><!-- row Finish -->
                   
                   </div><!-- col-md-9 Finish -->
                   
               </div><!-- container Finish -->
           </div><!-- #content Finish -->
           
<?php


        }else{
            $message='<div class="alert alert-warning">'."You should first search for product".'</div>';
            redirectFunction($message);
        }

        include 'templates/footer.php';
        ob_end_flush();
    ?>
    
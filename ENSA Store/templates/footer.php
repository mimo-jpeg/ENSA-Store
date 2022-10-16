<div id="footer" ><!-- #footer Begin -->
    <div class="container"><!-- container Begin -->
        <div class="row"><!-- row Begin -->
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->

                <h4>Pages</h4>

                <ul><!-- ul Begin -->
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="shop.php">Shop</a></li>
                </ul><!-- ul Finish -->

                <hr>

                <h4>User Section</h4>

                <ul><!-- ul Begin -->
                    <li><a href="customer_login.php">Login</a></li>
                    <li><a href="customer_register.php">Register</a></li>
                </ul><!-- ul Finish -->

                <hr class="hidden-md hidden-lg hidden-sm">

            </div><!-- col-sm-6 col-md-3 Finish -->

            <div class="com-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->

                <h4>Top Products Categories</h4>

                <ul ><!-- nav nav-pills nav-stacked category-menu Begin -->
                    <?php
                        $stmtcat =$con->prepare('SELECT * FROM categories LIMIT 4');
                        $stmtcat->execute();
                        $catrows=$stmtcat->fetchAll();
                        foreach ($catrows as $catrow) {
                    ?>
                        <li><a href="categorie.php?catid=<?php echo $catrow['cat_id']; ?>"><?php echo $catrow['cat_title'];?></a></li>
                    <?php }?>

                </ul><!-- nav nav-pills nav-stacked category-menu Finish -->

                <hr class="hidden-md hidden-lg">

            </div><!-- col-sm-6 col-md-3 Finish -->

            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 Begin -->

                <h4>Find Us</h4>

                <p><!-- p Start -->
                    <strong>Indie Profilers Inc.</strong>
                    <br/>ENSA Agadir
                    <br/>+212 6 00 00 00 00
                    <br/>storeensa@gmail.com
                </p><!-- p Finish -->

                <a href="contact.php">Check Our Contact Page</a>

                <hr class="hidden-md hidden-lg">

            </div><!-- col-sm-6 col-md-3 Finish -->

            <div class="col-sm-6 col-md-3">

                <h4>Get The News</h4>

                <p class="text-light">
                    Dont miss our latest update products.
                </p>

                <form action="" method="post"><!-- form begin -->
                    <div class="input-group"><!-- input-group begin -->

                        <input type="text" class="form-control" name="email"  placeholder="Get the news!">

                        <span class="input-group-btn"><!-- input-group-btn begin -->

                            <input type="submit" value="subscribe" class="btn btn-info">

                        </span><!-- input-group-btn Finish -->

                    </div><!-- input-group Finish -->
                </form><!-- form Finish -->

                <hr>

                <h4>Keep In Touch</h4>

                <p class="social">
                    <a href="https://www.facebook.com" class="fa fa-facebook" target="_blank"></a>
                    <a href="https://twitter.com" class="fa fa-twitter" target="_blank"></a>
                    <a href="https://instagram.com" class="fa fa-instagram" target="_blank"></a>
                    <a href="https://google-plus.com" class="fa fa-google-plus" target="_blank"></a>
                    <a href="../contact.php" class="fa fa-envelope"></a>
                </p>

            </div>
        </div><!-- row Finish -->
    </div><!-- container Finish -->
</div><!-- #footer Finish -->


<div id="copyright"><!-- #copyright Begin -->
    <div class="container"><!-- container Begin -->
        <div class="col-md-6"><!-- col-md-6 Begin -->

            <p class="pull-left">&copy; 2021 ENSA Store All Rights Reserved</p>

        </div><!-- col-md-6 Finish -->
        <div class="col-md-6"><!-- col-md-6 Begin -->

            <p class="pull-right font-weight-bold">Theme by : <a href="#" class="text-success">HESSOUNE Ayoub</a> - <a href="#" class="text-danger">SAFIR Mohammed</a> - <a href="#" class="text-primary "> WAHBI Yassine</a></p>

        </div><!-- col-md-6 Finish -->
    </div><!-- container Finish -->
</div><!-- #copyright Finish -->
<script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>


</body>
</html>
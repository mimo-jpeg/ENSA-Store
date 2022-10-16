<div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->

    <div class="container"><!-- container Begin -->

        <div class="navbar-header"><!-- navbar-header Begin -->

            <a href="index.php" class="navbar-brand"><!-- navbar-brand home Begin -->

                <img src="images/store-logo.png" alt="ENSA Store Logo" width="115px" height="35px">

            </a><!-- navbar-brand home Finish -->

            <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

                <span class="sr-only">Toggle Navigation</span>

                <i class="fa fa-align-justify"></i>

            </button>

            <button class="navbar-toggle" data-toggle="collapse" data-target="#search">

                <span class="sr-only">Toggle Search</span>

                <i class="fa fa-search"></i>

            </button>

        </div><!-- navbar-header Finish -->

        <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->

            <div class="padding-nav"><!-- padding-nav Begin -->

                <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->

                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="shop.php">Shop</a>
                    </li>
                <?php
                    if(isset($_SESSION['user'])){
                        echo "<li>";
                        echo    "<a href='my_account.php'>My Account</a>";
                        echo "</li>";
                    }
                ?>

                    <li>
                        <a href="cart.php">Shopping Cart</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact Us</a>
                    </li>

                </ul><!-- nav navbar-nav left Finish -->

            </div><!-- padding-nav Finish -->

            <a href="cart.php" class="btn navbar-btn btn-info right"><!-- btn navbar-btn btn-primary Begin -->

                <i class="fa fa-shopping-cart"></i>

                <span><?php echo (isset($_SESSION['count']))?  $_SESSION['count'] : "0";?> Items In Your Cart</span>

            </a><!-- btn navbar-btn btn-primary Finish -->

            <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->

                <button class="btn btn-info navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->

                    <span class="sr-only">Toggle Search</span>

                    <i class="fa fa-search"></i>

                </button><!-- btn btn-primary navbar-btn Finish -->

            </div><!-- navbar-collapse collapse right Finish -->

            <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->

                <form method="POST" action="search.php" class="navbar-form"><!-- navbar-form Begin -->

                    <div class="input-group"><!-- input-group Begin -->

                        <input type="text" class="form-control" placeholder="Search" name="search" required>

                        <span class="input-group-btn"><!-- input-group-btn Begin -->

                        <button type="submit" name="research" class="btn btn-info"><!-- btn btn-primary Begin -->

                            <i class="fa fa-search"></i>

                        </button><!-- btn btn-primary Finish -->

                        </span><!-- input-group-btn Finish -->

                    </div><!-- input-group Finish -->

                </form><!-- navbar-form Finish -->

            </div><!-- collapse clearfix Finish -->

        </div><!-- navbar-collapse collapse Finish -->

    </div><!-- container Finish -->

</div><!-- navbar navbar-default Finish -->
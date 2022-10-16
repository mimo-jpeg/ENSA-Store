<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/store-logo.png" type="image/x-icon">
    <title>ENSA Store</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<div id="top"><!-- Top Begin -->

    <div class="container"><!-- container Begin -->

        <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->

            <!-- <a href="/ENSA Store/index.php" class="btn btn-success btn-sm">Welcome</a> -->
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <a href="credit_card.php"><?php echo (isset($_SESSION['count']))?  $_SESSION['count'] : "0";?> Items In Your Cart | Total Price: <?php echo (isset($_SESSION['total']))?  $_SESSION['total']." DH" : "0 DH";?> </a>

        </div><!-- col-md-6 offer Finish -->

        <div class="col-md-6"><!-- col-md-6 Begin -->

            <ul class="menu"><!-- cmenu Begin -->
                    <?php
                        if(!isset($_SESSION['user'])){
                            echo "<li>";
                            echo    "<a href='customer_register.php'>Register</a>";
                            echo "</li>";
                        }
                        else{
                            echo "<li>";
                            echo    "<a href='my_account.php'>My Account</a>";
                            echo "</li>";
                        }
                    ?>

                <li>
                    <a href="cart.php">Go To Cart</a>
                </li>
                <li>
                    <?php
                        if(isset($_SESSION['user'])){
                            echo"<a href='customer_logout.php'>Logout</a>";
                        }
                        else{
                            echo"<a href='customer_login.php'>Login</a>";
                        }
                    ?>

                </li>

            </ul><!-- menu Finish -->

        </div><!-- col-md-6 Finish -->

    </div><!-- container Finish -->

</div><!-- Top Finish -->


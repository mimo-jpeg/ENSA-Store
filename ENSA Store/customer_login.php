<?php

      ob_start();
      session_start();
      $pageTitle='Log in';
      include 'init.php';


      if(isset($_SESSION['user'])){

          header('location:index.php');

      }

      if ($_SERVER['REQUEST_METHOD'] == 'POST'){

          $formErrors=array();

              $username=$_POST['username'];

              $password=$_POST['password'];

              $hashPassword=sha1($password);

              //verifier est ce que cet utilisateur existe dans notre base de donnes !!!

              $stmt=$con->prepare('SELECT user_id , username , password
                                   FROM users
                                   WHERE username = ?
                                   AND password = ?
                                   LIMIT 1');

              $stmt->execute(array($username,$hashPassword));
              $row=$stmt->fetch(); //enregistrer le resultat sous la forme d'un tableau
              $count = $stmt->rowCount();

              //If Count > 0 ca veut dire que cet utilisateur avec cet password et de type administrateur existe

              if($count > 0){
                  $_SESSION['logged']=true; // Notre utilisateur existe dans notre session
                  $_SESSION['user']=$row['username'];
                  $_SESSION['userid']=$row['user_id']; //enregistrer le nom d'utilisateur dans notre session.
                  header('location:index.php'); // pour ser rediriger ves la page dashborde de l'administrateur.
                  exit();
              }else{
                  $formErrors[]='Email ou mot de passe incorrect';
              }
          }
  ?>
  <!-- Start Login form -->


 <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
       <div class="col-md-3"><!-- col-md-3 Begin -->
<?php

    include("templates/sidebar.php");

    ?>
    </div><!-- col-md-3 Finish -->
<div class="col-md-9"><!-- col-md-9 Begin -->
<div class="box"><!-----box begin-------->

                <center><!-- center Begin -->

                       <h2> Log In to your account </h2>

                   </center><!-- center Finish -->


    <form action=<?php echo $_SERVER['PHP_SELF'];?> method="post"><!-----form begin-------->

        <div class="form-group">
            <label> Username</label>
            <input type="text" name="username" placeholder="Enter Your Username" class="form-control" required>
        </div>

        <div class="form-group">
            <label> Password </label>
            <input type="password" name="password" placeholder="Enter Your Password" class="form-control" required>
        </div>
            <?php

            if(!empty($formErrors)){
                echo '<div class="error-show">';
                    echo '<div class="alert alert-danger mb-0" role="alert">';
                            foreach ($formErrors as $error) {
                                echo $error;
                            }
                    echo "</div>";
                echo "</div>";
            }

            ?>

        <div class="text-center">
            <button name="login" value="login" class="btn btn-primary"> <i class="fa fa-sign-in"></i>login
            </button>
        </div>


    </form><!----form finish-------->

    <div class="form-group text-center ">
			<hr class="categorie-divider">
			<p> Don't have account ?<a class="btn-link" href="customer_register.php"> Register</a></p>
	</div>





        </div><!-----box finish-------->

</div>
</div><!-- container Finish -->
</div><!-- #content Finish -->


<?php
    include("templates/footer.php");
    ob_end_flush();
    ?>

<?php
	ob_start();
	session_start();
	$pageTitle="Register";
	include 'init.php';
    $active='Account';
    if(isset($_SESSION['user'])){
		header('location:index.php');
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

			$formErrors=array();

			if(isset($_POST['username'])){

				$username=filter_var($_POST['username'],FILTER_SANITIZE_STRING); // Pour filtrer le username contre les scripts ... (garder seulement un string !!)

				if(strlen($username) > 20){
					$formErrors[]='Username must be less than <strong> 20 characters </strong>';
				}
				if(empty($username)){
					$formErrors[]="Username must not be empty";
				}
				if(strlen($username) < 3){
					$formErrors[]="Username must contain more than <strong> 3 characters </strong>";
				}

			}
			if(isset($_POST['Password']) ){

				if(empty($_POST['Password'])){
					$formErrors[]=" Password must not be empty </div>";
				}

				$password=sha1($_POST['Password']);

			}
			$email=$_POST['email'];
			if(isset($_POST['email'])){

				$email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

				if(filter_var($email,FILTER_VALIDATE_EMAIL) != true){

					$formErrors[]="Email non valide! </div>";

				}

				if(empty($email)){
					$formErrors[]=" Email must not be empty </div>";
				}

			}

			$age 		= $_POST['AGE'];
			$adresse	= $_POST['ADDRESS'];
			$ville 		= $_POST['VILLE'];

			if (empty($age)) {
					$formErrors[] = "Age cannot be <strong> empty </strong>";
			}

			if (empty($adresse)) {
				$formErrors[] = "The address cannot be <strong> empty </strong>";
			}

			if (empty($ville)) {
				$formErrors[] = 'The city cannot be <strong> empty </strong>';
			}

			// Ajouter les donnes dans la base de donnes d'un nouveau utilisateur !!

			if(empty($formErrors)){

				$formSuccess;

				//Verifier est ce que le nom utilisateur existe !!

				$check=checkItem('username','users',$username);
				if($check==1){

					$formErrors[]='Sorry this username exists !';

				}
				else{

					$stmt=$con->prepare("INSERT INTO `users`
							(username, password, email, AGE, ADRESSE, VILLE)
							VALUES (:user , :pass , :email , :zage, :zadresse, :zville) ");

					$stmt->execute(array(

						'user' => $username,
						'pass' => $password,
						'email' => $email,
						'zage' => $age,
						'zadresse' => $adresse,
						'zville' => $ville

					));

					$formSuccess[]="you have been successfully added";
				}
			}
		}
?>

<div id="content"><!-- #content Begin -->
   <div class="container"><!-- container Begin -->
       <div class="col-md-12"><!-- col-md-12 Begin -->

           <ul class="breadcrumb"><!-- breadcrumb Begin -->
               <li>
                   <a href="index.php">Home</a>
               </li>
               <li>
                   Register
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


                   <center><!-- center Begin -->

                       <h2> Register a new account </h2>

                   </center><!-- center Finish -->

                   <form action="customer_register.php" method="post" enctype="multipart/form-data"><!-- form Begin -->

                   <div class="form-group"><!-- form-group Begin -->

                           <label> Your Username</label>

                           <input type="text" class="form-control" placeholder="Enter Your Username" name="username" required>

                       </div><!-- form-group Finish -->

                       <div class="form-group"><!-- form-group Begin -->

                           <label>Your Email</label>

                           <input type="email" class="form-control" placeholder="Enter Your Email" name="email" required>

                       </div><!-- form-group Finish -->

                       <div class="form-group"><!-- form-group Begin -->

                           <label>Your Password</label>

                           <input type="password" class="form-control" placeholder="Enter Your Password" name="Password"  required>

                       </div><!-- form-group Finish -->

                       <div class="form-group"><!-- form-group Begin -->

                           <label> Your Age</label>

                           <input type="text" class="form-control" placeholder="Enter Your Age" name="AGE" required>

                       </div><!-- form-group Finish -->

                       <div class="form-group"><!-- form-group Begin -->

                           <label> Your Address</label>

                           <input type="text" class="form-control" placeholder="Enter Your Address" name="ADDRESS" required>

                       </div><!-- form-group Finish -->

                       <div class="form-group"><!-- form-group Begin -->

                           <label> Your City</label>

                           <input type="text" class="form-control" placeholder="Enter Your City" name="VILLE" required>

                       </div><!-- form-group Finish -->

                       <div class="text-center"><!-- text-center Begin -->

                           <button type="submit" name="Register" class="btn btn-primary">

                           <i class="fa fa-user-md"></i>Register

                           </button>

                       </div><!-- text-center Finish -->


                   </form><!-- form Finish -->
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
			<?php

				if(!empty($formSuccess)){
					echo '<div class="error-show">';
						echo '<div class="alert alert-success mb-0" role="alert">';
								foreach ($formSuccess as $success) {
									echo $success;
								}
						echo "</div>";
					echo "</div>";
				}

			?>
			<div class="form-group text-center ">
				<hr class="categorie-divider">
				<p>Already have account ?<a class="btn-link" href="customer_login.php"> Log In</a></p>
			</div>


           </div><!-- box Finish -->

       </div><!-- col-md-9 Finish -->

   </div><!-- container Finish -->
</div><!-- #content Finish -->

<?php

include("templates/footer.php");
ob_end_flush();

?>


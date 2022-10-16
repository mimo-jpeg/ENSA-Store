<?php
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

        $email=$_POST['email'];
        if(isset($_POST['email'])){

            $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);

            if(filter_var($email,FILTER_VALIDATE_EMAIL) != true){

                $formErrors[]="Non valid Email! </div>";

            }

            if(empty($email)){
                $formErrors[]=" Email must not be Empty</div>";
            }

        }

        $age 		= $_POST['AGE'];
        $adresse	= $_POST['ADDRESS'];
        $ville 		= $_POST['VILLE'];

        if (empty($age)) {
                $formErrors[] = "Age must not be <strong> Empty </strong>";
        }

        if (empty($adresse)) {
            $formErrors[] = "Address must not be <strong> Empty </strong>";
        }

        if (empty($ville)) {
            $formErrors[] = 'City must not be <strong> Empty </strong>';
        }

        // Ajouter les donnes dans la base de donnes d'un nouveau utilisateur !!

        if(empty($formErrors)){

            $formSuccess;

            //Verifier est ce que le nom utilisateur existe !!
            $check=checkItem('username','users',$username);
            if($check==1 && $username!=$_SESSION['user']){

                    $formErrors[]='Sorry this username exists !';

                }

            else{
                $id=$_SESSION['userid'];
                $stmt=$con->prepare("UPDATE users SET username = ?, email = ?, AGE = ?, ADRESSE = ?, VILLE = ? WHERE user_id = ?");

                $stmt->execute(array($username,$email,$age,$adresse,$ville,$id));

                $formSuccess[]="You have been UPDATED your account successfully";
            }
        }
    }


?>

<h1 align="center">Edit your account</h1>
<form action="<?php echo $_SERVER['PHP_SELF']."?edit_account"; ?>" method="POST" enctype="multipart/form-data">
<div class="form-group"><!-- form-group Begin -->
                        <?php
                            $id=$_SESSION['userid'];
                            $stmt=$con->prepare('SELECT * FROM users WHERE user_id = ?');
                            $stmt->execute(array($id));
                            $row=$stmt->fetch();

                            $c_username=$row['username'];
                            $c_email=$row['email'];
                            $c_age=$row['AGE'];
                            $c_address=$row['ADRESSE'];
                            $c_ville=$row['VILLE'];

                        ?>
                               <label> Customer Name: </label>

                               <input type="text" class="form-control" placeholder="Enter The New Username" name="username" value="<?php echo $c_username?>">

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Customer Email: </label>

                               <input type="email" class="form-control" placeholder="Enter The New Email" name="email" value="<?php echo $c_email?>">

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label> Customer Age: </label>

                               <input type="text" class="form-control" placeholder="Enter The New Age" name="AGE" value="<?php echo $c_age?>">

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label> Customer Address: </label>

                               <input type="text" class="form-control" placeholder="Enter The New Address" name="ADDRESS" value="<?php echo $c_address?>">

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label> Customer City: </label>

                               <input type="text" class="form-control" placeholder="Enter The New City" name="VILLE" value="<?php echo $c_ville?>">

                           </div><!-- form-group Finish -->
                           <?php

                                if(!empty($formErrors)){
                                    echo '<div class="error-show">';
                                    foreach ($formErrors as $error) {
                                        echo '<div class="alert alert-danger mb-0" role="alert">';

                                                    echo $error;

                                        echo "</div>";
                                    }
                                    echo "</div>";
                            }

                            ?>
                            <?php

                                if(!empty($formSuccess)){
                                    echo '<div class="error-show">';
                                    foreach ($formSuccess as $success) {
                                        echo '<div class="alert alert-success mb-0" role="alert">';

                                                    echo $success;

                                        echo "</div>";
                                    }
                                    echo "</div>";
                                }

                            ?>
                           <div class="text-center"><!-- text-center Begin -->

                               <button  name="Update" class="btn btn-primary">

                               <i class="fa fa-user-md"></i>Update

                               </button>
                            </div><!-- text-center Finish -->
</form>
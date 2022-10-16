<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $formErrors=array();
        $id=$_SESSION['userid'];

        $old_pass = sha1($_POST['old_pass']);
        $new_pass	= sha1($_POST['new_pass']);
        $new_pass_again = sha1($_POST['new_pass_again']);

        if (empty($old_pass)) {
                $formErrors[] = "Old password must not be <strong> Empty </strong>";
        }

        if (empty($new_pass)) {
            $formErrors[] = "New password must not be <strong> Empty </strong>";
        }

        if (empty($new_pass_again)) {
            $formErrors[] = 'You must <strong>Confirm</strong> the new password';
        }
        $stmt=$con->prepare('SELECT * FROM users WHERE user_id = ?');
        $stmt->execute(array($id));
        $row=$stmt->fetch();

        if($old_pass!=$row['password']){
            $formErrors[]=" You must enter your correct old password </div>";
        }
        if($new_pass!=$new_pass_again){
            $formErrors[]=" Confirm the new password correctly!</div>";
        }

        if(empty($formErrors)){

            $formSuccess;

            //Verifier est ce que le nom utilisateur existe !!

                $stmt=$con->prepare("UPDATE users SET password = ? WHERE user_id = ?");

                $stmt->execute(array($new_pass,$id));

                $formSuccess[]="You have been CHANGED your password successfully";

        }
    }
?>


<h1 align="center">Change your password</h1>
<form action="<?php echo $_SERVER['PHP_SELF']."?change_pass"; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group"><!-- form-group Begin -->

                            <label> Your old password: </label>

                               <input type="password" class="form-control" placeholder="Your old password" name="old_pass" >

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label> Your new password: </label>

                               <input type="password" class="form-control" placeholder="Your new password" name="new_pass" >

                           </div><!-- form-group Finish -->
                           <div class="form-group"><!-- form-group Begin -->

                               <label> Confirm your new password: </label>

                               <input type="password" class="form-control" placeholder="Confirm Your new password" name="new_pass_again" >

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

                               <button type="submit" name="submit" class="btn btn-primary">

                               <i class="fa fa-user-md"></i>Update Now

                               </button>
                            </div><!-- text-center Finish -->
</form>

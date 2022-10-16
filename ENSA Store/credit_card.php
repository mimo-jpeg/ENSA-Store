<?php
	ob_start();
	session_start();
	$pageTitle="Payment";
	include 'init.php';

	if(!isset($_SESSION['user'])){

		echo '<div class="alert text-center alert-warning mt-4">'. 'You should login to your account to procced the payment!' .'</div>';
		header('refresh:3;url=customer_login.php');

	}

	$formErrors = array();
	$formValidation=array();

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		if(isset($_POST['username']) && is_string($_POST['username'])){

			if(isset($_POST['cardNumber']) && is_numeric($_POST['cardNumber'])){

				if(isset($_POST['cvv']) && is_numeric($_POST['cvv'])){

					$userid 	 = $_SESSION['userid'];
					$username	 = $_POST['username'];
					$cardNumber	 = $_POST['cardNumber'];
					$cvv 		 = $_POST['cvv'];

					$validation=(luhn_validate($cardNumber));

					if($validation == true){

						$user=getItem('user_id','users',$userid);

						$userMail=$user['email'];

						$fullName=$user['fullName'];

						$msg = 'Hi'.$fullName.' /n /n /n '.'Your payment is done'.'/n/n/n '.'<b>'.'CONGRATULATIONS !'.'</b>';

						$montantTotal = $_SESSION['total'];

						//mail($userMail,'Payment Done',$msg);

						//$formValidation[]='Your Payment is done , Congratulations '.$fullName.' Please check your mail !';

						$to      = $userMail;
					    $subject = 'Payment - ENSA Store';
					    $message = "Hi,
                        We inform you that your transaction has been confirmed. Here is the detail of the operation:
                        
                        Web site: ecommerceensa
                        Client name : ".$fullName.'
                        Client Email:'.$userMail.'
                        Transaction amount : '.$montantTotal.' MAD
                        For more information, please contact your dealer.
                        thank you.';
					    $headers = 'From:'.' storeensa@gmail.com';

					    if(mail($to, $subject, $message, $headers)){

					    	$formValidation[] = 'Payment Done! Please check your mail';
					    	emptyCart($userid);
					    	header("refresh:8;url=index.php");

					    }else{

					    	$formErrors[]='Error during payment ! try again';

					    }

					}
					else{

						$formErrors[]='Your credit card is not valid';

					}

				}
				else{

					$formErrors[]='your cvv is not valid, please check it !';

				}

			}
			else{

				$formErrors[]='your card number is not valid, please check it !';

			}

		}
		else{

			$formErrors[]='your username is not valid, please check it !';

		}
	}
?>

       <div class="container " ><!-- container Begin -->
            <div class="col-md-3 ">
            </div>
           <div class="col-md-6 col-md-9"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                       
                       <center><!-- center Begin -->
                           
                           <h2> Payment Gateway </h2>
                           
                           <p class="text-muted"><!-- text-muted Begin -->
                               
                               Please enter your <strong>Credit Card</strong>
                                credentiels 
                           </p><!-- text-muted Finish -->
                           
                       </center><!-- center Finish -->
                       <br>
            <form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<div >
                    
					<label >Card Holder :</label>
			        <input type="text" name="username" placeholder="Enter your name on the cart" required class="form-control">
			   	</div>
                   <br>
			   	<div >
					<label >Card Number :</label>
			        	<input type="text" name="cardNumber" placeholder="Enter your card number" class="form-control" required>
			   	</div>
                   <br>
			   	<div class="input-group ">
                       <div class="row">
			   		    <div class="col-sm-8">

			   				<label >Expiration Date :</label>								
					        <input type="date" id="start"
							       min="2020-01-01" max="2028-12-31" class="form-control text-center " name="card-number" placeholder="00/00" required="required">        
                        </div>
                        <div class="col-sm-4">
			   				<label >CVC :</label>
					        <input type="text" class="form-control text-center" name="cvv" placeholder="CVC" required="required">
                        </div>
                        </div>
			   	</div>
                   <br><br>
			  	<button type="submit" class="btn btn-primary btn-block">Confirm</button>
			</form>
			<?php

				if(!empty($formErrors)){
					echo '<div class="error-show pb-3 px-3">';
						echo '<div class="alert alert-danger mb-0" role="alert">';
								foreach ($formErrors as $error) {
									echo $error;
								}
						echo "</div>";
					echo "</div>";
				}

			?>
			<?php

				if(!empty($formValidation)){
					echo '<div class="error-show pb-3 px-3">';
						echo '<div class="alert alert-success mb-0" role="alert">';
								foreach ($formValidation as $validation) {
									echo $validation;
								}
						echo "</div>";
					echo "</div>";
				}

			?>
        </div><!-- box Finish -->
               
    </div><!-- col-md-9 Finish -->
</div>
	<!-- End Payment form -->

<?php

	include 'templates/footer.php';
	ob_end_flush();

?>

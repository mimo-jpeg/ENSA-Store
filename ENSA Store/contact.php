<?php
	ob_start();
	session_start();
	$pageTitle="Contact";
	include 'init.php';

 
    $formSuccess;
    if(isset($_POST['submit'])){


        ///admin receivs messageg with this///
        $sender_name = $_POST['name'];
        $sender_email = $_POST['email'];
        $sender_subject = $_POST['subject'];
        $sender_message = $_POST['message'];

        $receiver_email = "storeensa@gmail.com ";

        mail($receiver_email,$sender_name,$sender_subject,$sender_message,$sender_email);
        /// Auto reply to sender ///
        $email = $_POST['email'];
        $subject = "Welcome to our School project";
        $msg = "thanks for sending us your message. We will reply to your message as soon as possible";
        $from = "storeensa@gmail.com";
        mail($email,$subject,$msg,$from);
        $formSuccess[]="Your messgae has been sent successfully";
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
                       Contact Us
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

                           <h2> Feel free to Contact Us</h2>

                           <p class="text-muted"><!-- text-muted Begin -->

                               If you have any questions, feel free to contact us. Our Customer Service work <strong>24/7</strong>

                           </p><!-- text-muted Finish -->

                       </center><!-- center Finish -->

                       <form action="contact.php" method="post"><!-- form Begin -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Name</label>

                               <input type="text" class="form-control" placeholder="Enter Your Username" name="name" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Email</label>

                               <input type="text" class="form-control" placeholder="Enter Your Email" name="email" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Subject</label>

                               <input type="text" class="form-control" placeholder="Enter Your Subject" name="subject" required>

                           </div><!-- form-group Finish -->

                           <div class="form-group"><!-- form-group Begin -->

                               <label>Message</label>

                               <textarea name="message" placeholder="Please Feel Free to contact us and leave your message here!" class="form-control"></textarea>

                           </div><!-- form-group Finish -->
                        <?php
                
                            if(!empty($formSuccess)){
                                echo '<div class="error-show">';
                                    echo '<div class="alert alert-success mb-0" role="alert">';
                                                echo $formSuccess[0];
                                    echo "</div>";
                                echo "</div>";
                            }
            
                        ?>

                           <div class="text-center"><!-- text-center Begin -->

                               <button type="submit" name="submit" class="btn btn-primary">

                               <i class="fa fa-user-md"></i>Send Message

                               </button>

                           </div><!-- text-center Finish -->

                       </form><!-- form Finish -->




               </div><!-- box Finish -->

           </div><!-- col-md-9 Finish -->

       </div><!-- container Finish -->
   </div><!-- #content Finish -->

   <?php

    include("templates/footer.php");
    ob_end_flush();

    ?>

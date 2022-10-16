
<?php

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['YES'])){
            $id=$_SESSION['userid'];
            
            $stmt = $con->prepare("DELETE FROM users WHERE user_id = ?");
            $stmt->execute(array($id));
            echo '<div class="alert alert-danger mb-0" role="alert">Your have successfully DELETED your account </div>';
            session_destroy();
            header('refresh:3; url=index.php');
    
        }


    }
?>
<center>

    <h1> Do you really want to delete your account ?</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']."?delete_account"; ?>" method="POST">
    
        <input type="submit" name="YES" value="YES, I WANT TO DELETE IT" class="btn btn-danger">
        
        <input type="submit" name="NO" value="NO, I DON'T WANT TO DELETE IT" class="btn btn-primary">
    
    
    </form>


</center>
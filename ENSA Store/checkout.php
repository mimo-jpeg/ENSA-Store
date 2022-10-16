<?php

	ob_start();
	session_start();
	$pageTitle="Checkout";
	include 'init.php';
	
	if(isset($_SESSION['user'])){

		if(isset($_POST['quantite']) && isset($_POST['product_id']) && is_numeric($_POST['product_id'])  ){

			$product_id=$_POST['product_id'];

			$quantite=$_POST['quantite'];

			$stmat=$con->prepare('SELECT * FROM products WHERE product_id = ?');

			$stmat->execute(array($product_id));

			$product=$stmat->fetch();


			if($_SESSION['products_'.$product_id]['id'] == $_POST['product_id']){


				$message ='Vous avez déjà ce produit dans votre panier';
				header('location:cart.php?message='.$message);

			}
			else{

				

					$_SESSION['id_products'][]=$product_id;

					$_SESSION['products_'.$product_id]=array(
					'id' 		=> $product['product_id'],
					'product' 	=> $product['product_title'],
					'price' 	=> $product['product_price'],
					'quantite' 	=> $quantite,
					'image'		=> $product['product_image'],
					'sub_total'		=> $product['product_price'] * $quantite,
					);

					$_SESSION['total'] += $_SESSION['products_'.$product_id]['sub_total'];

					$_SESSION['count'] += 1;

					header("location:cart.php");

				
			}
		}
	}else{

		echo '<div class="alert text-center alert-warning mt-5">'."You should login to your account in order to add products to CART".'</div>';
		header('refresh:3;url=customer_login.php');

	}
?>

<?php

	include 'templates/footer.php';
	ob_end_flush();

?>s

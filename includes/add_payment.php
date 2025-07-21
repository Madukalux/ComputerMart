<?php
	if(isset($_POST['submit'])){
		
		include_once '../includes/config.php';
		
		$fname = $_POST['name'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$cardname = $_POST['cardname'];
		$cardnumber = $_POST['cardnumber'];
		$expyear = $_POST['expyear'];
		$cvv = $_POST['cvv'];
		
		$hashCartNumber = password_hash($cardnumber, PASSWORD_DEFAULT);

			$sql = "INSERT INTO payment (name, email, address, card_name, card_number, exp_year, cvv)
			VALUES('$fname', '$email', '$address', '$cardname', '$hashCartNumber', '$expyear', '$cvv')";
			
				if ( $conn->query($sql) === TRUE ) {
					
					$message = "Payment Succesfull!";
					echo "<script type='text/javascript'>alert('$message');
						window.location.href='../index.php';</script>";
				}else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
	

		
		
	}
?>
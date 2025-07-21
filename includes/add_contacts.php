<?php
	if(isset($_POST['submit'])){
		
		include_once 'config.php';
		
		$fname = $_POST['fname'];
		$email = $_POST['email'];
		$contact_no = $_POST['contno'];
		$description = $_POST['msj'];
		
		$sql = "INSERT INTO contact (name, email, contact_no, message)
							VALUES('$fname', '$email', '$contact_no', '$description')";
					
					if ( $conn->query($sql) === TRUE ) {
						
						$message = "Successfully send the message!";
						echo "<script type='text/javascript'>alert('$message');
							  window.location.href='../contact.php';</script>";
					}else {
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
					
	}
?>
<?php
	if(isset($_POST['submit'])){
		
		include_once 'config.php';
					
					$fname = $_POST['fname'];
					$lname = $_POST['lname'];
					$address = $_POST['address'];
					$email = $_POST['email'];
                    $contact = $_POST['cno'];
                    $duty = $_POST['duty'];
					
					$sql = "INSERT INTO employee (fname, lname, address, email, contact_no, duty)
							VALUES('$fname', '$lname', '$address', '$email', '$contact', '$duty')";
					
					if ( $conn->query($sql) === TRUE ) {
						
						$message = "Successfully added to the database!";
						echo "<script type='text/javascript'>alert('$message');
							  window.location.href='../add.employee.php';</script>";
					}else {
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
			
				}			

?>
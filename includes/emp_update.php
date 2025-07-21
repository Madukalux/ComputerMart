<?php
		include_once 'config.php';
?>

		<!DOCTYPE html>
		<html>
		
		<head>
			<title> Update</title>
			<link rel="stylesheet" type="text/css" href="../stylesheets/login.css">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link rel="stylesheet" type="text/css" href="../stylesheets/cart-very-special.css">
			<style>
			#main-sec{
				background-image: url("images/login2.png");
				height: 100%;
				background-position:center;
				background-repeat: no-repeat;
				background-size: cover;
			}
			</style>
		</head>
		
		<body> 
		
			
		
			<!--HEADER END-->
			
			<section id="main-sec">
			<div class="o-container">

<?php

	if (isset($_GET) & !empty($_GET)) {
		$id = $_GET['id'];
	}else{
			header('location: ../admin.employee.php');
	}

	 if(isset($_POST) & !empty($_POST)){
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$fname = mysqli_real_escape_string($conn, $_POST['fname']);
		$lname = mysqli_real_escape_string($conn, $_POST['lname']);
		$address = mysqli_real_escape_string($conn, $_POST['address']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
        $duty = mysqli_real_escape_string($conn, $_POST['duty']);
		$sql = "UPDATE employee SET fname='$fname', lname = '$lname', address = '$address', email = '$email' , contact_no = '$contact_no', duty = '$duty' WHERE empid=$id";
		$res = mysqli_query($conn, $sql);
		if($res){
			$smsg =   "Successfully Updated!";
			echo "<script type='text/javascript'>alert('$smsg');
				   window.location.href='../admin.employee.php';</script>";
		}else{
			$fmsg =   "Error!!!!";
			echo "<script type='text/javascript'>alert('$fmsg');
				   window.location.href='../admin.employee.php';</script>";
		}
	}
?>

	
<form method="post">
				<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>

			<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
				
			  <div class="form-group">
			    <label for="Productname">First Name</label>
                <?php 	
                
					$sql = "SELECT * FROM employee WHERE empid = $id";
					$res = mysqli_query($conn, $sql); 
					$r = mysqli_fetch_assoc($res)
				?>

				<input type="hidden"name="id" value="<?php echo $_GET['id']; ?>">
			    <input type="text" class="form-control" name="fname" id="fname" placeholder="first name" value="<?php echo $r['fname']; ?>">

				<label for="Productname"> Last Name</label>
				<input type="text" class="form-control" name="lname" id="lname" placeholder="lname" value="<?php echo $r['lname']; ?>">

                <label for="Productname"> Address</label>
				<input type="text" class="form-control" name="address" id="address" placeholder="address" value="<?php echo $r['address']; ?>">

				<label for="Productname"> Contact No</label>
				<input type="text" class="form-control" name="contact_no" id="Contact No" placeholder="Contact No" value="<?php echo $r['contact_no']; ?>">

				<label for="Productname"> Email</label>
				<input type="text" class="form-control" name="email" id="email" placeholder="email" value="<?php echo $r['email']; ?>">

                <label for="Productname"> Duty</label>
				<input type="text" class="form-control" name="duty" id="duty" placeholder="duty" value="<?php echo $r['duty']; ?>">
			  </div>
			  
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
			</div>

</section>
<!-- THE MODAL -->
	
<div id="myModal" class="modal">
	<div class="modal-content">
    <span class="close">&times;</span>
	<div class="container"><div class="row"><div class="col" id="cart"></div></div></div>
	</div>
	</div>
	
	<!--FOOTER START-->
	
	
	
</body>
<script src="../myModal.js"></script>

</html>

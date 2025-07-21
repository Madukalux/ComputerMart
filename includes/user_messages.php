<?php

	include_once 'config.php';

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheets/admin_product.css">
</head>

<body>
<form >
<table id="customers">
  <tr>
    <th>Message ID</th>
    <th>Customer Name</th>
	<th>Email</th>
    <th>Contact No</th>
	<th>Message</th>
    <th>Update</th>
    <th>Delete</th>
  </tr>
    <?php
		$sql = "SELECT * FROM contact;";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		
		if($resultCheck > 0) {
			while($row = mysqli_fetch_assoc($result)){
    ?>
   <tr>
    <td><?php echo $row['msg_id'];?> </td>
    
    <td><?php echo $row['name'];?></td> 
    <td><?php echo $row['email'];?></td>
	<td><?php echo $row['contact_no'];?></td>
	<td><?php echo $row['message'];?></td>
    <td><a  class="add x" href="includes/msg_update.php?id=<?php echo $row['msg_id']; ?>">Update</a></td>
    <td><a  class="add x" href="includes/delete_msg.php?id=<?php echo $row['msg_id']; ?>">Delete</a></td>
    
   
  </tr>
  </form>
  <?php } }
  if(isset($_POST['delete'])) {
		
    echo $pid = $_POST['msg_id'];
    
    $sql = "DELETE FROM contact WHERE msg_id='$pid'";
                        
    if ( $conn->query($sql) === TRUE ) {
                        
        $message = "Successfully deleted!";
        echo "<script type='text/javascript'>alert('$message');
               window.location.href='../user.messages.php';</script>";
    }else {
                            
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    
}

  ?>
</table>

</body>
</html>
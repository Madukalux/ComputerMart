<?php

	include_once 'config.php';

?>
<?php
if (isset($_GET)) {
    $id = $_GET['id'];
    $sql ="DELETE FROM customers WHERE customer_id = $id";
    if(mysqli_query($conn, $sql)) {
        header('location: ../admin.customer.php');
    }
}else{
        header('location:../admin.customer.php');
}
	
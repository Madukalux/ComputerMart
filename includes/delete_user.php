<?php

	include_once 'config.php';

?>
<?php
if (isset($_GET)) {
    $id = $_GET['id'];
    $sql ="DELETE FROM customers WHERE customer_id = $id";
    if(mysqli_query($conn, $sql)) {
        header('location: ../index.php?id="test"');
    }
}else{
        header('location:../user.general.php?id="11"');
}
	
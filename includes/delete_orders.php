<?php

	include_once 'config.php';

?>
<?php
if (isset($_GET)) {
    $id = $_GET['id'];
    $sql ="DELETE FROM payment WHERE pid = $id";
    if(mysqli_query($conn, $sql)) {
        header('location: ../admin.corders.php');
    }
}else{
        header('location:../admin.corders.php');
}
	
<?php

	include_once 'config.php';

?>
<?php
if (isset($_GET)) {
    $id = $_GET['id'];
    $sql ="DELETE FROM employee WHERE empid = $id";
    if(mysqli_query($conn, $sql)) {
        header('location:../admin.employee.php');
    }
}else{
        header('location:../admin.employee.php');
}
	
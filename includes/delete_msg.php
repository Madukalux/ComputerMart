<?php

	include_once 'config.php';

?>
<?php
if (isset($_GET)) {
    $id = $_GET['id'];
    $sql ="DELETE FROM contact WHERE msg_id = $id";
    if(mysqli_query($conn, $sql)) {
        header('location: ../user.messages.php?id="test"');
    }
}else{
        header('location:../user.messages.php?id="11"');
}
	
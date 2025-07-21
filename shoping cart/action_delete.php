<?php

//fetch_item.php

include('database_connection.php');
$product_id = $_REQUEST["product_id"];
$query = "DELETE FROM cart WHERE id='$product_id'";

$statement = $connect->prepare($query);

if($statement->execute())
{
	$result = $statement->fetchAll();
	$output = '';
	
	foreach($result as $row)
	{
		header("location:index.php");
	}
	echo $output;
}


?>
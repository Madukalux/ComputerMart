<?php

//fetch_item.php

include('database_connection.php');
$product_id = $_REQUEST["product_id"];
$product_quantity = $_REQUEST["product_quantity"];
$query = "UPDATE cart SET product_quantity ='$product_quantity' WHERE id='$product_id'";

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
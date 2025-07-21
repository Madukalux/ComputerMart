<?php

error_reporting(E_ERROR | E_PARSE);
include_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheets/admin_product.css">
</head>
<<body>
<section id="main-sec">
    <div class="left-nav">
        <ul>
            <li><a href="admin.customer.php">Customers</a></li>
            <li><a href="admin.employee.php">Employees</a></li>
            <li><a href="admin.product.php">Products</a></li>
            <li><a class="active" href="admin.corders.php">Orders</a></li>
            <li><a href="additems.php">Add Products</a></li>
            <li><a href="update.delete.php">Update/Delete Products</a></li>
            <li><a  href="add.employee.php">Add Employees</a></li>
            <li><a href="admin.messages.php">Messages</a></li>
            <li><a href="user-general.php">General</a></li>
            
        </ul>
    </div>

    <div class="main-content">
        <table id="customers">
            <tr>
                <th>Order ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Card Name</th>
                <th>Card Number</th>
                <th>Exp Year</th>
                <th>CVV</th>
                <th>Action</th>
            </tr>
            <?php
            $sql = "SELECT * FROM payment;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['pid']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['card_name']; ?></td>
                <td><?php echo $row['card_number']; ?></td>
                <td><?php echo $row['exp_year']; ?></td>
                <td><?php echo $row['cvv']; ?></td>
                <td><a class="add x" href="includes/delete_orders.php?id=<?php echo $row['pid']; ?>">Delete</a></td>
            </tr>
            <?php } } ?>
        </table>
    </div>
</section>
</body>
</html>

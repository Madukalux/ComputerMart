<?php
	include_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheets/admin_product.css">
    <style>
        .download-pdf-button {
            background-color: #4CAF50; /* Green background */
            border: none; /* Remove border */
            color: white; /* White text */
            padding: 10px 20px; /* Padding inside button */
            text-align: center; /* Center-align text */
            text-decoration: none; /* Remove underline */
            display: inline-block; /* Make it inline block */
            font-size: 16px; /* Font size */
            margin-bottom: 20px; /* Margin bottom */
            cursor: pointer; /* Cursor style */
            border-radius: 4px; /* Rounded corners */
        }
        .download-pdf-button:hover {
            background-color: #45a049; /* Darker green on hover */
        }
    </style>
</head>

<body>
    <!-- Download PDF Button -->
    <form method="post" action="generate_employee_pdf.php">
        <button type="submit" name="download_pdf" class="download-pdf-button">Download Employees as PDF</button>
    </form>

    <table id="customers">
        <tr>
            <th>Employee ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Contact No</th>
            <th>Duty</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
            $sql = "SELECT * FROM employee;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            
            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['empid']; ?></td>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['contact_no']; ?></td>
            <td><?php echo $row['duty']; ?></td>
            <td><a class="add x" href="includes/emp_update.php?id=<?php echo $row['empid']; ?>">Update</a></td>
            <td><a class="add x" href="includes/delete_employee.php?id=<?php echo $row['empid']; ?>">Delete</a></td>
        </tr>
        <?php
                }
            }
            
            if (isset($_POST['delete'])) {
                $empid = $_POST['empid'];
                
                $sql = "DELETE FROM employee WHERE empid='$empid'";
                
                if ($conn->query($sql) === TRUE) {
                    $message = "Successfully deleted!";
                    echo "<script type='text/javascript'>alert('$message');
                          window.location.href='admin.customer.php';</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        ?>
    </table>
</body>
</html>

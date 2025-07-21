<?php
include_once 'config.php';
require_once(__DIR__ . '/../tcpdf/tcpdf.php');

if (isset($_POST['download_pdf'])) {
    ob_clean();

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator('Your Company');
    $pdf->SetAuthor('Admin');
    $pdf->SetTitle('Customers Report');
    $pdf->SetSubject('Customers Report');
    $pdf->SetKeywords('Customers, Report, PDF');

    $pdf->AddPage();

    $content = '<h1 style="text-align: center; margin-bottom: 20px; color: #336699;">Customers Report</h1>';
    $content .= '<table border="1" style="width: 100%; border-collapse: collapse;">';
    $content .= '<tr style="background-color: #f2f2f2;"><th style="padding: 10px; background-color: #cccccc;">Customer ID</th><th style="padding: 10px; background-color: #cccccc;">Email</th><th style="padding: 10px; background-color: #cccccc;">User Name</th><th style="padding: 10px; background-color: #cccccc;">First Name</th><th style="padding: 10px; background-color: #cccccc;">Last Name</th><th style="padding: 10px; background-color: #cccccc;">Address</th><th style="padding: 10px; background-color: #cccccc;">Contact No</th></tr>';

    $sql = "SELECT * FROM customers WHERE actype ='Customer'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $content .= '<tr>';
        $content .= '<td style="padding: 10px; background-color: #ffffff;">' . $row['customer_id'] . '</td>';
        $content .= '<td style="padding: 10px; background-color: #ffffff;">' . $row['email'] . '</td>';
        $content .= '<td style="padding: 10px; background-color: #ffffff;">' . $row['user_name'] . '</td>';
        $content .= '<td style="padding: 10px; background-color: #ffffff;">' . $row['first_name'] . '</td>';
        $content .= '<td style="padding: 10px; background-color: #ffffff;">' . $row['last_name'] . '</td>';
        $content .= '<td style="padding: 10px; background-color: #ffffff;">' . $row['address'] . '</td>';
        $content .= '<td style="padding: 10px; background-color: #ffffff;">' . $row['contact_no'] . '</td>';
        $content .= '</tr>';
    }
    $content .= '</table>';

    $pdf->writeHTML($content, true, false, true, false, '');
    $pdf->Output('customers_report.pdf', 'D');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylesheets/admin_product.css">
</head>

<body>
<table id="customers">
  <tr>
    <th>Customer ID</th>
    <th>Email</th>
	<th>User Name</th>
    <th>First Name</th>
	<th>Last Name</th>
	<th>Address</th>
	<th>Contact No</th>
	<th>Delete</th>
  </tr>
    <?php
		$sql = "SELECT * FROM customers WHERE actype ='Customer';";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		
		if($resultCheck > 0) {
			while($row = mysqli_fetch_assoc($result)){
    ?>
   <tr>
    <td><?php echo $row['customer_id'];?></td> 
    <td><?php echo $row['email'];?></td>
    <td><?php echo $row['user_name'];?></td>
	<td><?php echo $row['first_name'];?></td>
	<td><?php echo $row['last_name'];?></td>
	<td><?php echo $row['address'];?></td>
	<td><?php echo $row['contact_no'];?></td>
	<td><a  class="add x" href="includes/delete_customer.php?id=<?php echo $row['customer_id']; ?>">Delete</a></td>
  </tr>
  
  <?php } }
  
  if(isset($_POST['delete'])) {
		
	$pid = $_POST['customer_id'];
	
	$sql = "DELETE FROM customers WHERE customer_id='$pid'";
						
	if ( $conn->query($sql) === TRUE ) {
						
		$message = "Successfully deleted!";
		echo "<script type='text/javascript'>alert('$message');
			   window.location.href='../admin.customer.php';</script>";
	}else {
							
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	
}
 
 ?>
</table>

</body>
</html>
<?php
require('Functions/CheckLogin.php');
require_once('Functions/mysql.class.php');
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Myorder</title>
</head>

<body>
<?php
global $db;
	$sql = "SELECT * FROM Customer where User_Name ='".$_SESSION['current_user']."'";
	$result = $db->query($sql);
	$output[] = '<h2 align="center">Customer Details</h2>';
	$output[] = '<table width="100%" border="2">';
	$output[] = '<tr><td align="center"><h2>CustomerID</h2></td><td align="center"><h2>UserName</h2></td><td align="center"><h2>Phone</h2></td><td align="center"><h2>Email</h2></td><td align="center"><h2>password</h2></td><td align="center"><h2>Address</h2></td><td align="center"><h2>FirstName</h2></td><td align="center"><h2>LastName</h2></td><td align="center"><h2>Status</h2></td></tr>';
	while ($row = $result->fetch()) {
		$output[] = '<tr><td align="center">'.$row['CustomerID'].'</td><td align="center">'.$row['User_Name'].'</td><td align="center">'.$row['Phone_Number'].'</td><td align="center">'.$row['Email'].'</td><td align="center">'.$row['Password'].'</td><td align="center">'.$row['Address'].'</td><td align="center">'.$row['First_Name'].'</td><td align="center">'.$row['Last_Name'].'</td><td align="center">'.$row['Status'].'</td></tr>';
	}
	$output[] = '</table><br>';
	$query = "SELECT CustomerID FROM Customer where User_Name ='".$_SESSION['current_user']."'";
	$result = $db->query($query);
	$array = $result->fetch();
	$custid = $array['CustomerID'];
	$sql = "SELECT * FROM Orders where CustomerID ='".$custid."'";
	$result = $db->query($sql);
	$output[] = '<h2 align="center">Order Details</h2>';
	$output[] = '<table width="100%" border="2">';
	$output[] = '<tr><td align="center"><h2>OrderID</h2></td><td align="center"><h2>Status</h2></td><td align="center"><h2>OrderDate</h2></td><td align="center"><h2>CustomerID</h2></td><td align="center"><h2>Subtotal</h2></td><td align="center"><h2>GST</h2></td><td align="center"><h2>GrandTotal</h2></td></tr>';
	while ($row = $result->fetch()) {
		$output[] = '<tr><td align="center">'.$row['OrderID'].'</td><td align="center">'.$row['Status'].'</td><td align="center">'.$row['OrderDate'].'</td><td align="center">'.$row['CustomerID'].'</td><td align="center">'.$row['Subtotal'].'</td><td align="center">'.$row['GST'].'</td><td align="center">'.$row['GrandTotal'].'</td></tr>';
	}
	$output[] = '</table><br>';
	echo join('',$output); 
?>
</body>
</html>

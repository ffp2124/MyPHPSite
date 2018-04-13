<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
// Include MySQL class
require_once('mysql.class.php');
//global $subtotal;
$subtotal = 0;
//global $gst;
$gst = 0;
//global $grandtotal;
$grandtotal = 0;

function writeShoppingCart() {
	if (isset($_SESSION['cart']))
	{
	$cart = $_SESSION['cart'];
	}
	
	if (!isset($cart) || $cart=='') {
		return '<p align="center">You have no items in your shopping cart</p>';
	} else {
		// Parse the cart session variable
		$items = explode(',',$cart);
		$s = (count($items) > 1) ? 's':'';
		return '<p align="center">You have <a href="ShoppingCart.php?action=display">'.count($items).' item'.$s.' in your shopping cart</a></p>';
	}
}

function showCart() {
	global $db;
	global $subtotal;
	global $gst;
	global $grandtotal;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = '<form action="ShoppingCart.php?action=update" method="post" id="cart">';
		$output[] = '<table width="100%" align="center">';
		foreach ($contents as $id=>$qty) {
			$sql = 'SELECT * FROM Shoe WHERE id = '.$id;
			$result = $db->query($sql);
			$row = $result->fetch();
			extract($row);
			$output[] = '<tr>';
			$output[] = '<td><a href="ShoppingCart.php?action=delete&id='.$id.'" class="r"><img src="Images/small_delete.gif"/></a></td>';
			$output[] = '<td>'.$Shoe_Name.'</td>';
			$output[] = '<td>&pound;'.$price.'</td>';
			$output[] = '<td><input type="text" name="qty'.$id.'" value="'.$qty.'" size="3" maxlength="3" /></td>';
			$output[] = '<td>&pound;'.($price * $qty).'</td>';
			
			$subtotal += $price * $qty;
			$gst = number_format($subtotal * .15);
			$grandtotal = number_format($subtotal + $gst);
			$output[] = '</tr>';
		}
		$output[] = '</table>';
		$output[] = '<p>SubTotal: <strong>&pound;'.$subtotal.'</strong></p>';
		$output[] = '<p>GST: <strong>&pound;'.$gst.'</strong></p>';
		$output[] = '<p>Grand total: <strong>&pound;'. $grandtotal .'</strong></p>';
		$output[] = '<div><button type="submit">Update cart</button></div>';
		$output[] = '<div><a href="ShoppingCart.php?action=Clear" ><img src="Images/search_small.gif" /></a></div>';
		$output[] = '<div><a href="ShoppingCart.php?action=Checkout" ><img src="Images/button_checkout.gif" /></a></div>';
		$output[] = '</form>';
		$_SESSION['subtotal'] = $subtotal;
		$_SESSION['gst'] = $gst;
		$_SESSION['grandtotal'] = $grandtotal;
	} else {
		$output[] = '<p align="center">You shopping cart is empty.</p>';
	}
	return join('',$output);
}

function processActions() {
	global $db;
	if (isset($_SESSION['cart']))
	{
		$cart = $_SESSION['cart'];
	}
	
	if (isset($_GET['action']))
	{
		$action = $_GET['action'];
	}

    switch ($action) {
	case 'add':
		if (isset($cart) && $cart!='') {
			$cart .= ','.$_GET['id'];
		} else {
			$cart = $_GET['id'];
		}
		break;
	case 'delete':
		if ($cart) {
			$items = explode(',',$cart);
			$newcart = '';
			foreach ($items as $item) {
				if ($_GET['id'] != $item) {
					if ($newcart != '') {
						$newcart .= ','.$item;
					} else {
						$newcart = $item;
					}
				}
			}
			$cart = $newcart;
		}
		break;
	case 'update':
	if ($cart) {
		$newcart = '';
		foreach ($_POST as $key=>$value) {
			if (stristr($key,'qty')) {
				$id = str_replace('qty','',$key);
				$items = ($newcart != '') ? explode(',',$newcart) : explode(',',$cart);
				$newcart = '';
				foreach ($items as $item) {
					if ($id != $item) {
						if ($newcart != '') {
							$newcart .= ','.$item;
						} else {
							$newcart = $item;
						}
					}
				}
				for ($i=1;$i<=$value;$i++) {
					if ($newcart != '') {
						$newcart .= ','.$id;
					} else {
						$newcart = $id;
					}
				}
			}
		}
	}
	$cart = $newcart;
	break;
	case 'Clear':
	unset($cart);
	break;
	case 'Checkout':
	if (isset($_SESSION['flag']) || ($_SESSION['flag'] == true)){
		$url = "index.php?content_page=MyOrder";
		date_default_timezone_set('Pacific/Auckland');
		$status = "waiting";
		$date = date("Y-m-d");
		$query = "SELECT CustomerID FROM Customer where User_Name ='".$_SESSION['current_user']."'";
		$result = $db->query($query);
		$array = $result->fetch();
		$custid = $array['CustomerID'];
		$sql = "INSERT INTO Orders (Status, OrderDate, CustomerID, SubTotal, GST, GrandTotal) VALUES ('".$status."', '".$date."', '".$custid."', '".$_SESSION['subtotal']."', '".$_SESSION['gst']."', '".$_SESSION['grandtotal']."')";
		if($db->query($sql)){
			echo"<script language='javascript'>";
	
		echo"alert('Congratulations! Your order have been plaecd successfully!');";
	echo"window.location.href='".$url."';";
	echo"</script>";
	unset($_SESSION['gst']);
	unset($_SESSION['subtotal']);
	unset($_SESSION['grandtotal']);
	unset($cart);
		}	
	}else{
		header("Location: index.php?content_page=login");
		}
	break;
}
$_SESSION['cart'] = $cart;
//echo $cart;
}

function displayBooks() {
	global $db;
	$sql = 'SELECT * FROM Shoe ORDER BY id';
	$result = $db->query($sql);
	$output[] = '<table width="100%">';
	$output[] = '<tr><td ><h2>Image</h2></td><td><h2>Name</h2></td><td><h2>Description</h2></td><td><h2>Price</h2></td><td></td></tr>';
	while ($row = $result->fetch()) {
		//$output[] = '<li>"'.$row['title'].'" by '.$row['author'].': &pound;'.$row['price'].'<br /><a href="cart.php?action=add&id='.$row['id'].'">Add to cart</a></li>';
		$output[] = '<tr><td ><img height="130" width="200" src = "../uploads/PHPUploaded/'.$row['Image'].'"/></td><td>'.$row['Shoe_Name'].'</td><td>'.$row['Description'].'</td><td>'.$row['price'].'</td><td><a href="ShoppingCart.php?action=add&id='.$row['id'].'"><img src="Images/button_in_cart.gif" /></a></td>';
	}
	$output[] = '</table>';
	echo join('',$output);
}

function changeCust($custId){
	global $db;
	$sql = " select * from Customer where CustomerID='".$custId."'";
	$result = $db->query($sql);
	$array = $result->fetch();
	$status = $array['Status'];
		

	if($status=="Disabled"){
			$status = "Enabled";
		}else{
			$status = "Disabled";
		}
	
	$query = "update Customer set Status='".$status."' where CustomerID='".$custId."'";
	$result = $db->query($query);
	}
	
	function alertRedirect($flag,$url){
	echo"<script language='javascript'>";
	if($flag){
		echo"alert('Status updated Successfully !');";
	}else{
		echo"alert('Operation failure !');";
	}
	echo"window.location.href='".$url."';";
	echo"</script>";

}
function alert(){
	echo"<script language='javascript'>";
	
		echo"alert('Successful !');";
	
	echo"</script>";

}

function changeOrder($orderId){
	global $db;
	$sql = " select * from Orders where OrderID='".$orderId."'";
	$result = $db->query($sql);
	$array = $result->fetch();
	$status = $array['Status'];
	if($status=="waiting"){
			$status = "shipped";
		}else{
			$status = "waiting";
		}
	
	$query = "update Orders set Status='".$status."' where OrderID='".$orderId."'";
	$result = $db->query($query);
	}

?>

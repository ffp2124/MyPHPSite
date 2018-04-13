<?php
ob_start(); //set buffer on
session_start(); //starting session

// Include functions
require_once('Functions/functions.inc.php');

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>PHP Shopping Cart Demo &#0183; Bookshop</title>
	<link rel="stylesheet" href="Styles/shopping-styles.css" />
</head>

<body>
<div id="shoppingcart">

<h2 align="center">Your Shopping Cart</h2>

<?php
echo writeShoppingCart();
?>

</div>

<div id="booklist">

<h2 align="center">Shoes In Our Store</h2>

<?php
displayBooks();
?>

</div>
</body>
</html>
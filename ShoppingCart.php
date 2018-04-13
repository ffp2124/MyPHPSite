<?php
ob_start(); //set buffer on
session_start(); //starting session

// Include functions
require_once('Functions/functions.inc.php');
require("Functions/ErrorFunctions.php");
//Sets a user function (error_handler) to handle errors in a script
$error_handler = set_error_handler("userErrorHandler");
// Process actions for this page
processActions();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>PHP Shopping Cart </title>
    <link href="Styles/StyleSheet.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="Styles/shopping-styles.css" />
</head>

<body>
<div class="wrapper">
        <div class="header">
        <a href="index.php?content_page=IndexContent""><img src="Images/logo1.png" height="200" width = "308"/></a><img src="Images/SlideShow/1.jpg" Height = "200" width = "610"/>
        </div>
        <div class="menu">
            <ul>
                <li class = "navigation_first_item">
                    <a href="index.php?content_page=IndexContent">Home</a></li>
                <li><a href="index.php?content_page=Registration">Registration</a></li>
                <li><a href="index.php?content_page=Login">Login</a></li>
                <li><a href="index.php?content_page=Catalogue">Catalogue</a></li>
                <li><a href="index.php?content_page=Adminlogin">Admin</a></li>
                <li><a href="ShoppingCart.php">Shopping Cart</a></li>
                <li><a href="index.php?content_page=MyOrder">My Order</a></li>
                <li><a href="index.php?content_page=Introduction">Contact us</a></li>
                 <li><a href="index.php?content_page=logout">Logout</a></li>
            </ul>
        </div>
        <div class="clear">
        </div>
        <div class="content">
            <div id="shoppingcart">

<h2 align="center">Your Shopping Cart</h2>

<?php
echo writeShoppingCart();
?>

</div>

<div id="contents">

<h2 align="center">Please check quantities..</h2>

<?php
echo showCart();
?>

<p><a href="index.php?content_page=Catalogue"><img src="Images/button_continue_shopping.gif" /></a></p>

</div>
        </div>
        <div class="clear">
        </div>
        <div class = "footer">

            <table style = "width: 100%;">
                <tr>
                    <td style="text-align: center;">
                          <a href="index.php?content_page=IndexContent" style="font-size: medium;">Home </a> &nbsp;|&nbsp;
                        <a href="index.php?content_page=Registration" style="font-size: medium;">Registration  </a>&nbsp; |&nbsp;
                        <a href="index.php?content_page=ContactUs" style="font-size: medium;">Contact us </a> &nbsp;|&nbsp;
                        <a href="index.php?content_page=AdminLogin" style="font-size: medium;">Admin </a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center">
                        @Copyright Quantity Shoes All Right Reserved</td>
                </tr>
            </table>
        </div>
    </div>


</body>
</html>
<?php
session_start();
if(!isset($_SESSION["Admin"])){
		echo"<script language='javascript'>";
		echo"window.top.location.href='../index.php?content_page=AdminLogin';";
		echo"</script>";
		exit;
	}
?>
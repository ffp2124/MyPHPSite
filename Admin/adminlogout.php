<?php
session_start();
unset($_SESSION["Admin"]);
header("Location: ../index.php?content_page=AdminLogin");
?>
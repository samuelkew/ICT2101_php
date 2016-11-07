<?php
   include ("includes/session.php");
    if (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
        header("Refresh:0");
    }
   include('includes/header.php');
   if ($_SESSION['emp_type'] == 1) {
        include("views/dispatch.php");
   }
   if ($_SESSION['emp_type'] == 5) {
        include("views/driver.php");
	}
   include ("includes/footer.php");
?>


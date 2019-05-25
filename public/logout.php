<?php   include("../includes/layout/header.php"); ?>
<?php require_once("../includes/require_once.php"); ?>

<?php

if(isset($_SESSION['username'])){

unset($_SESSION['username']);

redirect_to("index.php");
}
else{

	$_SESSION['username'] = null;
	redirect_to("index.php");
}


 ?>
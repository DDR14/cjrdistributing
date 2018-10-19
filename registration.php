<?php 
session_start();
$base_path = $_SERVER['DOCUMENT_ROOT'].'/cjrdistributing/';
require_once 'config.php';
require_once 'meta-title1.php';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo $registration_desc; ?>">
	<meta name="keywords" content="<?php echo $registration_keyw; ?>">
	<meta name="author" content="<?php echo $author; ?>">
	<title><?php echo $registration_title; ?></title>
	<?php 
	echo $registration_cano;
	require_once "head.php";
	require_once "analytics.php";
	if (isset($_POST["country"]) && !empty($_POST["country"])) {
	echo '<script type="text/javascript">var countries = "'.$_POST['country'].'";</script>';
	}else{
		echo '<script type="text/javascript">var countries = "USA";</script>';
	}
	if (isset($_POST["state"]) && !empty($_POST["state"])) {
	echo '<script type="text/javascript">var states = "'.$_POST['state'].'";</script>';
	}else{
		echo '<script type="text/javascript">var states = "";</script>';
	}
	?>
	
</head>
<body>
	<?php
	require_once "inc/inc.navbar.php";
	require_once "inc/inc.registration.php";
	$page = "registration";
	require_once "inc/inc.footer.php";
	require_once "script.php";
	?>
	<script>



	</script>
</body>
</html>
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
	<meta name="description" content="<?php echo $tonnage_formula_desc; ?>">
	<meta name="keywords" content="<?php echo $tonnage_formula_keyw; ?>">
	<meta name="author" content="<?php echo $author; ?>">
	<title><?php echo $tonnage_formula_title; ?></title>
	<?php
	echo $tonnage_formula_cano;
	require_once "head.php";
	require_once "analytics.php";
	?>
	<script src='script/jquery-3.2.1.min.js' ></script>
</head>
<body>
	<?php
	require_once "inc/inc.navbar.php";
	require_once "inc/inc.tonnage-formula.php";
	$page = "tonnage-formula";
	require_once "inc/inc.footer.php";
	require_once "script.php";
	?>
</body>
</html>
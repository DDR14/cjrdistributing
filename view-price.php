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
	<meta name="description" content="<?php echo $view_price_desc; ?>">
	<meta name="keywords" content="<?php echo $view_price_keyw; ?>">
	<meta name="author" content="<?php echo $author; ?>">
	<title><?php echo $view_price_title; ?></title>
	<?php 
	echo $view_price_cano;
	require_once "head.php";
	require_once "analytics.php";
	?>
</head>
<body>
	<?php
	require_once "inc/inc.navbar.php";
	require_once "inc/inc.view-price.php";
	require_once "inc/inc.footer.php";
	require_once "script.php";
	?>
</body>
</html>
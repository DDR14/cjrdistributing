<?php 
session_start();
require_once 'config.php';
require_once 'meta-title1.php';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo $index_desc; ?>">
	<meta name="keywords" content="<?php echo $index_keyw; ?>">
	<meta name="author" content="<?php echo $author; ?>">
	<meta name="google-site-verification" content="OTlxNAPxGPi-zUob9OAKqdc3_q6F2QZJJ1-Daxo_uZ0" /> 
	<title><?php echo $index_title; ?></title>
	<?php 
	echo $index_cano;
	require_once "head.php";
	require_once "analytics.php";
	?>
</head>
<body>
	<?php

	require_once "inc/inc.navbar.php";
	require_once "inc/inc.carousel.php";
	require_once "inc/inc.footer-home.php";
	$page = "index";
	require_once "inc/inc.footer.php";
	require_once "script.php";
	?>
</body>
</html>
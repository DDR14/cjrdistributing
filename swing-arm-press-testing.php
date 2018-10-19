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
	<meta name="description" content="<?php echo $swing_arm_press_testing_desc; ?>">
	<meta name="keywords" content="<?php echo $swing_arm_press_testing_keyw; ?>">
	<meta name="author" content="<?php echo $author; ?>">
	<title><?php echo $swing_arm_press_testing_title; ?></title>
	<?php 
	echo $swing_arm_press_testing_cano;
	require_once "head.php";
	require_once "analytics.php";
	?>
</head>
<body>
	<?php
	require_once "inc/inc.navbar.php";
	require_once "inc/inc.swing-arm-press-testing.php";
	require_once "inc/inc.footer.php";
	require_once "script.php";
	?>
</body>
</html>
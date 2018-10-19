<?php 
session_start();
$base_path = '';
require_once $base_path.'config.php';
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
  require_once $base_path."head.php";
  require_once "analytics.php";
  ?>
</head>
<body>
  <?php
  require_once $base_path."inc/inc.navbar.php";
  require_once $base_path."inc/inc.registration2.php";
  require_once $base_path."inc/inc.footer.php";
  require_once $base_path."script.php";
  ?>
</body>
</html>
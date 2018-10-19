<link rel="apple-touch-icon" sizes="144x144" href="dist/icon/apple-touch-icon.png?v=kPge8XRvN2">
<link rel="icon" type="image/png" href="http://cjrtec.com/dist/icon/favicon-32x32.png?v=kPge8XRvN2" sizes="32x32">
<link rel="icon" type="image/png" href="http://cjrtec.com/dist/icon/favicon-16x16.png?v=kPge8XRvN2" sizes="16x16">
<link rel="manifest" href="http://cjrtec.com/dist/icon/manifest.json?v=kPge8XRvN2">
<link rel="mask-icon" href="http://cjrtec.com/dist/icon/safari-pinned-tab.svg?v=kPge8XRvN2" color="#5bbad5">
<link rel="shortcut icon" href="http://cjrtec.com/dist/icon/favicon.ico?v=kPge8XRvN2">
<meta name="theme-color" content="#ffffff">

<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="dist/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="dist/css/animate.css">
<link rel="stylesheet" type="text/css" href="dist/css/micro-style.css">

<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Changa+One:400,400i" rel="stylesheet">


<script type="text/javascript" src="dist/js/countries.js"></script>
<script type="text/javascript" src="dist/js/modernizr.js"></script>
<script type="text/javascript" src="dist/js/jquery.js"></script>
<script type="text/javascript" src="dist/js/custom-micro-script.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<?php 
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



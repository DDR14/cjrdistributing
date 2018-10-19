<link rel="apple-touch-icon" sizes="144x144" href="dist/icon/apple-touch-icon.png?v=kPge8XRvN2">
<link rel="icon" type="image/png" href="http://cjrtec.com/dist/icon/favicon-32x32.png?v=kPge8XRvN2" sizes="32x32">
<link rel="icon" type="image/png" href="http://cjrtec.com/dist/icon/favicon-16x16.png?v=kPge8XRvN2" sizes="16x16">
<link rel="manifest" href="http://cjrtec.com/dist/icon/manifest.json?v=kPge8XRvN2">
<link rel="mask-icon" href="http://cjrtec.com/dist/icon/safari-pinned-tab.svg?v=kPge8XRvN2" color="#5bbad5">
<link rel="shortcut icon" href="http://cjrtec.com/dist/icon/favicon.ico?v=kPge8XRvN2">
<meta name="theme-color" content="#ffffff">

<link rel="stylesheet" type="text/css" href="http://cjrtec.com/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://cjrtec.com/dist/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="http://cjrtec.com/dist/css/animate.css">
<link rel="stylesheet" type="text/css" href="http://cjrtec.com/dist/css/hover.css">
<link rel="stylesheet" type="text/css" href="dist/css/style.css">
<link rel="stylesheet" type="text/css" href="http://cjrtec.com/dist/css/style2.css">


<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Changa+One:400,400i" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<script type="text/javascript" src="http://cjrtec.com/dist/js/countries.js"></script>
<script type="text/javascript" src="http://cjrtec.com/dist/js/modernizr.js"></script>
<script type="text/javascript" src="http://cjrtec.com/dist/js/jquery.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script type="application/ld+json">
			{
			  "@context": "http://schema.org",
			  "@type": "Corporation",
              "@id": "http://cjrtec.clickerpress.com",
			  "address": {
				"@type": "PostalAddress",
				"addressLocality": "Lindon Utah",
				"addressRegion": "UT",
				"streetAddress": "930 West 410 North"
			  },
			  "description": "Largest CLICKER PRESS supplier in America, providing 5-year warranty on die cutting machines made for the manufacturing industry.",
              "url": "http://www.cjrtec.com",
			  "name": "Clicker Press from CJRTec",
			  "telephone": "800-733-2302",
              "logo": "http://www.cjrtec.com/dist/img/cjrlogo.png",
              "sameAs": 
              	[
              		"https://www.youtube.com/channel/UCNph4b5fxTNKhQnycRp4oyw",
              		"https://twitter.com/clickerdiepress",
                    "https://www.instagram.com/cjrtec/",
                    "https://www.crunchbase.com/organization/clicker-press"
              	]
			}
</script>



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



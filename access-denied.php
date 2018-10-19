<?php 
$base_path = $_SERVER['DOCUMENT_ROOT']."/";
require_once $base_path.'config.php';


$accessCode = $accessCodeErr = $accessCodeSuc = "";


$country_code = "+1";
$company = $companyErr = $companySuc = "";
$email = $emailErr = $emailSuc = "";
$name = $nameErr = $nameSuc = "";                                                                
$website = $websiteErr = $websiteSuc = "";
$state = $stateErr = $stateSuc = "";
$city = $cityErr = $citySuc = "";
$phone = $phoneErr = $phoneSuc = "";
$wechat = $wechatErr = $wechatSuc = "";
$qq = $qqErr = $qqSuc = "";
$password = $passwordErr = $passwordSuc = "";
$loginErr = "";



if (isset($_POST['login'])) {
	# code...

	if (empty($_POST['email'])) {
		# code...
		$emailErr = "Email is required.";
	}else{
		$email = test_input($_POST["email"]);
		$emailSuc = 1;
	}

	if (empty($_POST['password'])) {
		# code...
		$passwordErr = "Password is required.";
	}else{
		$password = test_input($_POST["password"]);
		$passwordSuc = 1;
	}

	if ($emailSuc == 1 && $passwordSuc == 1) {
		# code...

		if ($email == "michael" && $password == "qwerty123") {
			# code...


			$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
				echo "<script>
				window.location = '". $_SERVER['HTTP_REFERER'] ."'
			</script>
			";

			


		}else{
			$loginErr = "Invalid Credentials";
		}

	}else{
		$loginErr = "All fields are required.";
	}



}







if (isset($_POST['btnRegister'])) {
	# code...

	if (empty($_POST["name"])) {
		$nameErr = "Your name is required";
	} else {
		$name = test_input($_POST["name"]);
		if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
			$nameErr = "Invalid Input<br>Only letters and white space allowed";
		} else {
			$nameSuc = 1;
		}
	}

	if (empty($_POST["state"])) {
		$stateErr = "State is required";
	} else {
		$state = test_input($_POST["state"]);
		$stateSuc = 1;
	}

	if (empty($_POST["city"])) {
		$cityErr = "City/province is required";
	} else {
		$city = test_input($_POST["city"]);
		$citySuc = 1;
	}

	if (empty($_POST["email"])) {
		$emailErr = "Email is required";
	} elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$emailErr = "Invalid email format";
	} else {
		$email = test_input($_POST["email"]);
		$emailSuc = 1;
	}

	if (empty($_POST["company"])) {
		$companyErr = "Company Name is required";
	} else {
		$company = test_input($_POST["company"]);
		if (!preg_match("/^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/", $company)) {
			$companyErr = "Invalid Input<br>Only letters, numbers and white space allowed";
		} else {
			$companySuc = 1;
		}
	}

	if (empty($_POST["website"])) {
		$website = "";
		$websiteSuc = 1;
	} else {
		$website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
			$websiteErr = "Invalid URL"; 
		}else{
			$websiteSuc = 1;
		}
	}

	if (empty($_POST["phone"])) {
		$phoneErr = "Your phone number is required";
	} else {
		$phone = test_input($_POST["phone"]);
		if (!preg_match("/^[0-9-]*$/", $phone)) {
			$phoneErr = "Invalid format";
		} else {
			$phoneSuc = 1;
		}
	}

	if (empty($_POST["wechat"])) {
		$wechatErr = "";
	} else {
		$wechat = test_input($_POST["wechat"]);
		$wechatSuc = 1;
	}

	if (empty($_POST["qq"])) {
		$qqErr = "";
	} else {
		$qq = test_input($_POST["qq"]);
		$qqSuc = 1;
	}

	if ($companySuc == 1 && $nameSuc == 1 && $emailSuc == 1 && $stateSuc == 1 && $citySuc == 1 && $phoneSuc == 1) {
		# code...


		$to = "support@cjrtec.com, james@cjrtec.com, michael.r@meristone.com";
		$subject = "Block IP - Account Registration";

		$message = '

		<p>'. $name .'</p>
		<p>'. $company .'</p>
		<p>'. $website .'</p>
		<p>'. $email .'</p>
		<p>'. $city .', '. $state .', '. $country .'</p>
		<p>'. $country_code .' '. $phone .'</p>
		<p>WeChat ID: '. $wechat .'</p>
		<p>QQ ID: '. $qq .'</p>

		<p>'. $_SERVER['SERVER_NAME'] .'</p>

		';

// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
		$headers .= 'From: CJRTec Support <support@cjrtec.com>' . "\r\n";

		mail($to,$subject,$message,$headers);
		$_SESSION['login_success'] = 1;
		echo "<script>
				window.location = '". $_SERVER['HTTP_REFERER'] ."'
			</script>";

		

	}










}


function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>




<!DOCTYPE html>
<html>
<head>
	<title>Welcome to CJRTec</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="dist/css/denied-page.css">
	<script type="text/javascript" src="dist/js/countries.js"></script>
	<style type="text/css">
		
    
    .denied .welcome{
      padding-top: 50px;
      text-align: center;
    }
    .welcome .row .col-md-6 .sec{
    	padding-top: 15px;
    }
	</style>
</head>
<body>


	<?php 
	require_once "inc/inc.navbar.php";
	?>


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



<section class="denied">
		<div class="container">
		<div class="col-md-8">
			<div class="welcome">
				<?php 


					if (isset($_SESSION['login_success'])) {
						# code...

						?>


							<div class="alert alert-success">

								<h1>Registration Success!</h1>
							<p>Your account has been submitted to the moderators for approval. You will receive an account confirmation email with your password in your inbox within 24 hours. </p>

							</div>


						<?php

					}else{
						?>

							<h1>Welcome to CJRTec!</h1>
				<p>Please register to view pricing of our machines, parts and accessories.</p>
				<div class="row">
					<div class="col-md-6">
						<img src="images/uploads/100-Ton-Beam-press-with-conveyor-table.jpg" class="img-responsive">
					</div>
					<div class="col-md-6">
						<img src="images/uploads/20-Ton-Rotary-Press.jpg" class="img-responsive sec">
					</div>
				</div>

						<?php
					}

				 ?>
			</div>
		</div>
		<div class="col-md-4">

			<div class="panel panel-default">

				<ul class="nav nav-tabs" id="myTab">
					<li class="active"><a data-toggle="tab" href="#log">Login</a></li>
					<li><a data-toggle="tab" href="#register">Register</a></li>
				</ul>

				<div class="tab-content">
					<div id="log" class="tab-pane fade in active">
						<br>
						<form class="form-horizontal" action="" method="POST">
							<label>Email Address</label>
							<input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
							<span class="text-danger"><?php echo $emailErr; ?></span>
							<br>
							<label>Password</label>
							<input type="password" name="password" class="form-control">
							<span class="text-danger"><?php echo $passwordErr; ?></span>
							<br>
							
							<div class="row">
								<button class="btn btn-default col-md-offset-9" name="login">Login</button>
							</div>

							<span class="text-danger"><?php echo $loginErr; ?></span>


						</form>


					</div>
					<div id="register" class="tab-pane fade">
						<br>
						<form class="form-horizontal" action="" method="POST" id="form1">
							<label>Name</label>
							<input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
							<span class="text-danger"><?php echo $nameErr; ?></span>
							<br>
							<label>Company</label>	
							<input type="text" name="company" class="form-control" value="<?php echo $company; ?>">
							<span class="text-danger"><?php echo $companyErr; ?></span>
							<br>
							<label>Website</label>
							<input type="text" name="website" class="form-control" placeholder="http://www.cjrtec.com/" value="<?php echo $website; ?>">
							<span class="text-danger"><?php echo $websiteErr; ?></span>
							<br>
							<label>Email Address</label>
							<input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
							<span class="text-danger"><?php echo $emailErr; ?></span>
							<br>
							<label for="size">Country</label>
							<select id="country" name="country" class="crs-country form-control" data-region-id="state"></select>
							<br>
							<label for="State">State</label>
							<select class="form-control" name="state" id="state" data-default-value="<?php echo $state; ?>" ></select>
							<span class="text-danger"><?php echo $stateErr; ?></span>
							<script language="javascript">
								populateCountries("country", "state");
							</script>
							<br>
							<label>City/Province</label>
							<input type="text" name="city" class="form-control" value="<?php echo $city; ?>">
							<span class="text-danger"><?php echo $cityErr; ?></span>
							<br>
							<label for="phone">Phone</label>
							<div class="inner-addon left-addon">
								<i class="fa" id="code"><?php echo $country_code; ?></i>
								<input type="text" class="form-control" name="phone" id="phone" value="<?php echo $phone; ?>" placeholder="XXX-XXX-XXXX" maxlength="12">
								<span class="text-danger"><?php echo $phoneErr; ?></span>
							</div>
							<br>
							<label>WeChat ID</label>
							<input type="text" name="wechat" class="form-control" value="<?php echo $wechat; ?>">
							<br>
							<label>QQ ID</label>
							<input type="text" name="qq" class="form-control" value="<?php echo $qq; ?>">	
							<br>
							<button class="btn btn-default col-md-offset-9" name="btnRegister">Register</button>

						</form>

					</div>







				</div>

			</div>

		</div>	
	</div>

	<?php 

	$page = "cjr-parts";
	require_once "inc/inc.footer.php";

	?>
</section>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="dist/js/country-code.js"></script>
	<script type="text/javascript">
		$('#myTab a').click(function(e) {
			e.preventDefault();
			$(this).tab('show');
		});

// store the currently selected tab in the hash value
$("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
	var id = $(e.target).attr("href").substr(1);
	window.location.hash = id;
});

// on load of the page: switch to the currently selected tab
var hash = window.location.hash;
$('#myTab a[href="' + hash + '"]').tab('show');
</script>
<script type="text/javascript">
	
	/*this is for the registration form script */
	$('#phone', '#form1')

	.keydown(function (e) {
		var key = e.charCode || e.keyCode || 0;
		$phone = $(this);

      // Auto-format- do not expose the mask as the user begins to type
      if (key !== 8 && key !== 9) {
      	if ($phone.val().length === 3) {
      		$phone.val($phone.val() + '-');
      	}
      	if ($phone.val().length === 7) {
      		$phone.val($phone.val() + '-');
      	}
      }

      // Allow numeric (and tab, backspace, delete) keys only
      return (key == 8 || 
      	key == 9 ||
      	key == 46 ||
      	(key >= 48 && key <= 57) ||
      	(key >= 96 && key <= 105)); 
  })

	.bind('focus click', function () {
		$phone = $(this);

		if ($phone.val().length === 0) {

		}
		else {
			var val = $phone.val();
          $phone.val('').val(val); // Ensure cursor remains at the end
      }
  })

	.blur(function () {
		$phone = $(this);

		if ($phone.val() === '(') {
			$phone.val('');
		}
	});

</script>

</body>
</html>
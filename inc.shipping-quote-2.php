<?php

$s = test_input($_GET['s']);
$ship_code = preg_replace("/[^a-zA-Z0-9]+/", "", $s);

$complete = "";


if (!isset($_SESSION['id'])) {
	# code...

	echo'<script>window.location.href="login.php";</script>';

}else{
	# code...
	
	if (empty($ship_code)) {
		# code...

		echo'<script>window.location.href="clicker-press.php";</script>';


	}else{

		require_once 'inc.connection.php';

		$sql = "SELECT ship_code FROM shipping_quote WHERE user_id = '$_SESSION[id]' AND ship_code = '$ship_code' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
    // output data of each row
			while($row = $result->fetch_assoc()) {

			}
		} else {
			echo'<script>window.location.href="clicker-press.php";</script>';
		}

	}


}










$area = $loading_dock = $forklift = $forklift_capacity = $fork = $bldg = $insurance = $capacity = "";
$areaErr = $loading_dockErr = $forkliftErr = $forklift_capacityErr = $forkErr = $bldgErr = $insuranceErr = $capacityErr = "";
$areaSuc = $loading_dockSuc = $forkliftSuc = $forklift_capacitySuc = $forkSuc = $bldgSuc = $insuranceSuc = $capacitySuc = "";
$replacement_value = $set_value = $restrictions_weight = "";
$replacement_valueErr = $set_valueErr = $restrictions_weightErr = "";
$replacement_valueSuc = $set_valueSuc = $restrictions_weightSuc = "";
$insurance_choiceSuc = "";

if (isset($_POST['btn-quote2'])) {
		# code...
	
	if (empty($_POST["area"])) {
		$areaErr = "Required";
	} else {
		$area = test_input($_POST["area"]);
		$areaSuc = "ok";
	}

	if (empty($_POST["loading_dock"])) {
		$loading_dockErr = "Required";
	} else {
		$loading_dock = test_input($_POST["loading_dock"]);
		$loading_dockSuc = "ok";
	}

	if (empty($_POST["forklift"])) {
		$forkliftErr = "Required";
	} else {
		$forklift = test_input($_POST["forklift"]);
		

		if ($forklift == "yes") {
			# code...


			if (empty($_POST["forklift_capacity"])) {
				$forklift_capacityErr = "Required";
			} else {
				$forklift_capacity = test_input($_POST["forklift_capacity"]);
    // check if forklift_capacity only contains letters and whitespace
				if (!preg_match("/^[0-9.]*$/",$forklift_capacity)) {
					$forklift_capacityErr = "Only numbers is allowed"; 
				}
				else{
					$forklift_capacitySuc = "ok";
				}
			}


			if (empty($_POST["fork"])) {
				$forkErr = "Required";
			} else {
				$fork = test_input($_POST["fork"]);
    // check if fork only contains letters and whitespace
				if (!preg_match("/^[0-9.]*$/",$fork)) {
					$forkErr = "Only numbers is allowed"; 
				}
				else{
					$forkSuc = "ok";
				}
			}


			if ($forklift_capacitySuc == "ok" && $forkSuc == "ok") {
		# code...
				$forkliftSuc = "ok";
			}


		}else{

			$forkliftSuc = "ok";
			$forklift_capacitySuc = "ok";
			$forkSuc = "ok";

		}


	}

	


	if (empty($_POST["bldg"])) {
		$bldgErr = "Required";
	} else {
		$bldg = test_input($_POST["bldg"]);
		$bldgSuc = "ok";

	}


	if (empty($_POST["insurance"])) {
		$insuranceErr = "Required";
	} else {
		$insurance = test_input($_POST["insurance"]);
		
		if ($insurance == "standard") {
			# code...
			$insurance_choice = $insurance;
			$insurance_choiceSuc = "ok";
		}
		elseif($insurance == "replacement"){

			if (empty($_POST["replacement_value"])) {
				$replacement_valueErr = "Required";
			} else {
				$replacement_value = test_input($_POST["replacement_value"]);
    // check if replacement_value only contains letters and whitespace
				if (!preg_match("/^[0-9.]*$/",$replacement_value)) {
					$replacement_valueErr = "Only numbers is allowed"; 
				}else{
					$insurance_choice = $replacement_value;
					$insurance_choiceSuc = "ok";
				}
			}


		}
		else{

			if (empty($_POST["set_value"])) {
				$set_valueErr = "Required";
			} else {
				$set_value = test_input($_POST["set_value"]);
    // check if set_value only contains letters and whitespace
				if (!preg_match("/^[0-9.]*$/",$set_value)) {
					$set_valueErr = "Only numbers is allowed"; 
				}else{
					$insurance_choice = $set_value;
					$insurance_choiceSuc = "ok";
				}
			}

		}

	}



	if (empty($_POST["restrictions_weight"])) {
		$restrictions_weightErr = "Required";
	} else {
		$restrictions_weight = test_input($_POST["restrictions_weight"]);
    // check if restrictions_weight only contains letters and whitespace
		if (!preg_match("/^[0-9.]*$/",$restrictions_weight)) {
			$restrictions_weightErr = "Only numbers is allowed"; 
		}
		else{
			$restrictions_weightSuc = "ok";
		}
	}



	if ($areaSuc == "ok" && $loading_dockSuc == "ok" && $forkliftSuc == "ok" && $forklift_capacitySuc == "ok" && $forkSuc == "ok" && $bldgSuc == "ok" && $insurance_choiceSuc == "ok" && $restrictions_weightSuc == "ok") {
		# code...
		
		$sql = "UPDATE shipping_quote SET area='$area', loading_dock = '$loading_dock', forklift = '$forklift', forklift_capacity = '$forklift_capacity', fork = '$fork', bldg = '$bldg', restriction_weight = '$restrictions_weight', insurance = '$insurance_choice' WHERE user_id = $_SESSION[id] AND ship_code = '$ship_code' ";

		if ($conn->query($sql) === TRUE) {


			

			$sql = "SELECT a.name,a.company,a.email,a.phone,a.ext,b.* 
			FROM registers AS a
			INNER JOIN shipping_quote AS b
			ON 
			a.id = b.user_id
			WHERE 
			a.id='$_SESSION[id]' ";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
    // output data of each row
				while($row = $result->fetch_assoc()) {

					$company = $row['company'];
					$name = $row['name'];
					$zip = $row['zip'];
					$email = $row['email'];
					$city = $row['city'];
					$state = $row['state'];
					$ship_code = $row['ship_code'];
					$phone = $row['phone'];
					$ext = $row['ext'];

					$press_type = $row['press_type'];
					$value = $row['value'];
					$weight = $row['weight'];
					$dimension = $row['dimension'];
					$delivery_type = $row['delivery_type'];
					$trailer = $row['trailer'];
					$pickup_date = $row['pickup_date'];
					$delivery_day = $row['delivery_day'];
					$base = $row['base'];
					$area = $row['area'];
					$loading_dock = $row['loading_dock'];
					$forklift = $row['forklift'];
					$forklift_capacity = $row['forklift_capacity'];
					$fork = $row['fork'];
					$bldg = $row['bldg'];
					$restriction_weight = $row['restriction_weight'];
					$insurance = $row['insurance'];

				}
			} else {
				echo "0 results";
			}




			$to = $_SESSION['email'];
			// $support = 'james<james@cjrtec.com>, chris<chris@cjrtec.com>,  althea.v<althea.v@meristone.com>, michael.r<michael.r@meristone.com>, customerservice<customerservice@cjrtec.com>, joey<joey@meristone.com>, kaelreyes12<kaelreyes12@hotmail.com>';

			$subject = "CJRtec Shipping Quote";

			$message_support = '


			<center>
				<table width="90%">
					<tbody>

						<tr>
							<td align="center" style="padding-top: 20px;"><img src="http://www.cjrtec.com/dist/img/cjrlogo.png" width="120px;"></td>
						</tr>

						<tr>
							<td style="padding-top: 20px;"><h2 style="text-align: center;">Shipping Quote</h2></td>


						</tr>
						<tr>
							<td style="color: #f60; font-weight: bold;">Customer Info</td>
						</tr>
						<tr>
							<td>
								<table>
									<tbody>
										<tr>
											<td>Company</td>
											<td style="text-transform: capitalize;">'. $company .'</td>
										</tr>
										<tr>
											<td>Name</td>
											<td style="text-transform: capitalize;">'. $name .'</td>
										</tr>
										<tr>
											<td>Email</td>
											<td>'. $email .'</td>
										</tr>
										<tr>
											<td>Contact No.</td>
											<td style="text-transform: capitalize;">'. $phone .' ext. '. $ext .'</td>
										</tr>
										<tr>
											<td>Location</td>
											<td style="text-transform: capitalize;">'. $city .', '. $state .' '. $zip .'</td>
										</tr>

									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td style="padding-top: 10px;"><hr></td>
						</tr>
						<tr>
							<td>
								<table>
									<tbody>
										<tr>
											<td>
												<table>
													<tbody>

														<tr>
															<td style="font-weight: bold; color: #f60; padding-right: 20px;">Machine Info</td>
															<td style="font-weight: bold; color: #f60; padding-left: 20px;">Details</td>
														</tr>
														<tr>
															<td style=" padding-right: 20px;">
																<table>
																	<tbody>
																		<tr>
																			<td>Press Type</td>
																			<td style="padding-left:20px;">'. $press_type .'</td>
																		</tr>
																		<tr>
																			<td>Value</td>
																			<td style="padding-left:20px;">'. $value .'</td>
																		</tr>
																		<tr>
																			<td>Weight</td>
																			<td style="padding-left:20px;">'. $weight .'</td>
																		</tr>
																		<tr>
																			<td>Dimesion</td>
																			<td style="padding-left:20px;">'. $dimension .'</td>
																		</tr>
																	</tbody>
																</table>
															</td>
															<td style="padding-left: 20px; border-left: 1px solid #444;">
																<table>

																	<tbody>
																		<tr>
																			<td>Delivery Type</td>
																			<td style="padding-left:20px;">'. $delivery_type .'</td>
																		</tr>
																		<tr>
																			<td>Trailer</td>
																			<td style="padding-left:20px;">'. $trailer .'</td>
																		</tr>
																		<tr>
																			<td>Pickup_date</td>
																			<td style="padding-left:20px;">'. $pickup_date .'</td>
																		</tr>
																		<tr>
																			<td>Delivery days</td>
																			<td style="padding-left:20px;">'. $delivery_day .'</td>
																		</tr>
																		<tr>
																			<td>Base</td>
																			<td style="padding-left:20px;">'. $base .'</td>
																		</tr>
																	</tbody>
																</table>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td style="padding-top: 10px;"><hr></td>
						</tr>
						<tr>
							<td>
								<table>
									<tbody>
										<tr>
											<td>Area</td>
											<td style="padding-left:20px;">'. $area .'</td>
										</tr>
										<tr>
											<td>Loading Dock</td>
											<td style="padding-left:20px;">'. $loading_dock .'</td>
										</tr>
										<tr>
											<td>Forklift</td>
											<td style="padding-left:20px;">'. $forklift .'</td>
										</tr>
										<tr>
											<td>Forklift Capacity</td>
											<td style="padding-left:20px;">'. $forklift_capacity .' lbs</td>
										</tr>
										<tr>
											<td>Fork</td>
											<td style="padding-left:20px;">'. $fork .' inches</td>
										</tr>
										<tr>
											<td>Deliver to </td>
											<td style="padding-left:20px;">Bldg '. $bldg .'</td>
										</tr>
										<tr>
											<td>Restrictions </td>
											<td style="padding-left:20px;">'. $restriction_weight .' lbs</td>
										</tr>
										<tr>
											<td>Insurance </td>
											<td style="padding-left:20px;">'. $insurance .'</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<hr>
							</td>
						</tr>
						<tr>
							<td>
								'. $site .'
							</td>
						</tr>
					</tbody>
				</table>
			</center>


			';


// Always set content-type when sending HTML email
			$headers2 = "MIME-Version: 1.0" . "\r\n";
			$headers2 .= "Content-type: text/html; charset=iso-8859-1\r\n";
			// $headers2['Cc'] = 'althea.v@meristone.com,  gerryl@meristone.com';
// More headers
			$headers2 .= 'From: '. $name .' <'. $email .'>' . "\r\n";
			
			mail('james@cjrtec.com, chris@cjrtec.com, michael.r@cjrtec.com, customerservice@cjrtec.com, kaelreyes12@hotmail.com',$subject,$message_support,$headers2);



			$message_customer = '


			<center>
				<table>
					<tbody>

						<tr>
							<td align="center" style="padding-top: 20px;"><img src="http://www.cjrtec.com/dist/img/cjrlogo.png" width="120px;"></td>
						</tr>

						<tr>
							<td style="padding-top: 20px;"><h2 style="text-align: center;">Welcome to CJR tec</h2></td>


						</tr>
						<tr>
							<td style="padding-top: 10px;"><p>Thank you for using our online shipping tool. </p></td>
						</tr>

						<tr>
							<td style="padding-top: 10px;">
								<p>We have received your request and have forwarded your information to several freight companies. </p>
							</td>
						</tr>

						<tr>
							<td style="padding-top: 10px;">
								<p>You should be getting quotes within the next 24 hours.  </p>
							</td>
						</tr>

						<tr>
							<td style="padding-top: 10px;">
								<p>Please note that our shipping tool is a FREE service for our customers. We have no affiliation with any of the companies that will be contacting you. We also do not receive any compensation, commission, credit or kick back of any kind. </p>  
							</td>
						</tr>

						<tr>
							<td style="padding-top: 10px;">
								<p>If you have any questions, please contact us at (800) 733 2302.</p>  
							</td>
						</tr>

						<tr>
							<td style="padding-top: 10px;">
								<p>Thanks for choosing CJRtec!</p>  
							</td>
						</tr>

						<tr>
							<td style="padding-top: 30px; text-align: center;">
							<p>See more of our <a href="http://www.cjrtec.com/clicker-press.php" target="_blank">Automatic Cutting Machines</p>
								<a href="http://www.cjrtec.com/clicker-press.php" target="_blank" style="padding: 10px; background-color: #F39C12
								; color: #FFF; text-decoration: none; border-radius: 2px;">VISIT WWW.CJRTEC.COM</a>
							</td>
						</tr>
					</tbody>
				</table>
			</center>


			';

// Always set content-type when sending HTML email
			$headers1 = "MIME-Version: 1.0" . "\r\n";
			$headers1 .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
			$headers1 .= 'From: CJRtec <support@cjrtec.com>' . "\r\n";





			mail($to,$subject,$message_customer,$headers1);












			$area = $loading_dock = $forklift = $forklift_capacity = $fork = $bldg = $insurance = $capacity = "";
			$replacement_value = $set_value = $restrictions_weight = "";
			$complete = "yes";
		} else {
			echo "Error updating record: " . $conn->error;
		}

		$conn->close();


	}else{
		$complete = "no";
	}






	} // if btn-quote

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


	?>

	



<section class="shipping-quote">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-7 col-xs-8">
				<img src="http://www.cjrtec.com/dist/img/shipping/truck.jpg" class="img-responsive" alt="clicker press shipping truck">
			</div>
			<div class="col-md-offset-1 col-md-2 col-xs-4">
				<img src="http://www.cjrtec.com/dist/img/shipping/shipping-logo.png" class="img-responsive shipping-logo" alt="clicker press shipping logo">
			</div>
		</div>
		<hr class="style">



			<h1>FREE Shipping Quote</h1>
			<p>Complete the form below to get shipping quotes from the following independant freight companies</p>
			<div class="row">
				<div class="col-md-offset-1 col-md-2">
					<img src="http://www.cjrtec.com/dist/img/shipping/FedEx.png" class="img-responsive">
				</div>
				<div class="col-md-2">
					<img src="http://www.cjrtec.com/dist/img/shipping/ups.png" class="img-responsive">
				</div>
				<div class="col-md-2">
					<img src="http://www.cjrtec.com/dist/img/shipping/DHL.png" class="img-responsive">
				</div>
				<div class="col-md-2">
					<img src="http://www.cjrtec.com/dist/img/shipping/unishippers.png" class="img-responsive">
				</div>
				<div class="col-md-2">
					<img src="http://www.cjrtec.com/dist/img/shipping/freightquote.png" class="img-responsive">
				</div>
			</div>

			<?php 

			if ($complete == "no") {
				# code...
				echo '<div class="alert alert-danger" role="alert">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				Please Fill out All Fields.
			</div>';
		}

		?>

		<?php 

		if ($complete == "yes") {
					# code...
			?>


			<div class="form-complete">

				<h2><i class="fa fa-check-circle fa-lg" aria-hidden="true"></i> THANK YOU!</h2>
				<h3>You have successfully submitted your request.</h3>
				<p>We'll start processing it and will send you updates via email. Feel free to call us for direct inquiries. </p>
				<a href="clicker-press.php" class="btn btn-info btn-lg">See More Presses</a>


			</div>

			<?php
		}else{
			?>


			<form class="form-horizontal" action="" method="POST">
				<div class="page">

					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-warning">
								<div class="panel-heading">PICKUP</div>
								<div class="panel-body">

									<div class="form-group">

										<label class="col-md-5">Area</label>
										<label class="col-md-7">Commercial</label>

									</div>

									<div class="form-group">


										<label class="col-md-5">Loading Dock</label>
										<label class="col-md-7">No</label>

									</div>
									<div class="form-group">


										<label class="col-md-5">Forklift</label>
										<label class="col-md-7">Yes</label>

									</div>
									<div class="form-group">


										<label class="col-md-5">Forklift Capacity</label>
										<label class="col-md-7">25,000 lbs with 96' Forks</label>

									</div>
									<div class="form-group">


										<label class="col-md-5">Deliver to</label>
										<label class="col-md-7">Rear of Building</label>

									</div>
									<div class="form-group">
										<ul>
											<li>Driver is required to come in the building</li>
											<li>Business center is accessible without backing in and out with a 53' trailer</li>
											<li>Forklift driver will place goods at the back of trailer</li>
											<li>Driver is responsible of positioning the goods</li>
											<li>Pallet jack available for loads under 5000 lbs</li>
										</ul>
									</div>

								</div>
							</div>
						</div><!-- col-md-6 -->
						<div class="col-md-6">
							<div class="panel panel-warning">
								<div class="panel-heading">DESTINATION</div>
								<div class="panel-body">
									<div class="form-group">

										<label class="col-md-4">Area</label>
										<div class="col-md-8">
											<div class="col-md-6">
												<input type="radio" name="area" value="commercial" <?php if (isset($area) && $area=="commercial") echo "checked";?> > Commercial  

											</div>
											<div class="col-md-6">  
												<input type="radio" name="area" value="residential" <?php if (isset($area) && $area=="residential") echo "checked";?> > Residential 

											</div>
											<span class="error"><?php echo $areaErr; ?></span>
										</div>

									</div>
									<div class="form-group">

										<label class="col-md-4">Loading Dock</label>
										<div class="col-md-8">
											<div class="col-md-6">
												<input type="radio" name="loading_dock" value="yes" <?php if (isset($loading_dock) && $loading_dock=="yes") echo "checked";?> > Yes  

											</div>
											<div class="col-md-6">  
												<input type="radio" name="loading_dock" value="no" <?php if (isset($loading_dock) && $loading_dock=="no") echo "checked";?> > No 

											</div>
											<span class="error"><?php echo $loading_dockErr; ?></span>
										</div>

									</div>
									<div class="form-group">

										<label class="col-md-4">Forklift</label>
										<div class="col-md-8">
											<div class="col-md-6">
												<input type="radio" name="forklift" id="forklift_yes" value="yes" <?php if (isset($forklift) && $forklift=="yes") echo "checked";?> > Yes  

											</div>
											<div class="col-md-6">  
												<input type="radio" name="forklift" id="forklift_no" value="no" <?php if (isset($forklift) && $forklift=="no") echo "checked";?> > No 

											</div>
											<span class="error"><?php echo $forkliftErr; ?></span>
										</div>

									</div>
									<div class="form-group">

										<label class="col-md-4">Forklift Capacity</label>
										<div class="col-md-8">

											<div class="col-md-5">
												<input type="text" id="forklift_capacity" name="forklift_capacity" class="form-control" placeholder="lbs" value="<?php echo $forklift_capacity; ?>">  

												<span class="error"><?php echo $forklift_capacityErr; ?></span>

											</div>
											<label class="col-md-2">Fork</label>
											<div class="col-md-5">  
												<input type="text" id="fork" name="fork" class="form-control" placeholder="inches" value="<?php echo $fork; ?>" >  

												<span class="error"><?php echo $forkErr; ?></span>
											</div>
										</div>

									</div>

									<div class="form-group">

										<label class="col-md-4">Deliver to</label>
										<div class="col-md-8">

											<div class="col-md-6">
												<input type="radio" name="bldg" value="front" <?php if (isset($bldg) && $bldg=="front") echo "checked";?> > Bldg Front  

											</div>
											<div class="col-md-6">  
												<input type="radio" name="bldg" value="back" <?php if (isset($bldg) && $bldg=="back") echo "checked";?> > Bldg Back

											</div>
											<span class="error"><?php echo $bldgErr; ?></span>
										</div>

									</div>

									<div class="form-group">
										<ul>
											<li>Driver is required to come in the building</li>
											<li>Business center is accessible without backing in and out with a 53' trailer</li>
											<li>Driver can make turns in and out of the center without hitting planters or moving vehicles</li>
											<li>Pallet jack available for loads under 5000 lbs</li>
										</ul>
									</div>

								</div>
							</div>
						</div>
					</div><!-- row -->

					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-warning">
								<div class="panel-heading">RESTRICTIONS</div>
								<div class="panel-body">

									<p>If shipment is not a direct route and equipment is going to be transloaded the shipper warrants that interim loading and unloading will be done with forklifts capable of lifting <input type="text" name="restrictions_weight" value="<?php echo $restrictions_weight; ?>"> lbs without dragging, dropping or pushing.</p>

									<span class="error"><?php echo $restrictions_weightErr; ?></span>

									<p>In the event of obvious exterior damage to the crate or equipment, shipping company will allow the removal of packaging or crate to asses and photograph equipment befor removing the same from the trailer.</p>

								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="panel panel-warning">
								<div class="panel-heading">Insurance</div>
								<div class="panel-body">

									<div class="form-group">
										<div class="col-md-12">
											<input type="radio" name="insurance" <?php if (isset($insurance) && $insurance=="standard") echo "checked";?> value="standard"> Standard (Limited to 25.00 per lb)
										</div>

									</div>

									<div class="form-group">

										<div class="col-md-4">
											<input type="radio" name="insurance" value="replacement" <?php if (isset($insurance) && $insurance=="replacement") echo "checked";?> > Replacement Value
										</div>
										<div class="col-md-8">
											<input type="text" name="replacement_value" value="<?php echo $replacement_value; ?>" class="form-control" >
											<span class="error"><?php echo $replacement_valueErr; ?></span>
										</div>

									</div>

									<div class="form-group">

										<div class="col-md-4">
											<input type="radio" name="insurance" value="set" <?php if (isset($insurance) && $insurance=="set") echo "checked";?> > Set Value
										</div>
										<div class="col-md-8">
											<input type="text" name="set_value" class="form-control" value="<?php echo $set_value; ?>">
											<span class="error"><?php echo $set_valueErr; ?></span>
										</div>

									</div>

									<span class="error"><?php echo $insuranceErr; ?></span>


								</div>
							</div>

							<p>The companies quoting this shipment are not affiliated with or under contract with CJR. CJR does not profit from shipping.</p>


						</div>
					</div>

					<button class="btn btn-success col-md-offset-10" name="btn-quote2">Submit</button>

				</div><!-- page -->
			</form>



			<?php 
		}


		?>

	</div>
</section>
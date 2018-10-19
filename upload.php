<?php
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ($_FILES["file"]["error"] > 0){
    echo "Error";
}else{
    $newfile = $_FILES["file"]["name"].".png";
    move_uploaded_file($_FILES["file"]["tmp_name"], "images/rwms/" . $newfile );
}


//I tried this   $user_name= 'SOMETHING';   and works fine.
if (isSet($_POST['message'])) {
		echo $_POST['message']; //Should be 'hello'
	}else
		echo 'No key with the method of POST (key, "message") was found!';

?>
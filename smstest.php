<html>
<head>
<link rel="stylesheet" a href="styleresult.css">
</head>	
	<body>
		<center>
	
	<?php
	$mob;
 function Database(){
	$link = mysqli_connect('localhost','root','','test');
	if(!$link){
		die('connection error'.mysqli_connect_error());
	}

	if(!isset($_POST["regno"],$_POST["pass"]))
	{
		$regno = $_POST['regno'];
		$pass = $_POST['pass'];
		$sql="SELECT mobno FROM demo where 'regno'=$regno ";
	// Authorisation details.
	$res=mysqli_query($link,$sql);
	if($res==true){
		while($rows=mysqli_fetch_assoc($res))
        {
        	$mob=$rows['mobno'];
			return $mob;
        }
	}
	
	// Account details
	$apiKey = urlencode('NmQ0MTU5NmQ3NjMxNzYzNjQ3NmQ0NzUzNTU3MDM4NDM=');
	
	// Message details
	$numbers = array("91.$mob");
	$sender = urlencode('IRTT');
	$message = rawurlencode('"REGISTER NUMBER :". $regno. " <br> ". "NAME :".$name . "<br>  </div>" ." <br> ". "MA8391 :".$ma8391 . "<br>" . "CS8491 :".$cs8491 . "<br>" . "CS8492 :".$cs8492 . "<br>". "CS8451 :".$cs8451 . "<br>". "CS8493 :" .$cs8493 . "<br>". "GE8261 :" .$ge8291 . "<br>"');
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
	}
	else {
		echo "Error";
	}
	}
	Database();
?>
</center>
</body>
</html>
<?php
session_start();
include 'includes/conn.php';

if (isset($_POST['login'])) {
	$voter = $_POST['voter'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM voters WHERE voters_id = '$voter'";
	$query = $conn->query($sql);

	if ($query->num_rows < 1) {
		$_SESSION['error'] = 'Cannot find voter with the ID';
	} else {
		$row = $query->fetch_assoc();
		if (password_verify($password, $row['password'])) {
			$_SESSION['voter'] = $row['id'];
		} else {
			$_SESSION['error'] = 'Incorrect password';
		}
	}

	// store recaptcha response in a variable
	$recaptcha = $_POST['g-recaptcha-response'];

	// Put secret key here, which we get
	// from google console
	$secret_key = '6Lc7Zo4iAAAAACJ2y1VNvnZ4ZSmk5v2tpab9aJdI';

	// Hitting request to the URL, Google will
	// respond with success or error scenario
	$url = 'https://www.google.com/recaptcha/api/siteverify?secret='
		. $secret_key . '&response=' . $recaptcha;

	//   Making requert ti\o verify the capTure
	$response = file_get_contents($url);

	// parsing the response from google
	$response = json_decode($response);

	// check if the response is true or not
	if ($response->success === true) {
		echo '<script>alert("Google reCAPTACHA verified")</script>';
	} else {
		echo '<script>alert("Error in Google reCAPTACHA")</script>';
	}
} else {
	$_SESSION['error'] = 'Input voter credentials first';
}

header('location: index.php');

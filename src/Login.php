<?php

use PersonLinks\Internship\Connection;


session_start();
unset($_SESSION['UserID']);
session_destroy();

$conn = new Connection();
$db = $conn->getConnection();

if (isset($_POST["upload"])) {
	$Username = $_POST['username'];
	$Password = md5($_POST['password']);
	$Date = date('Y-m-d H:i:s');

	print_r(value: [
		'username' => $Username,
		'password'=> $Password,
		'date'=> $Date
	]);
	die();

	$sql = "SELECT * FROM users WHERE email = :email";
	$params = [
		":email" => $Username,
	];
	$query = $db->prepare($sql);
	$res = $query->execute($params);

	if ($res) {

		if ($Password == $row["password"]) {
			session_start();
			$_SESSION['UserID'] = $row['user_id'];
			$_SESSION['Name'] = $row['name'];
			$_SESSION['Role'] = $row['role'];

			header('Location: admin_home.php');
		} else {
			session_start();
			$_SESSION["LogInFail"] = 'Yes';
			echo "Incorect Username and Password Combination";
		}
	}
}

?>

<!Doctype html>
<html>

<head>
	<title>PersonLinks Internship | Login</title>
	<link rel="icon" href="images/favicon.png" type="image/png">
	<link rel="stylesheet" href="styler.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
	<div class="container">

		<!-- Sign In -->
		<div class="container__form container">
			<form action="" method="POST" enctype="multipart/form-data" class="form" id="">
				<h2 class="form__title">Login as Admin</h2>
				<input type="email" name="username" placeholder="Enter your E-mail" class="input" required="required" />
				<input type="password" name="password" placeholder="Enter your Password" class="input"
					required="required" />
				<a href="#" class="link">Forgot Password</a>
				<button class="btn" type="submit" name="upload">Sign In</button>
			</form>
		</div>
	</div>




</body>

</html>
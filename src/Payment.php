<?php
	require 'connection.php';
?>
<?php
    session_start();
	if (isset($_SESSION['UserID'])) {
		
	}
	else{
		header('Location: login.php');
	}
?>
<?php
    $UserID = $_SESSION['UserID'];
    $Name = $_SESSION['Name'];
    $Role = $_SESSION['Role'];

    $query = "SELECT * FROM register ORDER BY app_id DESC";


?>
<?php
	if (isset($_POST["logout"])) {
		session_destroy();
		header('Location: index.php');
	}
?>

<!Doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>PersonLinks Internship | Login</title>
		<link rel="icon" href="images/favicon.png" type="image/png">
		<link rel="stylesheet" href="styler.css">
		<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
   		<script src="scripts.js" defer></script>
	</head>

	<body>

		<nav class="nav">
			<i class="uil uil-bars navOpenBtn"></i>
			<a href="#" class="logo"> &nbsp;<img src="images/PL logo.png" alt="" style="width: 4%; border: 1px solid #FFF;">PersonLinks Inc.</a>
			<ul class="nav-links">
				<i class="uil uil-times navCloseBtn"></i>
				<li><a href="#">Home</a></li>
				<li><a href="#">Services</a></li>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Contact Us</a></li>
				<form method="POST" action=""><button class="btn" type="submit" name="logout">Logout</button></form>
			</ul>
			<i class="uil uil-search search-icon" id="searchIcon"></i>
			<div class="search-box">
				<i class="uil uil-search search-icon"></i>
				<input type="text" placeholder="Search here..." />
			</div>
		</nav>

		<div class="containers">
			<center><h2 class="heading1">Validate Applicant Payment <br><span>Search below by Applicant ID</span></h2></center>
			<form method="POST" action="" class="form">
				<input type="text" name="applicant_ID" placeholder="Enter Applicant ID" class="input" required="required" />
				<button class="btn" type="submit" name="search">Search</button>
			</form>

		</div>



	</body>
</html>
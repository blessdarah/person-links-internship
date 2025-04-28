<?php

    session_start();
	if (empty($_SESSION['UserID']) || !isset($_SESSION['UserID'])) {
		header('Location: login.php');
	}
	

    $UserID = $_SESSION['UserID'];
    $Name = $_SESSION['Name'];
    $Role = $_SESSION['Role'];

    //$query = $conn->query("SELECT * FROM users WHERE user_id = '$UserID'");
    //$row = mysqli_fetch_assoc($query);

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
			<center>
				<center><br><h1 class="form__title">Welcome <?php echo($Name); ?> <br><span>What do you want to do?</span></h1></center><br>
				<button class="btn"><a href="applicants.php">View Applicants List</a></button><br><br><br>
				<button class="btn"><a href="payment.php">Validate Transaction</a></button>
			</center>

		</div>



	</body>
</html>
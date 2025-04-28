<?php
	require 'connection.php';
?>
<?php
	session_start();

?>

<!Doctype html>
<html>
	<head>
		<title>The PersonLinks Internship</title>
		<link rel="icon" href="images/favicon.png" type="image/png">
		<link rel="stylesheet" href="styler.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>

	<body>
		<div class="container">
			

			<!-- Overlay -->
			<div class="container">
				<div class="messenger">
					<h2 class="heading2">Application Successful!</h2>
					
					<p>You have successfully submitted payment details for your application for internship. You will receive a receipt in your email within the next 24 hours.</p>
					<p><i>Thank you for interning with us @ PersonLinks Inc. We look forward to meeting you.</i></p>
					
					

					<div class="linker">
						<a href="index.php"><center>Back to Home</center></a>
					</div>
				</div>
			</div>
		</div>




	</body>
</html>
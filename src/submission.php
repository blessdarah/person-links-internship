<?php

	session_start();
	define("BASE_URL", "localhost:8000/")

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
					<h2 class="heading2">Pre-application Successful!</h2>
					<h3 class="heading3"><center><i>Your Applicant ID is: </i> <span class="spanner"><?php echo $_SESSION["ApplicantID"]; ?></span> <br><span><b>NB: </b> You will need this during payment</span></center></h3>
					<p>You have successfully submitted your application for internship. Fully secure your position and proceed to make your payments as slated below.</p>
					<p><i>Make your payment either by MTN mobile money or by Orange money. Take a screenshot and return to the home page to enter your payment details accordingly. USE YOUR <b>Applicant ID</b> as your payment reference.</i></p>
					<center><b>1 Month</b> (XAF 20,000) | <b>2 Months</b> (XAF 40,000)</center>
					<h4 class="heading4"><center>Payment Account Details</center></h4>

					<center>
						<table>
							<tr>
								<th> </th>
								<th>MTN (MoMo)</th>
								<th>Orange (OM)</th>
							</tr>
							<tr>
								<td><b>Acc Num: </b></td>
								<td>678686249</td>
								<td>659496501</td>
							</tr>
							<tr>
								<td><b>Acc Name: </b></td>
								<td> TANGUH MUNJAM </td>
								<td> TANGUH MUNJAM </td>
							</tr>
						</table>
					</center>

					<div class="linker">
						<a href="<?= BASE_URL; ?>"><center>Proceed to payments</center></a>
					</div>
				</div>
			</div>
		</div>




	</body>
</html>
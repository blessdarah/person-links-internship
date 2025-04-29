<?php
require __DIR__.'/vendor/autoload.php';

use Dotenv\Dotenv;
use PersonLinks\Internship\Connection;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$db = Connection::getInstance();

if (isset($_POST['register'])) {
    $Fullname = $_POST['name'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $School = $_POST['school'];
    $Speciality = $_POST['speciality'];
    $Referral = $_POST['referral'];
    $Comments = $_POST['comments'];
    $Applicant_ID = strtoupper(substr(
        $Fullname,
        0,
        3
    ).rand(100, 999));

    $to = "$Email";
    $subject = 'Internship Pre-application Successful!';
    $headers = "From: no-reply@personlinks.org\n\n";
    $message = 'Your Applicant ID is: '.$Applicant_ID.
        '. Take note of it because you will need it during payment'.
        "\nYou have successfully submitted your application for internship".
        'To fully secure your position, proceed and make your payments as slated below.'.
        "\n Make your payment either by MTN mobile money or by Orange money.".
        'Take a screenshot and return to the home page to enter your payment details accordingly.'.
        "USE YOUR Applicant ID as your payment reference.\n\n One Month (XAF 20,000) \t Two Months (XAF 40,000)\nMTN - Momo (678686249) \t Orange - OM (659496501)\nAccount name: TANGUH MUNJAM";

    $sql = 'INSERT INTO register (applicant_id, fullname, email, phone, school, speciality, referral, comments) VALUES 
		(:appId, :fullname, :email, :phone, :school, :speciality, :referral, :comments)';
    $query = $db->prepare($sql);
    $result = $query->execute([
        'appId' => $Applicant_ID,
        'fullname' => $Fullname,
        'email' => $Email,
        'phone' => $Phone,
        'school' => $School,
        'speciality' => $Speciality,
        'referral' => $Referral,
        'comments' => $Comments,
    ]);

    if ($result) {

        $statusMsg = 'Application Successful!';
        $mail = new PHPMailer;

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = getenv('MAIL_HOST');
        $mail->SMTPAuth = true;
        $mail->Username = getenv('MAIL_USER');
        $mail->Password = getenv('MAIL_PASSWORD');
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = getenv('MAIL_PORT');

        // Recipients
        $mail->setFrom(
            getenv('MAIL_DEFAULT_FROM'),
            getenv('APP_NAME')
        );

        $mail->addAddress($to, $Fullname);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Sample subject';
        $mail->Body = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        session_start();
        $_SESSION['ApplicantID'] = $Applicant_ID;
        $_SESSION['Fullname'] = $Fullname;
        header('Location: src/submission.php');
    } else {
        $statusMsg = 'Connection Failed!';
    }
    echo $statusMsg;
}

if (isset($_POST['upload'])) {
    $ApplicantID = $_POST['applicant_id'];
    $Phone = $_POST['phone'];
    $amount = $_POST['amount'];
    $TransactionID = $_POST['transaction_id'];
    $Date = date('Y-m-d H:i:s');

    $targetDir = 'src/uploads/';
    $fileName = $ApplicantID.basename($_FILES['file']['name']);
    $targetFilePath = $targetDir.$fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $sql = 'SELECT * FROM register WHERE applicant_id = :id';
    $query = $db->prepare($sql);
    $query->execute([
        'id' => $ApplicantID,
    ]);

    $row = $query->fetch();
    // if not found, create new record
    if (! $row) {
        $statusMsg = 'You need to register first';
    } else {

        $Amounts = $row['amount_paid'] + $amount;

        if (! empty($_FILES['file']['tmp_name'])) {
            // Allow certain file formats
            $allowTypes = ['jpg', 'png', 'jpeg', 'JPG', 'JPEG', 'PNG', ''];

            if (in_array($fileType, $allowTypes)) {
                // Upload file to server
                if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                    // Insert image file name into database
                    $sql = 'UPDATE register 
						SET amount_paid = :amounts, 
						trans_id = :transId, 
						screenshot = :screenshotPath, 
						uploaded_on = :uploadedOn 
						WHERE applicant_id = :appId';

                    $query = $db->prepare($sql);
                    $result = $query->execute([
                        'transId' => $TransactionID,
                        'screenshot' => $targetFilePath,
                        'uploadedOn' => $Date,
                    ]);
                    header('Location: src/submission2.php');

                    if ($result) {
                        $statusMsg = 'Application Successful!';
                    } else {
                        $statusMsg = 'File upload failed, please try again.';
                    }
                } else {
                    $statusMsg = 'Sorry, there was an error uploading your file.';
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
            }
        }
    }

    echo $statusMsg;
}

?>

<!Doctype html>
<html>

<head>
	<title>The PersonLinks Internship</title>
	<link rel="icon" href="src/images/favicon.png" type="image/png">
	<link rel="stylesheet" href="src/styler.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

	<div class="container right-panel-active">
		<!-- Sign Up -->
		<div class="container__form container--signup">
			<form action="" method="POST" class="form" id="">
				<h2 class="form__title">Internship Registration</h2>
				<input type="text" name="name" placeholder="Full name" class="input" required="required" />
				<input type="email" name="email" placeholder="E-mail address" class="input" required="required" />
				<input type="number" name="phone" placeholder="Phone number" class="input" required="required" />
				<input type="text" name="school" placeholder="Your school" class="input" required="required" />
				<input type="text" name="speciality" placeholder="Your speciality" class="input" required="required" />
				<input type="text" name="referral" placeholder="Referred by" class="input" />
				<textarea name="comments" class="input" placeholder="Any comments"></textarea>
				<button class="btn" type="submit" name="register">Register</button>
			</form>
		</div>

		<!-- Sign In -->
		<div class="container__form container--signin">
			<form action="" method="POST" enctype="multipart/form-data" class="form" id="">
				<h2 class="form__title">Upload Payment Details</h2>
				<input type="text" name="applicant_id" placeholder="Applicant ID" class="input" required="required" />
				<input type="number" name="phone" placeholder="Phone number" class="input" required="required" />
				<input type="number" name="amount" placeholder="Amount" class="input" required="required" />
				<input type="number" name="transaction_id" placeholder="Transaction ID" class="input"
					required="required" />
				<a href="#" class="link">Upload a screenshot of the transaction</a>
				<input type="file" name="file" id="file" placeholder="Screenshot" class="input" />
				<button class="btn" type="submit" name="upload">Upload</button>
			</form>
		</div>

		<!-- Overlay -->
		<div class="container__overlay">
			<div class="overlay">
				<div class="overlay__panel overlay--left">
					<button class="btn" id="signIn">Upload Payment Details</button>
				</div>
				<div class="overlay__panel overlay--right">
					<button class="btn" id="signUp">Register for Internship</button>
				</div>
			</div>
		</div>
	</div>


	<script src="src/scripter.js"></script>

</body>

</html>

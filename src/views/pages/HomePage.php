<?php require APP_ROOT.'/views/partials/header.php'; ?>
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
<?php require APP_ROOT.'/views/partials/footer.php'; ?>

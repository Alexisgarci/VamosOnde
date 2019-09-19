<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title>Register</title>
	<base href="<?=base_url();?>">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body class="login_body">
	<div class="login_page">	
	</div>
	<div class="login_container">

		<a class="login_logo" href="">
           <img src="assets/images/lettering_logo_white.svg">
        </a>

        <br>

        <?php if (validation_errors()): ?>
			<div class="error_msg_container">
				<img class="error_close" src="assets/images/close.svg">
				<div>
					<?php echo validation_errors(); ?>
				</div>
			</div>
		<?php endif ?>

		<form method="post" action="users/do_register" class="login_form">

			<label>Username <?php if (form_error('username')) {echo "<span style='color:red'>*</span>";} ?></label>
			<input type="text" name="username" value="<?php echo set_value('username'); ?>">

			<label>Email <?php if (form_error('email')) {echo "<span style='color:red'>*</span>";} ?></label>
			<input type="text" name="email" value="<?php echo set_value('email'); ?>">

			<label>Confirmar Email <?php if (form_error('confirm_email')) {echo "<span style='color:red'>*</span>";} ?></label>
			<input type="text" name="confirm_email" value="<?php echo set_value('confirm_email'); ?>">

			<label>Password <?php if (form_error('password')) {echo "<span style='color:red'>*</span>";} ?></label>
			<input type="password" name="password">

			<label>Confirmar Password <?php if (form_error('confirm_password')) {echo "<span style='color:red'>*</span>";} ?></label>
			<input type="password" name="confirm_password">

			<button>Registar</button>

		</form>

		<a class="register_button" href="users/login">Já tenho conta</a>

	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>

</body>
</html>
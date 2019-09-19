<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<title>Login</title>
	<base href="<?=base_url();?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css?v=<?=time();?>">
</head>
<body class="login_body">

<div class="login_page">
</div>

<div class="login_container">

		<a class="login_logo" href="">
            <img src="assets/images/lettering_logo_white.svg">
        </a>

        <?php if ($this->session->flashdata('msg') || validation_errors()): ?>
			<div class="error_msg_container">
				<img class="error_close" src="assets/images/close.svg">
				<div>
					<?php echo $this->session->flashdata('msg');?><?php echo validation_errors(); ?>
				</div>
			</div>
		<?php endif ?>

		<form method="post" action="users/do_login" class="login_form">
			<label>Username ou Email</label>
			<input type="text" name="username" <?php if (get_cookie('username')) { ?> value="<?=get_cookie('username');?>" <?php } ?>>
			<label>Password</label>
			<input type="password" name="password" <?php if (get_cookie('password')) { ?> value="<?=get_cookie('password');?>" <?php } ?>>
			<p>
				<input class="checkbox" type="checkbox" name="chkremember" value="Remember me" <?php if (get_cookie('username')) { ?> checked="checked" <?php } ?>>
				<label>Remember me</label>
			</p>
			<button>Entrar</button>

		</form>

		<div class="fb_login_container">
			<i class="fab fa-facebook-square" style="color: #fff; font-size: 30px; margin: 30px;"></i>
			<p>Entrar com o Facebook</p>
		</div>

		<a class="register_button" href="users/register">Criar uma conta</a>

	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
</body>
</html>

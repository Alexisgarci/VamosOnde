<main>

<section class="my_account">

<!-- container -->
<div class="container1000">

<!-- ACCOUNT PROFILE -->
	<div class="my_account_profile card">
		<figure>
					<div class="blackphoto">
						<p>Mudar foto</p>
						 <i class="fas fa-camera"></i>
					</div>
			<img src="assets/images/users/<?=$profile['image'];?>" id="blackphoto_img">
		</figure>
		<p> <?=$profile['email'];?></p>
		</div>
<!-- #ACCOUNT PROFILE -->
<!-- ACCOUNT PASSWORD -->
<div class="password_email_change_card">
	<div class="my_account_passord card card_to_open <?php if($this->session->flashdata('change_pass')){echo"card_open";} ;?>">
		<div class="card_title">
			<p>Mudar a Password</p>
			<div class="card_is">
				<i class="fas fa-plus"></i>
				<i class="fas fa-minus"></i>
			</div>

		</div>
		<?php if ($this->session->flashdata('change_pass')): ?>
			<div class="error_msg_container" id="change_pass_error_close">
				<img class="error_close" src="assets/images/close.svg">
				<div>
					<?php echo $this->session->flashdata('change_pass'); ?>
				</div>
			</div>
		<?php endif ?>
		<form method="post" action='users/change_password' id="change_pass_form" class="nosso_form">
				<label>Password atual</label>
				<input type="password" name="old_pass" placeholder="Password atual"/><br /><br />
				<label>Nova Password</label>
				<input type="password" name="new_pass" placeholder="Nova Password"/><br/><br />

				<label>Confirmar Password</label>
				<input type="password" name="confirm_pass" placeholder="Confirmar Password"/><br/><br />
				<input type="submit" name="change_pass"/><br />
		</form>
		</div>
		<div class="my_account_email card card_to_open <?php if($this->session->flashdata('change_email')){echo"card_open";} ;?>">
			<div class="card_title">
				<p>Mudar o Email</p>
				<div class="card_is">
					<i class="fas fa-plus"></i>
					<i class="fas fa-minus"></i>
				</div>
			</div>
			<?php if ($this->session->flashdata('change_email')): ?>
				<div class="error_msg_container" id="change_pass_error_close">
					<img class="error_close" src="assets/images/close.svg">
					<div>
						<?php echo $this->session->flashdata('change_email'); ?>
					</div>
				</div>
			<?php endif ?>
			<form method="post" action='users/change_email' class="nosso_form">
				<label>Novo Email</label><br>
				<input type="text" name="new_email" placeholder="Novo Email"/><br /><br />
				<label>Confirmar Email</label>
				<input type="text" name="new_confirm_email" placeholder="Confirmar Email"/><br/><br />
				<label>Password</label><br>
				<input type="password" name="change_email_password" placeholder="Password"/><br/><br />
				<input type="submit" name="change_email"/><br />
			</form>
		</div>
		<div class="my_account_delete card card_to_open <?php if($this->session->flashdata('delete_account')){echo"card_open";} ;?>">
			<div class="card_title">
				<p>Apagar a conta</p>
				<div class="card_is">
					<i class="fas fa-plus"></i>
					<i class="fas fa-minus"></i>
				</div>
			</div>
			<div class="delete_account_confirm">
				<?php if ($this->session->flashdata('delete_account')): ?>
					<div class="error_msg_container" id="delete_account_error_close">
						<img class="error_close" src="assets/images/close.svg">
						<div>
							<?php echo $this->session->flashdata('delete_account'); ?>
						</div>
					</div>
				<?php endif ?>
				<p>Tens a certeza?</p>
				<p>Eliminar o seu perfil do VamosOnde é uma ação permanente. Para voltar a utilizar as funcionalidades de utilizador, tem que criar um novo perfil.</p>
				<form method="post" action='users/delete_account'>
					<input id="delete_account_password" type="password" name="delete_account_password" placeholder="Insere a tua Password" required>
					<input id="delete_account_submit" type="submit" name="submit" value="Apagar a conta">
				</form>
			</div>
		</div>
		<?php
	 	if ($_SESSION['permissions'] == 2):?>
	<div class="my_account_party_manage card card_to_open card_event">
		<div class="card_title ">
			<p>Adicionar Novo Evento</p>
			<div class="card_is">
				<i class="fas fa-plus"></i>
				<i class="fas fa-minus"></i>
			</div>
		</div>
		<form method="post" action='locals/creat_event' class="nosso_form">
			<label>Nome Do Evento</label><br>
			<input type="text" name="event_name" placeholder="Nome Do Evento"/><br><br>
			<label>Descrição Do Evento</label>
			<input type="text" name="event_text" placeholder="Confirmar Email"/><br><br>
			<label>Data do evento</label><br>
			<script>

		  </script>
			 Start <input class="short_input" type="date" name="start_date" placeholder="Start"/><br>

			End <input class="short_input input2" type="date"name="end_date" placeholder="End"/>

			<br><br>

			<input type="submit" name="add_event"/><br />
		</form>
	</div>
<?php endif;?>

</div>

<!-- #ACCOUNT PASSWORD -->




<?php
 	if ($_SESSION['permissions'] == 1):?>

<!-- ACCOUNT FAVORITES -->
<div class="my_account_favorites">

<?php if (isset($favorites) && !empty($favorites)): ?>
	
	<?php foreach ($favorites as $f_local): ?>
<!-- EACH FAVORITE -->
	<div class="favorites_card card">

		<a href="locals/show/<?=$f_local['id'];?>"><i class="fas fa-eye open_favorite"></i></a>
		<img class="delete_favorite" src="assets/images/close.svg" data-user_id="<?=$this->session->userdata('user_id');?>" data-local_id="<?=$f_local['id'];?>">

		<div>
			<img src="assets/images/locals/<?=$f_local['image'];?>">
		</div>

<!-- Favorites card info -->
		<div class="favorites_card_info">

				<div class="favorites_name_cat">
					<h1><?=$f_local['name'];?></h1>
					<p><?=$f_local['category'];?></p>
				</div>
				<div class="favorites_ranking_location">
					<div class="favorites_ranking">
						<div class="stars-outer" data-ranking="<?=$f_local['ranking'];?>">
				        	<div class="stars-inner"></div>
				        </div>
					</div>

					<div class="favorites_location">
						<p><i class="fas fa-map-marker-alt"></i> <?=$f_local['adress'];?></p>
					</div>
				</div>

		</div>
<!-- #Favorites card info -->

	</div>
		<?php endforeach ?>
<!-- #EACH FAVORITE -->
<?php else :?>
	<p>Não tens nenhum favorito adicionado.</p>
<?php endif ?>
</div>
<!-- #ACCOUNT FARORITES -->

<!-- PERMISSIONS VERIFICATION -->
<?php  elseif ($_SESSION['permissions'] == 2):?>

	<!-- ACCOUNT PARTYS -->
	<div class="my_account_partys">


			<?php foreach ($local_partys as $party):?>
		<!-- EACH PARTY -->
			<?php if ($party['active'] == 2):?>

				<div class="partys_card card">

					<div class="partys_card_image">
						<img src="assets/images/locals/<?=$party['image'];?>">
					</div>

	<!-- PARTYS card info -->
					<div class="partys_card_info">

					<div class="partys_name_cat">
						<h1><?=$party['title'];?></h1>
						<p>Alternativo, Eletrônica, Techno</p>
					</div>
					<div class="partys_ranking_location">
						<div class="partys_ranking">

					<?=$party['ranking'];?>

						</div>

						<div class="partys_location">
							<p><i class="fas fa-map-marker-alt"></i> Aqui era o local</p>
						</div>
					</div>

			</div>
	<!-- #PARTYS card info -->

		</div>
							<?php endif;?>
<!-- #EACH PARTYS -->
						<?php endforeach;?>

	</div>
<!-- #ACCOUNT PARTYS -->

<?php endif;?>
<!-- #PERMISSIONS VERIFICATION -->

	</div>
<!-- #container -->

</section>
<section class="header_show">
	<div class="header_show_container">
		<div class="logo_show">
			<a href="#"><img src="assets/images/lettering_logo_white.svg"></a> 
		</div>

<!-- START SEARCH BAR -->

		<div class="header_search_bar">

 				<img class="search_icon" src="assets/images/search.svg" width="20px">
 				<img class="search_back" src="assets/images/search_back.svg" width="20px">

					<form class="search_form" action="locals/search">

						<input id="header_search_bar" type="text" name="search" placeholder="            Pesquisa por nome, cidade, estilo musical..." onclick="open_search_header()" autocomplete="off">

				  			<img class="search_close" id="header_seach_close" src="assets/images/close.svg">
	<!-- CATEGORIES -->
						<div id="header_hidden_search">

							<div class="hidden_search_content">

								<p>Destaques</p>

								<div class="destaques_grid search_grid">
									<a href="">trending</a>
									<a href="">top ranking</a>
									<a href="">mais visitados</a>
									<a href="">novos locais</a>
								</div>

								<p>Pesquisa por categoria</p>

								<div class="categories_grid search_grid">

									<?php foreach ($categories as $item): ?>
										<a href="<?=$item['id'];?>"><?=$item['category'];?></a>
									<?php endforeach ?>

								</div>

							</div>

							<div class="hidden_search_results">


							</div>

						</div>
	<!-- #CATEGORIES -->
					</form>

		</div>
<!-- START SEARCH BAR -->

	<div class="header_show_user">
		<i id="mobile_search_open" class="fas fa-search"></i>
			
			<?php if ($check_login == false): ?>
					
				<div class="no_login box_menus">
					<div class="fazer_login">
						<a href="users/login">Iniciar Sessão</a>
					</div>
					<div class="fazer_registo">
						<a href="users/register">Registar</a>
					</div>
				</div>

				<div class="mobile_login_button">
					<a href="users/login"><i class="far fa-user"></i></a>
				</div>

			<?php else :?>

				<div class="yes_login box_menus">
					<figure>
						<div class="header_show_user_profile mini_menu">
			               <i class="fas fa-caret-down"></i>
			              <p><?=$profile['username'];?></p>
			              <img src='assets/images/users/<?=$profile['image'];?>'>
			            </div>
					</figure>
				</div>
				<div class="menu_to_slide box_menus">
					<div class="nav_menu_menu">
						<i class="fas fa-caret-up"></i>
						<a href="users/profile">Perfil</a>
						<a href="locals/go_map">Mapa</a>
						<a href="users/profile">Ajuda</a>
						<a href="users/profile">Contactos</a>
						<a href="users/logout">Sair</a>
					</div>
				</div>

			<?php endif ?>

		</div>

	</div>
</section>
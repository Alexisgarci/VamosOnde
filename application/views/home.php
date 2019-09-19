<main>

<nav class="nav_bar">
  <i id="mobile_search_open" class="fas fa-search" style="<?php if ($check_login) {echo "top: 40%";}?>"></i>

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
</nav>

<div class="blackscreen_all"></div>

 <!-- SEARCH CONTAINER  -->
 		<div class="search_container">
<!-- SEARCH BAR -->
<!-- SEARCH BAR -->
<div class="hero_text">
	<img src="assets/images/lettering_logo_white.svg">
	<h3>Descobre onde vais beber o teu proximo copo!</h3>
</div>
 			<div class="search_bar">

 				<img class="search_icon" src="assets/images/search.svg" width="20px">
 				<img class="search_back" src="assets/images/search_back.svg" width="20px">

					<form class="search_form" action="locals/search">

						<input id="search_bar" type="text" name="search" placeholder="Pesquisa por nome, cidade, estilo musical..." onclick="open_search_home()" autocomplete="off">

						<img class="search_close" id="home_search_close" src="assets/images/close.svg">
	<!-- CATEGORIES -->
						<div id="hidden_search">

							<div class="hidden_search_content">

								<p>Os mais pesquisados</p>

								<div class="destaques_grid search_grid">
									<a href="">Trending</a>
									<a href="">Top Ranking</a>
									<a href="">Mais Visitados</a>
									<a href="">Novos Locais</a>
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
	<!-- #SEARCH BAR -->
			</div>
<!-- SEARCH CONTAINER  -->

<!-- HOME MAP -->
			<div class="home_map">
<!-- BLACKSCREEN -->
			<div class="blackscreen"></div>
<!-- #BLACKSCREEN -->

	    	<div id="map"></div>
        <script>
          // Note: This example requires that you consent to location sharing when
          // prompted by your browser. If you see the error "The Geolocation service
          // failed.", it means you probably did not give permission for the browser to
          // locate you.
          var map, infoWindow;
          function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: 38.708864, lng: -9.143286},
              zoom: 14
            });
            infoWindow = new google.maps.InfoWindow;

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude
                };

                infoWindow.setPosition(pos);
                infoWindow.setContent('Estás aqui!');
                infoWindow.open(map);
                map.setCenter(pos);
                map.setZoom(17);
              }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
              });
            } else {
              // Browser doesn't support Geolocation
              handleLocationError(false, infoWindow, map.getCenter());
            }
          }

          function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                                  'Error: The Geolocation service failed.' :
                                  'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
          }
        </script>

		</div>
<!-- #HOME MAP -->

<!-- 	SECTION TRENDING -->
	<section class="trending">

<!-- 	CONTAINER -->
		<div class="container">
			<h2>TRENDING</h2>
<!-- 	TRENDING PLACES -->
			<div class="trending_places">

				<?php
          $i = 0;
          foreach ($trending as $trending_local):
        ?>

				<a href="locals/show/<?=$trending_local['id'];?>">
					<div class="trending_place card">
					<div>
						<img src="assets/images/locals/<?=$trending_local['id'];?>/<?=$trending_local['image'];?>">
					</div>
					<div class="trending_place_info">
						<div class="favorites_name_cat">
							<h1><?=$trending_local['name'];?></h1>
							<p id="categories_p"><?=$trending_local['category'];?></p>
						</div>
							<div class="trending_ranking_location">
						<div class="trending_ranking">
							<div class="stars-outer" data-ranking="<?=$trending_local['ranking'];?>">
					        	<div class="stars-inner"></div>
					        </div>
						</div>

					</div>
					<div class="trending_location">
						<p><i class="fas fa-map-marker-alt"></i> <?=$trending_local['adress'];?></p>
					</div>
						</div>
					</div>
					</a>

      <?php
          $i++;
          if($i==3) break;
          endforeach;
          ?>

			</div>
      <!-- #TRENDING PLACES -->
    </div>
  </section>

  <section class="pesquisa_rapida">
      <div class="container">
          <div class="sections_banner card">

            <h2>Pesquisa Rápida</h2>

            <div class="pesquisa_rapida_types">


              <?php foreach ($music_random as $category):?>
                <a href="locals/quick_search_music/<?=$category['id'];?>">
                  <div class="music_type_random">

                    <?=$category['category'];?>
                    <img src="assets/images/musicIcons/<?=$category['music_type_icon'];?>" alt="">

                  </div>
                </a>
              <?php endforeach;?>

            </div>
        <!-- #PESQUISA RAPIDA TYPES -->
          </div>
      <!-- #SECTIONS BANNER CARD -->
    </div>
  </section>

  <section class="top_ranking_places">
    <div class="container">
          <h2>top ranking</h2>
          <!-- 	TRENDING PLACES -->
                <div class="trending_places">

                  <?php
                    $i = 0;
                    foreach ($ranking as $local_rank):
                  ?>

                  <a href="locals/show/<?=$local_rank['id'];?>">
                    <div class="trending_place card">
                    <div>
                      <img src="assets/images/locals/<?=$local_rank['id'];?>/<?=$local_rank['image'];?>">
                    </div>
                    <div class="trending_place_info">
                      <div class="favorites_name_cat">
                        <h1><?=$local_rank['name'];?></h1>
                        <p id="categories_p"><?=$local_rank['category'];?></p>
                      </div>
                        <div class="trending_ranking_location">
                      <div class="trending_ranking">
                        <div class="stars-outer" data-ranking="<?=$local_rank['ranking'];?>">
                          <div class="stars-inner"></div>
                        </div>
                      </div>

                    </div>
                    <div class="trending_location">
                      <p><i class="fas fa-map-marker-alt"></i> <?=$local_rank['adress'];?></p>
                    </div>
                      </div>
                    </div>
                    </a>

                <?php
                    $i++;
                    if($i==3) break;
                    endforeach;
                ?>

                </div>
              </div>
      </section>



</main>

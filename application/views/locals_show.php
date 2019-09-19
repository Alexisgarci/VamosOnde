

<section class="locals_showid">

	<div class="local_show_container">


		<?php if(isset($local_show) && !empty($local_show)):?>

		<div class="local_card" id="show_card">

		<div class="show_card_image">
			<img src="assets/images/locals/<?=$local_show['id'];?>/<?=$local_show['image'];?>">
		</div>

<!-- Favorites card info -->
		<div class="show_card_info">

				<div class="show_name_cat">
					<h1><?=$local_show['name'];?></h1>
					<p><?=$local_show['category'];?></p>
				</div>
				<div class="show_ranking_location">
					<div class="show_ranking">
						<div class="stars-outer" data-ranking="<?=$local_show['ranking'];?>">
				        	<div class="stars-inner"></div>
				        </div>
					</div>

					<div class="show_location">
						<p><i class="fas fa-map-marker-alt"></i> <?=$local_show['adress'];?></p>
					</div>


				</div>
				<div class="line"></div>
				<div class="show_buttons">

						<div class="show_info_buttons show_info_buttons_click locals_button_info" data-user_id="<?=$this->session->userdata('user_id');?>" data-local_id="<?=$local_show['id'];?>" data-button="favorites">
						<div class="show_info_buttons_i">
							<i class="fas fa-bookmark"></i>
						</div>
						<div class="show_info_buttons_text <?php if($this->session->userdata('user_id') && $check_favorite == true){echo"clicked_button";}?>">
							<?php if ($this->session->userdata('user_id')) {
								if($check_favorite == false){
									echo"Adicionar aos favoritos";
								}else{
									echo "Adicionado aos favoritos";}
								}else{
									echo"Adicionar aos favoritos";
							}?>
						</div>
					</div>

					<div class="show_info_buttons show_info_buttons_click locals_button_info" data-user_id="<?=$this->session->userdata('user_id');?>" data-local_id="<?=$local_show['id'];?>" data-button="visited">
					<div class="show_info_buttons_i">
						<i class="fas fa-map-marker-alt"></i>
					</div>
					<div class="show_info_buttons_text <?php if($this->session->userdata('user_id') && $check_visited == true){echo"clicked_button";}?>">
						<?php if ($this->session->userdata('user_id')) {
								if($check_visited == false){
									echo"Marcar como visitado";
								}else{
									echo "Visitado";}
								}else{
									echo"Marcar como visitado";
							}?>
					</div>
				</div>

				<div class="show_info_buttons2 show_info_buttons_click locals_button_ranking <?php if($this->session->userdata('user_id') && $local_ranking['ranking_given']){echo"ranking_given";}?>" data-button="ranking" data-user_id="<?=$this->session->userdata('user_id');?>" data-local_id="<?=$local_show['id'];?>">
				<div class="show_info_buttons_i">
					<i class="fas fa-star"></i>
				</div>
				<div class="show_info_buttons_text">
					<p class="<?php if($this->session->userdata('user_id') && $local_ranking['ranking_given']){echo"displaynonethis";}?>">Avaliar</p>

					<div class="stars_ranking <?php if($this->session->userdata('user_id') && $local_ranking['ranking_given']){echo "ranking_ja_foi_dado";}?>">

						<div class="estrelas1 estrelas">
							<i class="far fa-star vazia1 vazia" id="vazia1"></i>
							<i class="fas fa-star cheia <?php if($this->session->userdata('user_id') && $local_ranking['ranking_given'] >=1){echo"displayblockthis";}?>" id="cheia1" data-ranking="1"></i>
						</div>
						<div class="estrelas2 estrelas">
							<i class="far fa-star vazia2 vazia" id="vazia2"></i>
							<i class="fas fa-star cheia <?php if($this->session->userdata('user_id') && $local_ranking['ranking_given'] >=2){echo"displayblockthis";}?>" id="cheia2" data-ranking="2"></i>
						</div>
						<div class="estrelas3 estrelas">
							<i class="far fa-star vazia3 vazia" id="vazia3"></i>
							<i class="fas fa-star cheia <?php if($this->session->userdata('user_id') && $local_ranking['ranking_given'] >=3){echo"displayblockthis";}?>" id="cheia3" data-ranking="3"></i>
						</div>
						<div class="estrelas4 estrelas">
							<i class="far fa-star vazia4 vazia" id="vazia4"></i>
							<i class="fas fa-star cheia <?php if($this->session->userdata('user_id') && $local_ranking['ranking_given'] >=4){echo"displayblockthis";}?>" id="cheia4" data-ranking="4"></i>
						</div>
						<div class="estrelas5 estrelas">
							<i class="far fa-star vazia5 vazia" id="vazia5"></i>
							<i class="fas fa-star cheia <?php if($this->session->userdata('user_id') && $local_ranking['ranking_given'] >=5){echo"displayblockthis";}?>" id="cheia5" data-ranking="5"></i>
						</div>
					</div>

				</div>
			</div>

			<div class="show_info_buttons show_info_buttons_click" data-button="todos_eventos">
			<div class="show_info_buttons_i">
				<i class="fas fa-map-marker-alt"></i>
			</div>
			<div class="show_info_buttons_text">
				Todos os Eventos
			</div>
		</div>

				</div>
<!-- #SHOW BUTTONS -->

		</div>
<!-- #Favorites card info -->

	</div>

		<?php else:?>
			<p>Não existem resultados</p>
		<?php endif;?>

		<div class="local_card" id="local_resume">
		<div class="show_adress">
			<div class="local_adress_resume">
			<p class="local_resume_title">Morada</p>
			<span><?=$local_show['adress'];?></span><i class="fas fa-map-marker-alt"></i>
		</div>
			<div class="show_adress_map">
				<img src="assets/images/mini_mapa.jpg">
				<div class="local_resume_map_overlay">Abrir no mapa</div>
			</div>
		</div>
		<div>
			<p class="local_resume_title">Horário</p>
			<span>Das <?=$local_show['opening'];?>h às <?=$local_show['closing'];?>h</span>
		</div>

	</div>

	<div class="local_card galeria_locals">

		<section class="gallery_container">
				<!-- Main image -->
				<div id="main_image_gallery_container">
					<img src="assets/images/locals/<?=$local_show['id'];?>/<?=$gallery[0];?>" id="main_image_gallery"/>
				</div>
				<!-- Thumbnails -->
				<div id="thumbnails">

					<?php foreach ($gallery as $thumb): ?>
						<div>
							<img src="assets/images/locals/<?=$local_show['id'];?>/<?=$thumb;?>" class="thumb"/>
						</div>
					<?php endforeach ?>
				</div>
		</section>

	</div>

	<div class="local_card" id="events_card">

		<?php if (isset($events) && !empty($events)): ?>
			<?php foreach ($events as $event): ?>
				<div class="event_row">
					<div class="event_calendar">
						<span>
							<?php setlocale(LC_TIME, "pt_BR", 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); ?>
							<?php echo strftime('%b', strtotime($event['start_date'])); ?>
						</span>
						<span><?=date('d', strtotime($event['start_date']));?></span>
					</div>
					<div class="event_details">
						<h4><?=$event['title'];?></h4>
						<p><?php setlocale(LC_TIME, "pt_BR", 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); ?>
							<?=date('d', strtotime($event['start_date']));?> de <?php echo strftime('%B', strtotime($event['start_date'])); ?> // das <?=date('H:i', strtotime($event['start_date']));?>h às <?=date('H:i', strtotime($event['end_date']));?>h WET, GMT+1</p>
					</div>

				</div>
			<?php endforeach ?>
		<?php else:?>
			<h1>Local sem eventos futuros.</h1>
	<?php endif;?>
	</div>

	</div>
	<!-- #ENDCONTAINER -->
</section>



	<section class="search_results_musictype">


		<?php if(isset($quick_search_type) && !empty($quick_search_type)):?>

		<!-- 	CONTAINER -->
				<div class="container">
					<h2>Resultados da Pesquisa</h2>
		<!-- 	TRENDING PLACES -->
					<div class="quicksearchtype">

						<?php foreach ($quick_search_type as $trending_local): ?>

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
		      <?php endforeach; ?>

				</div>
			</div>
		</section>

	<?php else:?>

			<h2 id="quicksearchmusictypeh2">Não existem locais com esse tipo de música activos!</h2>

			<?php endif;?>

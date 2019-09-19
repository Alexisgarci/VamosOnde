<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<base href="<?=base_url();?>">
	<title>Vamos Onde?</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css?v=<?=time();?>">
</head>

<body>

		<header>
			<!-- Alert para delete account -->
			<?php if ($this->session->flashdata('deleted_account')): ?>
				<script type='text/javascript'>alert("<?=$this->session->flashdata('deleted_account')?>");</script>
			<?php endif ?>

			<div class="mobile_search_container">

				<img src="assets/images/lettering_logo_white.svg">
				<div>
					<img id="mobile_search_close" src="assets/images/close.svg">
				</div>

				<form class="search_form" action="locals/search">

					<img class="search_icon" src="assets/images/search.svg" width="25px">
					<img class="search_back" src="assets/images/search_back.svg" width="20px">

					<input id="mobile_search_input" type="text" name="search" placeholder="Pesquisa por nome, cidade, estilo musical..." autocomplete="off">

					<div id="mobile_hidden_search">

						<div class="hidden_search_content">

							<br>

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

				</form>

			</div>

		</header>

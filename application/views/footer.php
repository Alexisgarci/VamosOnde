

<footer>

	<div class="container_footer">
				<div class="footer_infos">
					<h5>Email</h5>
					<p>hello@vamosonde.pt</p>
					<p>support@vamosonde.pt</p>
				</div>

				<div class="footer_infos">
					<h5>Mapa</h5>
					<a href="locals/go_map"><p>Ver Mapa</p></a>
				</div>
				<div class="footer_infos">
					<h5>Ajuda</h5>
					<a href="users/register"><p>Registar</p></a>
					<p>Como Navegar?</p>
				</div>
				<div class="footer_infos">
					<h5>Redes Sociais</h5>
					<div class="footer_social">
						<a href="https://www.facebook.com" target="_blank" class="footer_a"><i class="fab fa-facebook-f"></i></a>
						<a href="https://www.instagram.com" target="_blank" class="footer_a"><i class="fab fa-instagram"></i></a>
						<a href="https://www.twitter.com" target="_blank" class="footer_a"><i class="fab fa-twitter"></i></a>
					</div>
				</div>
		</div>
	<!-- #CONTAINER FOOTER -->

</footer>






	<?php if ($page == 'home' || $page == 'only_map') {
		echo "<script async defer
		    src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDhLV4KOaDD5U9SmG5Y-uJ51ph5jWWsRFI&callback=initMap'>
		    </script>";
	}?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
  </body>
</html>


// ABRIR A SEARCH DO HEADER_SHOW
function open_search_header() {
	$('#header_hidden_search').slideDown(300);
	$('#header_search_bar').css({"border-radius": "0px"});
	$('.search_close').fadeIn();
}

// ABRIR A SEARCH DA HOME
function open_search_home() {
	$('#hidden_search').slideDown(300);
	$('#search_bar').css({"border-radius": "0px", "background-color": "rgba(0,0,0,0.3)"});
	$('.search_close').fadeIn();
	$('.blackscreen_all').fadeIn();
	$('.search_container').css({"position": "fixed"});
}

// START OF DOCUMENT READY
$(document).ready(function(){

	/* ===========================
	=============================
	==== SEARCH E RANKING ======
	===========================
	========================*/

	// CALL get_ranking
	get_ranking();

	// MOSTRAR O RANKING DO LOCAL EM ESTRELAS
	function get_ranking(){

		$('.stars-outer').each(function(){
			var ranking = $(this).attr('data-ranking');
			// Total Stars
		    var stars_total = 5;
		    // Get percentage
		    var star_percentage = (ranking / stars_total) * 100;

		    // Round to nearest 10
		    var star_percentage_rounded = `${Math.round(star_percentage / 10) * 10}%`;

		    // Set width of stars-inner to percentage
		    $('.stars-inner', this).width(star_percentage_rounded);

		});
	}
	//Close BlackScreen
	$('.blackscreen_all').click(function(){
			$(this).fadeOut();
			$('#hidden_search').slideUp(function(){
			$('#search_bar').css({"border-radius": "11px", "background-color": "rgba(0,0,0,0.6)"});
			$('.blackscreen_all').fadeOut();
			$('.search_container').css({"position": "absolute"});
		});
	});

	$('.search_form').submit(function(e){
		e.preventDefault();
	});

	// LIVE SEARCH
	function load_data(search){
		$.ajax({
			url:"locals/search",
			method:"POST",
			data:{query:search},
			success:function(data){
				$('.hidden_search_results').html(data);
				get_ranking();
			}
		});
	}

	// MUDAR O A LUPA PARA A SETA
	function search_icon(){
		$('.search_icon').fadeOut(200, function(){
        	$('.search_back').fadeIn(200);
        });
	}

    $('.search_form input').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();

        if(inputVal.length){

			$('#hidden_search, #header_hidden_search').css({"padding":"0px"});
			$('.hidden_search_content').css({"display": "none"});
			$('.hidden_search_results').css({"display": "grid"});
            load_data(inputVal);
            search_icon();


        } else if (inputVal.length < 1) {

			$('#hidden_search, #header_hidden_search').css({"padding":"20px"});
            $('.hidden_search_content').css({"display": "block"});
			$('.hidden_search_results').css({"display": "none"});

			// MUDAR DA SETA PARA A LUPA
			$('.search_back').fadeOut(200, function(){
	        	$('.search_icon').fadeIn(200);
	        });

        }

    });

    // AO CLICAR NAS CATEGORIAS PASSAR COMO SEARCH O HTML DA CLICADA
    $('.search_grid a').click(function(e){

    	e.preventDefault();
		var name = $(this).html();

		$('#hidden_search, #header_hidden_search').css({"padding":"0px"});
		$('.hidden_search_content').css({"display": "none"});
	  	$('.hidden_search_results').css({"display": "grid"});
	  	load_data(name);
	  	search_icon();

    });

    // AO CLICAR NA SETA VOLTAR PARA TRÁS
    $('.search_back').click(function(){

		$('#hidden_search, #header_hidden_search').css({"padding":"20px 20px 80px 20px"});
	    $('.hidden_search_content').css({"display": "block"});
		$('.hidden_search_results').css({"display": "none"});
		$('.hidden_search_results').html('');
		$('.search_back').fadeOut(200, function(){
	    	$('.search_icon').fadeIn(200);
	    });
	    $('.search_form input').val('');
	});

	// FECHAR A SEARCH DO HEADER_SHOW
	$('.search_close').click(function(){
		$(this).fadeOut();
		$('#header_hidden_search').slideUp(function(){
			$('#header_search_bar').css({"border-radius": "11px"});

		}),300;
	});


	/* ===========================
	=============================
	========== NAV =============
	===========================
	========================*/


	// ANIMAÇÃO ICONS Da NAV
	$('.dropbtn').on('mouseleave', function(){
	    $('.fas', this).css({"color": "#E43F40"});
	    setTimeout(function(){
	        $('.dropbtn i').css({"color": "grey"});
	    }, 300);
	    $('.dropbtn').on('mouseenter', function(){
	        $('.fas', this).css({"color": "white"});
	    });
	});


	/* ===========================
	=============================
	========= HOME =============
	===========================
	========================*/


	// FECHAR A SEARCH DA HOME
	$('#home_search_close').click(function(){
			$(this).fadeOut();
			$('#hidden_search').slideUp(function(){
			$('#search_bar').css({"border-radius": "11px", "background-color": "rgba(0,0,0,0.6)"});
			$('.blackscreen_all').fadeOut();
			$('.search_container').css({"position": "absolute"});
		});
	});



	/* ===========================
	=============================
	======= LOCAL_SHOW =========
	===========================
	========================*/


	// ADICIONAR AOS FAVORITOS OU AOS VISITADOS
	$('.locals_button_info').on('click touchstart', function(){

	var user_id = $(this).attr("data-user_id");
	var local_id = $(this).attr("data-local_id");
	var button = $(this).attr("data-button");

 	 	if (button == 'favorites') {
			html = 'Adicionado aos favoritos';
			html2 = 'Adicionar aos favoritos';
		} else if (button == 'visited') {
			html = 'Visitado';
			html2 = 'Marcar como visitado';
		}

		if (user_id != null && user_id != '') {
			if (!$('.show_info_buttons_text', this).hasClass('clicked_button')){
				$('.show_info_buttons_text', this).addClass('clicked_button');
				$(this).addClass('clicked_button');
				$('.show_info_buttons_text', this).html(html);

				$.ajax({
				    url: 'locals/insert_button/'+button+'/'+user_id+'/'+local_id,
				    type: 'POST',
				    async: true,
				    datatype: 'json',
				    error: function(e) {
				        alert('Error occured');
				        console.log(e);
				    }
				});

		}else{
			$('.show_info_buttons_text', this).removeClass('clicked_button');
			$(this).removeClass('clicked_button');
			$('.show_info_buttons_text', this).html(html2);

			$.ajax({
			    url: 'locals/delete_button/'+button+'/'+user_id+'/'+local_id,
			    type: 'POST',
			    async: true,
			    datatype: 'json',
			    error: function(e) {
			        alert('Error occured');
			        console.log(e);
			    }
			});

		}

		}else if (user_id == null && button == 'todos_eventos') {
				alert('vamos para todos os enventos');

		}else{
			$('.to_display_none').fadeIn();
		}

	});

	//ANIMAÇÃO DAS ESTRELAS EM HOVER
	$('.estrelas').on('mouseenter touchstart', function(){
		if ($(this).hasClass('estrelas1')) {
			$('#cheia1').css({'display':'block'});
		}else if ($(this).hasClass('estrelas2')) {
			$('#cheia1').css({'display':'block'});
			$('#cheia2').css({'display':'block'});
		}else if ($(this).hasClass('estrelas3')) {
			$('#cheia1').css({'display':'block'});
			$('#cheia2').css({'display':'block'});
			$('#cheia3').css({'display':'block'});
		}else if ($(this).hasClass('estrelas4')) {
			$('#cheia1').css({'display':'block'});
			$('#cheia2').css({'display':'block'});
			$('#cheia3').css({'display':'block'});
			$('#cheia4').css({'display':'block'});
		}else if ($(this).hasClass('estrelas5')) {
			$('#cheia1').css({'display':'block'});
			$('#cheia2').css({'display':'block'});
			$('#cheia3').css({'display':'block'});
			$('#cheia4').css({'display':'block'});
			$('#cheia5').css({'display':'block'});
		}
	});
	$('.estrelas').on('mouseleave', function(){
		$('.cheia').css({'display':'none'});
	});
	//#ANIMAÇÃO DAS ESTRELAS EM HOVER


	// ADICIONAR RANKING AO CLICAR NAS ESTRELAS
	$('.cheia').on('click touchstart', function(){

		var i = 1;
		var user_id = $('.locals_button_ranking').attr("data-user_id");
		var local_id = $('.locals_button_ranking').attr("data-local_id");
		var rank_given = $(this).attr("data-ranking");

		if (user_id != null && user_id != '') {

			if ($('.stars_ranking').hasClass('ranking_ja_foi_dado')) {

				$('.displayblockthis').removeClass('displayblockthis');
				while (i <= rank_given) {
					id_estrela = '#cheia' +i;
					$(id_estrela).addClass('displayblockthis');
					i++;
				} //#while
				$.ajax({
						url: 'locals/update_ranking/'+user_id+'/'+local_id+'/'+rank_given,
						type: 'POST',
						async: true,
						datatype: 'json',
						error: function(e) {
								alert('Error occured');
								console.log(e);
						}
				});

			}else{
				$('.show_info_buttons2').addClass('ranking_given');
				$('.ranking_given .show_info_buttons_text p').addClass('displaynonethis');
				$('.stars_ranking').addClass('ranking_ja_foi_dado');
				while (i <= rank_given) {
					estrela = '#cheia' +i;
			  	$(estrela).addClass('displayblockthis');
					$(estrela).css({'display':'block !important'});
			  	i++;
					console.log(estrela);
				} //#while

				$.ajax({
					   url: 'locals/insert_ranking/'+user_id+'/'+local_id+'/'+rank_given,
					   type: 'POST',
					   async: true,
					   datatype: 'json',
					   error: function(e) {
					        alert('Error occured');
					        console.log(e);
					    }
					});

				} //#secound if

		}else{
			$('.to_display_none').fadeIn();
		}
	});//#ADICIONAR RANKING AO CLICAR NAS ESTRELAS

	//GO TO EVENTS CLICK
	$(".show_info_buttons").click(function(){
		var button = $(this).attr("data-button");
		if (button == 'todos_eventos') {
			$('html, body').animate({
	          scrollTop: $("#events_card").offset().top
	      }, 1000);
		}//#IF
	});//#GO TO EVENTS CLICK

	// TELL USERS TO LOGIN
	$('.to_display_all').click(function(){
		$('.to_display_none').fadeIn();
	});

	$('.to_display_none').click(function(){
		$('.to_display_none').fadeOut();
	});
	$('.preventDefault').click(function(e){
		e.preventDefault();
	});
	//#TELL USERS TO LOGIN

	//GALLERY
	var thumbs = $('.thumb');

	//Ciclo que dá tantas voltas quanto o número de elementos do array thumbs
	for( i=0; i<thumbs.length; i++ ){
	    
	    //Adicionar um evento listener a cada um dos thumbs
	    thumbs[i].addEventListener('click',function(){
	    	console.log('head')
	        
	        //Mudar a src da #main-image
	        document.getElementById('main_image_gallery').src = this.src;
	    });
	}


	/* ===========================
	=============================
	==== LOGIN E REGISTER ======
	===========================
	========================*/


	// Fechar janela de erros no login e no register
	$('.error_close').click(function(){
		$('.error_msg_container').css({"display": "none"});
	});


	/* ===========================
	=============================
	========= PROFILE ==========
	===========================
	========================*/



	// SE O PHP ADICIONOU A CLASS card_open MUDAR O ICON + PARA -
	$(".card_to_open").each(function(){
		if ($(this).hasClass('card_open')) {
			$('.fa-plus', this).fadeOut();
			$('.fa-minus', this).fadeIn();
		}else{
			$('.card_open').css({"overflow-y": "hidden"});
		}
	});

	// MUDAR PASSWORD E EMAIL
	$('.card_title').click(function(){
		if(!$(this).parent().hasClass('card_open') && !$(this).parent().hasClass('card_event') ){
			$('.fa-plus', this).fadeOut();
			$('.fa-minus', this).fadeIn();
			$(this).parent().animate({'height':'445px'});
			$('.fa-minus', '.card_open').fadeOut();
			$('.fa-plus', '.card_open').fadeIn();
			$('.card_open').animate({'height':'60px'});
			$('.card_open').removeClass('card_open');
			$(this).parent().addClass('card_open');
		}else if (!$(this).parent().hasClass('card_open') && $(this).parent().hasClass('card_event') ){
			$('.fa-plus', this).fadeOut();
			$('.fa-minus', this).fadeIn();
			$(this).parent().animate({'height':'500px'});
			$('.fa-minus', '.card_open').fadeOut();
			$('.fa-plus', '.card_open').fadeIn();
			$('.card_open').animate({'height':'60px'});
			$('.card_open').removeClass('card_open');
			$(this).parent().addClass('card_open');

		}else if ($(this).parent().hasClass('card_open')) {
			$('.fa-minus', this).fadeOut();
			$('.fa-plus', this).fadeIn();
			$(this).parent().animate({'height':'60px'});
			$(this).parent().removeClass('card_open');
			$('.my_account_passord').css({"overflow-y": "hidden"});
		}
	});

	// APAGAR FAVORITO NO PERFIL
	$('.delete_favorite').click(function(){
		var user_id = $(this).attr("data-user_id");
		var local_id = $(this).attr("data-local_id");
		var button = 'favorites';

		if (user_id != null && user_id != '') {

			$.ajax({
			    url: 'locals/delete_button/'+button+'/'+user_id+'/'+local_id,
			    type: 'POST',
			    async: true,
			    datatype: 'json',
			    error: function(e) {
			        alert('Error occured');
			        console.log(e);
			    }
			});

			$(this).parent().fadeOut();

		}

	});

// MOBILE MENU
$('#mobile_menu').click(function(){
	$('header').css({"left": "60px"});
});

$('#mobile_show').click(function(){
	$('header').css({"left": "-200px"});
});

if ($(window).width() <= 970) {

   $('.show_info_buttons2').on('touchstart touchend', function(e) {
        e.preventDefault();
        $(this).addClass('on_touchstart');
        $('.show_info_buttons_text', this).css({"background-position": "left bottom", "color": "white"});
        $('.show_info_buttons_text p', this).css({"display": "none"});
        $('.show_info_buttons_i', this).css({"display": "none"});
        $('.stars_ranking', this).css({"display": "grid"});
        $('.show_info_buttons_text', this).css({"background-position": "left bottom"});
    });

   $('#mobile_search_open').click(function(){
   		$('.mobile_search_container').css({"top":"0"});
   });

   $('#mobile_search_close').click(function(){
   		$('.mobile_search_container').css({"top":"-110%"});
   });


}

//ABRIR O Menu
$('.yes_login').click(function(){
	// if ($('.menu_to_slide').hasClass('menuisopen')){
	// 		$('.menu_to_slide').slideUp("slow");
	// 		$('.menuisopen').removeClass('menuisopen');
	// }else{
	// 	$('.menu_to_slide').slideDown("slow");
	// 	$('.menu_to_slide').addClass('menuisopen');
	// }
	$('.menu_to_slide').slideToggle();
});


}); // END OF DOCUMENT READY
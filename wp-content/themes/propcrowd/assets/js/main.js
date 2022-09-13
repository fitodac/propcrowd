$.noConflict();

(function($){
'use strict';



$(document).ready(function(){

	$('[data-toggle="tooltip"]').tooltip();
	// Main hero
	if( $('#mainHero')[0] ){

		$('#mainHeroSlider').owlCarousel({
			items: 1,
			loop: true,
			smartSpeed: 800,
			autoplay: true,
			autoplayTimeout: 3000,
			autoplayHoverPause: true,
			dots: true
		});

	}





	// Tabbbs
	if( $('#tabbbsSlider')[0] ){

		var _limit = 992;

		$('#tabbbsSlider')
		.on('changed.owl.carousel', function(e){
			setTimeout(function(){
			let clones = $('#tabbbsSlider .owl-item.cloned').length/2,
					i = $('#tabbbsSlider .owl-item.active').index();

			if( $(window).width() > _limit){
				$(`.logos .logo`).removeClass('active');
				$(`.logos .logo:eq(${i - clones})`).addClass('active');
			}else{
				$('#tabbbs .logos').trigger('to.owl.carousel', i - clones);
			}
			}, 200);
		})
		.owlCarousel({
			items: 1,
			loop: true,
			smartSpeed: 800,
			autoplay: true,
			autoplayTimeout: 3000,
			autoplayHoverPause: true,
			dots: false,
			nav: true,
			mouseDrag: false
		});


		if( $(window).width() > _limit){
			$(`.logos .logo`).on('click', function(){
				let i = $(this).data('tabbb');
				$('#tabbbsSlider').trigger('to.owl.carousel', i);
			})
		}


		function toggleTabbbNav(){
			if( $(window).width() < _limit){

				$('#tabbbs .logos').owlCarousel({
					items: 1,
					loop: true,
					smartSpeed: 800,
					// autoplay: true,
					// autoplayTimeout: 3000,
					// autoplayHoverPause: true,
					dots: false,
					nav: true,
					// mouseDrag: false
				});

			}else{

				$('#tabbbs .logos').owlCarousel('destroy');

			}
		}

		$(window).on('resize', toggleTabbbNav);
		toggleTabbbNav();

	}










	// Testimonials
	if( $('#testimonialsSlider')[0] ){
	
		$('#testimonialsSlider')
		.on('changed.owl.carousel', function(e){
			let i = $('#testimonialsSlider .owl-item.active').index();
			$('#testimonialsPicturesSlider').trigger('to.owl.carousel', i-1);
		})
		.owlCarousel({
			items: 1,
			loop: true,
			smartSpeed: 800,
			autoplay: false,
			autoplayTimeout: 3000,
			autoplayHoverPause: true,
			dots: true,
			mouseDrag: false
			// nav: true
		});

		$('#testimonialsPicturesSlider').owlCarousel({
			items: 1,
			// loop: true,
			loop: false,
			smartSpeed: 800,
			autoplay: false,
			autoplayTimeout: 3000,
			autoplayHoverPause: true,
			dots: false,
			mouseDrag: false
			// nav: true
		});

	}






	// Widget slider
	if( $('#widget .property .slide').length ){
		$('#widget .property .slide').owlCarousel({
			items: 1,
			loop: true,
			smartSpeed: 800,
			autoplay: true,
			autoplayTimeout: 3000,
			autoplayHoverPause: true,
			dots: false,
			nav: true
		});
	}






	// Range slider
	if( $('.range')[0] ){

		var _w = $('.range').parent().outerWidth();
		let _text = $('.range').data('text');
		let _anualtir = $('.range').data('anualtir');

		$(window).resize(function(){ 
			_w = $('.range').parent().outerWidth();
			var _val = $('.slider .range').val();
			$('.slider .range, .slider .slider-container').remove();
			$('form.slider').prepend('<input type="hidden" class="range" value="'+_val+'">');
			createRange();
		});

		createRange();


		function rangeFunc(el){
			let val = parseInt( el.val() ),
			percent = ((val / 100)*_anualtir).toFixed(2);

			$('.slider [type=number]').val(percent);
		}


		function createRange(){
			$('.range').jRange({
				from: 100,
				to: 10000,
				step: 50,
				format: `${_text} %s€`,
				width: _w,
				showLabels: true,
				snap: true,
				
				polyfill: false,
				ondragend: function(){  rangeFunc(this.inputNode);  },
				onbarclicked: function(){  rangeFunc(this.inputNode);  }
			});
		}

	}


});





if( $('.back-to-top')[0] ){

	function bttVisibilityToggler(){
		let winHeight = $(window).height(),
		winTop = $(window).scrollTop();
		
		if( winTop > winHeight/2 ){
			$('.back-to-top').addClass('on');
		}else{
			$('.back-to-top').removeClass('on');
		}
	}
	

	$('.back-to-top').on('click', function(e){
		e.preventDefault();
		$('html, body').animate({scrollTop: 0});
	});

	bttVisibilityToggler();
	$(window).on('scroll', bttVisibilityToggler);
}









// Porque Propcrowd - Overlay de iconos
if( $('[data-hv]')[0] ){

	$('[data-hv]').on('mouseenter', function(){
		let id = $(this).data('hv');
		$(`#${id}`).addClass('on');
	});

	$('.hover').on('mouseleave click', function(){
		$('.hover').removeClass('on');
	});


	function positionForIconsHovers(){

		if( $(window).width() >= 992 ){

			$('[data-hv]').each(function(){
				
				let pos = $(this).offset(),
						id = $(this).data('hv'),
						limit = $('.icons-grid').offset().top,
						width = $(this).outerWidth(),
						left = pos.left,
						top = pos.top - limit;


				let a = $('.icons-grid').width(),
						b = $('.icons-grid .container').width(),
						c = (a - b) / 2,
						rest = left - c,
						w = b - rest;


				if( $(`#${id}`).hasClass('icon-right') ){
					w = (left - c) + width;
				}

				if( $(`#${id}`).hasClass('icon-right') ){
					$(`#${id}`).css({left:c, top:`${top}px`, width:`${w}px`});
					// $(`#${id}`).css({left:'auto', right:`${right}px`, top:`${top}px`, width:`${w}px`});
				}else{
					$(`#${id}`).css({left:`${left}px`, top:`${top}px`, width:`${w}px`});
				}
				
			});

		}else{

			$('[data-hv]').each(function(){
				
				let pos = $(this).offset(),
						id = $(this).data('hv'),
						limit = $('.icons-grid').offset().top,
						top = (pos.top - limit) - 40;
				
				$(`#${id}`).css({left: 0, top:`${top}px`});
				
			});

		}
		
	}


	positionForIconsHovers();
	$(window).on('resize', positionForIconsHovers);

}//[data-hv]





if( $('.parallax')[0] ){
	
	$(window).on('mousemove',function(e){
		if( $(window).width() > 992 && $(window).scrollTop() > ($('#infoSection').offset().top - $(window).height()) ){

	// console.log($(window).width() > 992);

	var width=$(window).width(),
			height=$(window).height(),
			offsetX=0.5-e.pageX/width,
			offsetY=0.5-e.pageY/height,
			$parallaxItem=$('.parallax');

	$parallaxItem.each(function(i,el){
		var offset=parseInt($(el).data('offset')), translate="translate3d("+Math.round(offsetX*offset)+"px,0px,0px)";
		$(el).css({
			'-webkit-transform':translate,
			'transform':translate,
			'-moz-transform':translate
		});
	});
}
});

}








if( $('#contactForm').length ){

	$('#formNombre').on('keyup change', function(){ $('[name=c-nombre]').val($('#formNombre').val()) })
	$('#formEmail').on('keyup change', function(){ $('[name=c-email]').val($('#formEmail').val()) })
	$('#formAsunto').on('keyup change', function(){ $('[name=c-asunto]').val($('#formAsunto').val()) })
	$('#formMensaje').on('keyup change', function(){ $('[name=c-message]').val($('#formMensaje').val()) })

	$('#contactForm').on('submit', function(e){
		e.preventDefault();
		$('.wpcf7-submit').trigger('click')
	});

}


if( $('form.wpcf7-form').length ){
	// console.log('existe');

	$('form.wpcf7-form').on('submit', function(){
		// console.log('enviadooo');
		$('#formNombre').val('')
		$('#formEmail').val('')
		$('#formAsunto').val('')
		$('#formMensaje').val('')
		setTimeout(function(){ $('.wpcf7-response-output').fadeOut(300) }, 3000);
	});
	
}




window.jumpPop = function(e){
	
	let pos = $(e).offset();
	let pop = `<div class="popup-wrapper"></div><div class="popup" style="left:${pos.left}px; top:${pos.top}px;">Estamos trabajando en ello. Disculpe las molestias. Para cualquier consulta escríbanos a <a href="mailto:hola@propcrowd.com">hola@propcrowd.com</a><span class="close"></span></div>`;

	$('body').append(pop);

	setTimeout(function(){
		$('.popup').addClass('in');
	});

	$('.popup, .popup-wrapper').on('click', function(){
		$('.popup, .popup-wrapper').remove();
	});

}



})(jQuery)







///////////////////////////////////////////////
// Share icons
function shareTwitter(url, text) {
  open('http://twitter.com/share?url=' + url + '&text=' + text, 'tshare', 'height=400,width=550,resizable=1,toolbar=0,menubar=0,status=0,location=0');  
}

function shareFacebook(url, text, image) {
  open('http://facebook.com/sharer.php?s=100&p[url]=' + url + '&p[images][0]=' + image + '&p[title]=' + text, 'fbshare', 'height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0');
}

function shareLinkedin(url, text) {
  open('https://www.linkedin.com/shareArticle?mini=true&url=' + url + '&title=' + text + '&source=MadeInTheMidlands&target=new', 'inshare', 'height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0');
}

// var url = root.options.protocol + 'www.linkedin.com/shareArticle?mini=true';
// url += '&url=' + encodeURIComponent(root.options.url);
// url += '&title=' + encodeURIComponent(root.options.title);
// url += '&source=' + encodeURIComponent(root.options.source);

///////////////////////////////////////////////
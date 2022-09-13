<?php 
/**
 * Template Name: Formulario de registro
 * 
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package propcrowd
 */

get_header();

$data = get_fields('options');


get_template_part('template-parts/page', 'header');
?>


<div class="container">

<?php //echo do_shortcode('[contact-form-7 id="841" title="Formulario de registro"]'); ?>

<form action="" id="registerForm">
	<div class="h1"><?= pll_e('Regístrate') ?></div>
	<input type="hidden" name="user_login" placeholder="User name" id="user_login" />
	
	<input type="text" name="first_name" id="first_name" placeholder="<?= pll_e('Nombre*') ?>" class="form-control" onkeyup="usernameGenerator()" />
	<div class="error error-first_name hidden"><?= pll_e('Debes incluir tu nombre') ?></div>

	<input type="text" name="last_name" id="last_name" placeholder="<?= pll_e('Apellido*') ?>" class="form-control" onkeyup="usernameGenerator()" />
	<div class="error error-last_name hidden"><?= pll_e('Debes incluir tu apellido') ?></div>

	<input type="email" name="user_email" id="user_email" placeholder="<?= pll_e('Correo electrónico*') ?>" class="form-control"  />
	<div class="error error-user_email hidden"><?= pll_e('No olvides tu email') ?></div>

	<?php do_action('register_form'); ?>

	<div class="info">
		<div class="h4"><?= $data['reg_title'] ?></div>
		<?= $data['reg_info'] ?>
	</div><?php //info ?>

	<label for="accept">
		<span><?= $data['reg_checkbox_label'] ?></span>
		<input type="checkbox" id="accept">
		<span></span>
	</label>
	<div class="error error-accept hidden"><?= pll_e('Debes aceptar las políticas de privacidad') ?></div>

	<footer>
		<div class="g-recaptcha d-inline-block" data-sitekey="6LfpgHYUAAAAAO_6L4hI32WL2qCIW2ZOR4CuFyVH"></div><br>
		<div class="error error-recaptcha text-right pt-3 hidden"><?= pll_e('Debes marcar el captcha') ?></div>
		<button type="submit" class="btn btn-primary"><?= pll_e('Enviar') ?></button>
	</footer>

	<div class="loader"></div>
</form>

</div><?php // container ?>






<?php add_action('wp_footer', function(){ 
/**
 * Mete los scripts del formulario al final de </body>
 * */	

$id_phone_field = '5c17a4fdc9181'; ?>


<script>
$ = jQuery;

/**
 * Crea el user name desde los campos de nombre y apellido
 */
function usernameGenerator(){
	let name = $('#registerForm #first_name').val().replace(' ','_'),
			lastname = $('#registerForm #last_name').val().replace(' ','_');

	$('#registerForm #user_login').val(name+'@'+lastname)
}// usernameGenerator()



$(document).ready(function(){

	var form = $('#registerForm');

	// Agrega elementos al formulario que faltan
	form.find('#acf-field_<?= $id_phone_field ?>').after('<div class="error error-acf-field_<?= $id_phone_field ?> hidden"><?= pll_e("Debes incluir tu número de teléfono (sin espacios)") ?></div>');

	// Elimina elementos inútiles del formulario
	form.find('h2').detach();


	form.find('#acf-field_<?php echo $id_phone_field ?>').attr('placeholder', '<?= pll_e("Teléfono") ?>');

	form.on('submit', function(e){
		e.preventDefault();

		/**
		 * Valida que todos los campos requeridos estén completos
		 */
		let fName = form.find('#first_name'),
				fLastname = form.find('#last_name'),
				fEmail = form.find('#user_email'),
				fPhone = form.find('#acf-field_<?= $id_phone_field ?>'),
				ok = 0;


		if( '' == fName.val() ){
			$(`.error-${fName.attr('id')}`).removeClass('hidden')
		}else{
			$(`.error-${fName.attr('id')}`).addClass('hidden');
			ok++;
		}

		if( '' == fLastname.val() ){
			$(`.error-${fLastname.attr('id')}`).removeClass('hidden')
		}else{
			$(`.error-${fLastname.attr('id')}`).addClass('hidden');
			ok++;
		}

		if( '' == fEmail.val() ){
			$(`.error-${fEmail.attr('id')}`).removeClass('hidden')
		}else{
			$(`.error-${fEmail.attr('id')}`).addClass('hidden');
			ok++;
		}

		if( '' == fPhone.val() || isNaN(fPhone.val()) ){
			$(`.error-${fPhone.attr('id')}`).removeClass('hidden')
		}else{
			$(`.error-${fPhone.attr('id')}`).addClass('hidden');
			ok++;
		}

		if( 0 == form.find('#accept:checked').length ){
			$('.error-accept').removeClass('hidden')
		}else{
			$('.error-accept').addClass('hidden');
			ok++;
		}




		let formData = form.serializeArray();


		// Valida el recaptcha
		if( '' == formData[10].value ){
			$('.error-recaptcha').removeClass('hidden')
		}else{
			$('.error-recaptcha').addClass('hidden');
			ok++;
		}



		if( ok < 6 ){
			return false;
		}


		form.addClass('loading');

		$.ajax({
			url: '<?php echo site_url('wp-login.php?action=register', 'login_post') ?>',
			type: 'POST',
			data: formData,
			success: function(request){
				
				form.removeClass('loading');

				// Si el usuario ya existe
				if( request.indexOf('Ese nombre de usuario ya está registrado. Por favor elige otro.') >= 0 || request.indexOf('This username is already registered. Please choose another one.') >= 0 ){
					form.html(`
						<div class="h1"><?= pll_e('Oops!') ?></div>
						<div class="info text-center">
							<div class="h4"><?= pll_e("Ese nombre de usuario ya está registrado. Por favor elige otro.") ?></div>
						</div>
					`);
				}else if( request.indexOf('Esa dirección de correo electrónico ya está registrada. Por favor, elige otra.') >= 0 || request.indexOf('This email is already registered, please choose another one.') >= 0 ){
					form.html(`
						<div class="h1"><?= pll_e('Oops!') ?></div>
						<div class="info text-center">
							<div class="h4"><?= pll_e("El email ya está registrado. Por favor, elige otro.") ?></div>
						</div>
					`);
				}else{
					// El usuario ha sido creado con éxito
					form.html(`
						<div class="h1"><?= pll_e('Gracias') ?></div>
						<div class="info text-center">
							<div class="h4"><?= pll_e("Ya eres parte de PropCrowd!") ?></div>
						</div>
					`);
				}

			}, 
			error: function(request, textStatus, errorThrown){
				// alert(request.getResponseHeader('some_header'));
				console.log('ERROR:',request.responseText);
			}

		});

	});

});
</script>

<?php },999); ?>

<?php get_footer(); ?>


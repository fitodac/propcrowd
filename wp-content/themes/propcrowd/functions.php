<?php
/**
 * propcrowd functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package propcrowd
 */

define('GOOGLE_ANALYTICS', 'UA-128396573-1');
define('THEME', 'propcrowd');
define('APIKEY', 'ac70a93569be9b9602bcb47ce518fcc4243c85553d4829e7480644245286b26a');




if ( ! function_exists( 'propcrowd_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function propcrowd_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on propcrowd, use a find and replace
		 * to change 'propcrowd' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( THEME, get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', THEME ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'propcrowd_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'propcrowd_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function propcrowd_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'propcrowd_content_width', 640 );
}
add_action( 'after_setup_theme', 'propcrowd_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function propcrowd_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'propcrowd' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'propcrowd' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'propcrowd_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function propcrowd_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/vendors/bootstrap/bootstrap.min.css' );
	wp_enqueue_style( 'montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/assets/icons/fontawesome/css/all.min.css' );
	// if( is_front_page() || is_page(780) || is_page(782) || is_page(11) || is_page(492) ){
		wp_enqueue_style( 'owl', get_template_directory_uri().'/assets/vendors/owl/owl.carousel.css' );
		wp_enqueue_style( 'rangeslider', get_template_directory_uri().'/assets/vendors/jrange/jquery.range.css' );
	// }
	wp_enqueue_style( 'main', get_template_directory_uri().'/assets/css/main.css' );
	wp_enqueue_style( 'propcrowd-style', get_stylesheet_uri() );



	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri().'/assets/vendors/jquery/jquery.2.1.4.min.js', array(), '20151215', true );
	wp_enqueue_script('jquery');
	// if( is_front_page() || is_page(780) || is_page(782) || is_page(11) || is_page(492) ){
		wp_enqueue_script( 'owl', get_template_directory_uri().'/assets/vendors/owl/owl.carousel.min.js', array('jquery'), '20151215', true );
		wp_enqueue_script( 'rangeslider', get_template_directory_uri().'/assets/vendors/jrange/jquery.range-min.js', array(), '20151215', true );
	// }
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/assets/vendors/bootstrap/bootstrap.bundle.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'captcha', 'https://www.google.com/recaptcha/api.js', false, '20151215', true );
	wp_enqueue_script( 'propcrowd-main', get_template_directory_uri().'/assets/js/main.js', array('jquery'), '20151215', true );
	

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'propcrowd_scripts' );








$args = array(
	'page_title' => 'Opciones de la página',
	'menu_title' => 'PropCrowd',
	'menu_slug' => '',
	'capability' => 'edit_posts',
	'position' => false,
	'parent_slug' => '',
	'icon_url' => false,
	'redirect' => true,
	'post_id' => 'options',
	'autoload' => false,
	'update_button'		=> __('Actualizar', 'acf'),
	'updated_message'	=> __("Se han actualizado las opciones", 'acf'),
);

acf_add_options_page( $args );



function crunchify_disable_comment_url($fields) { 
	unset($fields['url']);
	return $fields;
}
add_filter('comment_form_default_fields','crunchify_disable_comment_url');



show_admin_bar( false );













/*-----------------------------------------------------------------------*/
/*	POST THUMBNAIL
/*-----------------------------------------------------------------------*/
if( !function_exists( 'nitro_post_thumbnail' ) ):
function nitro_post_thumbnail( $link = false ){

	if( post_password_required() || is_attachment() ) return;

	global $post;


	// Get video thumbnail if is video post format
	$content = apply_filters( 'the_content', $post->post_content );
	$embeds = wp_extract_urls( $post->post_content );
	$video_thumbnail = false;
	
	// ICONS
	$icon = '';
	if( 'video' == get_post_format() ) $icon = 'play-circle';
	if( 'quote' == get_post_format() ) $icon = 'quote-left';
	if( 'audio' == get_post_format() ) $icon = 'headphones';


	foreach( $embeds as $embed ){
		if( strpos($embed, 'youtube') || strpos($embed, 'vimeo') ){

			if( strpos($embed, 'vimeo') ){
				$id = substr(parse_url($embed, PHP_URL_PATH), 1);
				$data = file_get_contents("http://vimeo.com/api/v2/video/$id.json");
				$data = json_decode($data);
				$video_thumbnail = $data[0]->thumbnail_large;
			}

			if( strpos($embed, 'youtube') ){
				preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $embed, $match);
				$id = $match[1];
				$video_thumbnail = "https://img.youtube.com/vi/$id/maxresdefault.jpg";
			}
		
		}else{
			$video_thumbnail = $embed;
			$video_html = true;
		}
	}



	// Set $link as true for display an image link
	if( !$link ): 

		if( has_post_thumbnail() ):
			echo '<figure class="post-thumbnail">';
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			echo '</figure>';
		endif;

	else : ?>

		<?php if( has_post_thumbnail() || get_post_format() ): ?>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php if( has_post_thumbnail() ): 
					the_post_thumbnail( 'post-thumbnail', array(
						'alt' => the_title_attribute( array(
							'echo' => false,
						) ),
					) );
				else:
					if( $video_thumbnail ): 
						if( $video_html ): 
							echo do_shortcode('[video src="'.$video_thumbnail.'"]');
						else: ?>
							<img src="<?php echo esc_attr($video_thumbnail); ?>">
						<?php endif; 
					endif;
				endif; ?>

				<?php if(get_post_format()): ?><span class="fa fa-<?php echo $icon; ?>"></span><?php endif; ?>
			</a>
		<?php endif; ?>

	<?php endif;



}
endif;







/*-----------------------------------------------------------------------*/
/*	ENTRY CATEGORIES
/*-----------------------------------------------------------------------*/
if( !function_exists( 'nitro_entry_categories' ) ):
	function nitro_entry_categories($n = false){

		if( get_the_category() ):
		$categories = '<div class="nav post-categories">';
		foreach( get_the_category() as $category ){
			$categories .= '<div class="nav-item"><a href="'.get_category_link($category->term_id).'" rel="category tag" target="_self" class="nav-link">'. $category->name .'</a></div>';

		}
		$categories .= '</div>'; // end
		
		echo $categories;
		endif;

	}
endif;





/*-----------------------------------------------------------------------*/
/*	ENTRY DATE
/*-----------------------------------------------------------------------*/
if( !function_exists( 'nitro_posted_on' ) ):
	function nitro_posted_on($forHumans = false){

		$return = '<div class="post-date">';

		// For humans
		if( $for_humans ){

			$time_format = human_time_diff( get_the_time('U'), current_time('timestamp') );

			$return .= sprintf(
				_x('<a href="%1$s" class="posted-on" rel="bookmark"><time class="entry-date published" datetime="%2$s">%3$s ago</time></a>', 'post date', 'nitro'),
				esc_url( get_permalink() ),
				esc_attr( get_the_date( 'c' ) ),
				$time_format
			);


		// Date
		}else{

			$time_format = esc_html( get_the_date() );

			$return .= sprintf(
				_x('<a href="%1$s" class="posted-on" rel="bookmark"><time class="entry-date published" datetime="%2$s">%3$s</time></a>', 'post date', 'nitro'),
				esc_url( get_permalink() ),
				esc_attr( get_the_date( 'c' ) ),
				$time_format
			);
		}

		$return .= '</div>';


		echo $return;


	}
endif;







/*------------------------------------------*/
/* Custom polylang switcher
/*------------------------------------------*/
/**
 * Show Polylang Languages with Custom Markup
 * @param  string $class Add custom class to the languages container
 * @return string        
 */
function rarus_polylang_languages( $class = '' ) {

  if ( ! function_exists( 'pll_the_languages' ) ) return;

  // Gets the pll_the_languages() raw code
  $languages = pll_the_languages( array(
    'display_names_as'       => 'slug',
    'hide_if_no_translation' => 1,
    'raw'                    => true
  ) ); 

  $output = '';

  // Checks if the $languages is not empty
  if ( ! empty( $languages ) ) {

    // Creates the $output variable with languages container
    $output = '<div class="nav ' . ( $class ? ' ' . $class : '' ) . '" id="selectLang">';

    // Runs the loop through all languages
    foreach ( $languages as $language ) {

      // Variables containing language data
      $id             = $language['id'];
      $slug           = $language['slug'];
      $url            = $language['url'];
      $current        = $language['current_lang'] ? ' languages__item--current' : '';
      $no_translation = $language['no_translation'];

			$output .= '<div class="nav-item">';

      // Checks if the page has translation in this language
      if ( ! $no_translation ) {
        // Check if it's current language
        if ( $current ) {
          // Output the language in a <span> tag so it's not clickable
          $output .= '<span class="nav-link active">'.$slug.'</span>';
        } else {
          // Output the language in an anchor tag
          $output .= "<a href=\"$url\" class=\"nav-link\">$slug</a>";
        }
			}
			
			$output .= '</div>';

    }

    $output .= '</div>';

  }

  return $output;
}











/**	
 * Remove the search page body class
 */
add_filter('body_class','alter_search_classes');
function alter_search_classes($classes) {
    if(is_search()){
       return array('navbar-brand--white');
    } else {
       return $classes;
    }

}








/**
 * Paginación del blog
 */
if( !function_exists( 'smpx_blog_navigation' ) ):
	function smpx_blog_navigation( $query, $navigation = 'numeric', $args, $template, $prev = 'Previous page', $next = 'Next page', $btn_text = 'LOAD MORE POSTS' ){

		
		if( 'prev-next' === $navigation ): ?>
			<nav id='blog-pagination' class="prev-next" role="navigation">
				<ul class="nav">
					<li class="prev">
						<?php echo 0 == get_query_var('paged') ? '<span></span>' : str_replace( '<a', '<a', get_previous_posts_link($prev, $query->max_num_pages) ) ?>
					</li>
					<li class="next">
						<?php echo get_query_var('paged') == $query->max_num_pages ? '<span>&nbsp;</span>' : str_replace( '<a', '<a', get_next_posts_link($next, $query->max_num_pages) ) ?>
					</li>
				</ul>
			</nav>
		<?php endif;



		if( 'numeric' === $navigation ): ?>
			<nav id='blog-pagination' class="numeric" role="navigation">
				<div class="nav">
					<?php
						$big = 999999999; // need an unlikely integer
						$args = array(
							'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format'       => '?page=%#%', // ?page=%#% : %#% is replaced by the page number
							'total'        => $query->max_num_pages,
							'current'      => max( 1, $query->get('paged') ),
							'show_all'     => false,
							'prev_next'    => true,
							'prev_text'    => '<i class="fa fa-angle-left"></i>',
							'next_text'    => '<i class="fa fa-angle-right"></i>',
							'end_size'     => 1,
							'mid_size'     => 1,
							'type'         => 'plain',
							'add_args'     => false, // array of query args to add
							'add_fragment' => ''
						);
					?>
					<?php echo paginate_links( $args ); ?>
				</div>
			</nav>
		<?php endif;




		if( !isset($template) ) $template = get_template_directory().'/template-parts/content.php';


		if( 'ajax' === $navigation ): ?>
			<nav id='blog-pagination' class="ajax" role="navigation">
				<?php 
				$all_posts = wp_count_posts($args['post_type'])->publish;

				if( $query->max_num_pages > 1 )
					echo '<button class="btn btn-primary"
						id="misha_loadmore" 
						data-template="'.$template.'" 
						data-count-posts="'.$all_posts.'" 
						data-q='.json_encode($args).'>'.$btn_text.'</button>
						<span class="loader hidden"></span>';
				?>
			</nav>
		<?php endif;
	
	}


	function nitro_load_more_scripts($query){

		wp_register_script( 'ajax-posts-loader', get_stylesheet_directory_uri() . '/assets/js/ajax-posts.js', array('jquery') );
		
		wp_localize_script( 'ajax-posts-loader', 'nitro_loadmore_params', array(
			'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
			'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
		) );
		
		 wp_enqueue_script( 'ajax-posts-loader' );
	}
	
	// add_action( 'wp_enqueue_scripts', 'nitro_load_more_scripts' );
	
	
	
	
	
	add_action('wp_ajax_loadmorebutton', 'misha_loadmore_ajax_handler');
	add_action('wp_ajax_nopriv_loadmorebutton', 'misha_loadmore_ajax_handler');
	 
	function misha_loadmore_ajax_handler(){
	 
		// prepare our arguments for the query
		$params = json_decode( stripslashes( $_POST['query'] ), true ); // query_posts() takes care of the necessary sanitization 
		$params['paged'] = $_POST['page'] + 1; // we need next page to be loaded
		$params['post_status'] = 'publish';
		$template = $_POST['template'];
	 
		query_posts( $params );
	
		if( have_posts() ):
			while( have_posts() ): the_post();
				echo '<div class="lsow-portfolio-item term-1 lsow-sixcol">';
				include $template;
				echo '</div>';
			endwhile;
		endif;
		die; // here we exit the script and even no wp_reset_query() required!
	}

endif;





/**	
 * Permite incluir el código de google analytics
 */
// add_action('wp_footer', 'ga'); 
// function ga(){ 

// <!-- Global site tag (gtag.js) - Google Analytics -->
// <script async src="https://www.googletagmanager.com/gtag/js?id=<?= GOOGLE_ANALYTICS "></script>
// <script>
//   window.dataLayer = window.dataLayer || [];
//   function gtag(){dataLayer.push(arguments);}
//   gtag('js', new Date());

//   gtag('config', '<?= GOOGLE_ANALYTICS ');
// </script>

// } 






/**
 * Pixel code
 */
function pixelCode(){ ?>
	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window,document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '322330491699963');
	fbq('track', 'PageView');
	</script>
	
	<noscript>
	<img height="1" width="1" src="https://www.facebook.com/tr?id=322330491699963&ev=PageView &noscript=1"/>
	</noscript>
	<?php }
	
	
	add_action('wp_head', 'pixelCode', 99);






/**
 * Bloquea el dashboard para todos los usuarios que no tienen el rol de ADMIN
 */
add_action('admin_init', 'disable_dashboard');

function disable_dashboard() {
	if (!is_user_logged_in()) {
		return null;
	}
	if (!current_user_can('administrator') && is_admin()) {
		wp_redirect(home_url());
		exit;
	}
}





add_action('wp_footer', function(){ ?>
	<script>
	jQuery(document).ready(function($){
		if( jQuery('.cc-window').length ){
			jQuery('.cc-window .cc-message .cc-link').text('<?= pll_e("Obtener más información.") ?>');
			jQuery('.cc-window .cc-dismiss').text('<?= pll_e("Denegar") ?>');
			jQuery('.cc-window .cc-allow').text('<?= pll_e("Aceptar") ?>');
		}
	})
	</script>
<?php }, 99); 





/**
 * 
 * Dehabilita todas las notificaciones de actualización en el backend
 * 
 */
function remove_core_updates(){
	global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');







/**
 * Auqí se definen textos usados en el theme y que podrán traducirse con Polylang
 * desde el backend.
 * Se define la variable y el texto con:
 * 
 * pll_register_string($theme_name, 'Label');
 * 
 * 
 * El "texto" será lo que se mostrará por defecto en el front.
 * 
 * Para renderizar la traducción, en el theme se usará   pll_e('Texto')
 * o pll__('Texto') para guardarla en una variable.
 * 
 */

add_action('init', function() {
	pll_register_string(THEME, '¿Aún no eres miembro?');
	pll_register_string(THEME, 'Regístrate ahora');
	pll_register_string(THEME, 'Acceder');
	pll_register_string(THEME, 'Regístrate');
	pll_register_string(THEME, 'Financiación al');
	pll_register_string(THEME, 'Rentabilidad Anual');
	pll_register_string(THEME, 'Inversor');
	pll_register_string(THEME, 'Inversores');
	pll_register_string(THEME, 'Objetivo alcanzado');
	pll_register_string(THEME, 'Objetivo');
	pll_register_string(THEME, 'Plazo');
	pll_register_string(THEME, 'Invertir');
	pll_register_string(THEME, 'El rendimiento');
	pll_register_string(THEME, 'Resultados');
	pll_register_string(THEME, 'Total performance');
	pll_register_string(THEME, 'Rentabilidad');
	pll_register_string(THEME, 'Annual TIR');
	pll_register_string(THEME, 'Rentabilidad Anual Máxima');
	pll_register_string(THEME, 'Máximo rendimiento anual');
	pll_register_string(THEME, 'CONTÁCTANOS');
	pll_register_string(THEME, 'SOBRE NOSOTROS');
	pll_register_string(THEME, 'SÍGUENOS');
	pll_register_string(THEME, 'NEWSLETTER');
	pll_register_string(THEME, '¿Qué ofrecemos?');
	pll_register_string(THEME, 'Suscríbete a');
	pll_register_string(THEME, 'nuestra newsletter');
	pll_register_string(THEME, 'Nombre y apellidos *');
	pll_register_string(THEME, 'E-mail *');
	pll_register_string(THEME, 'Motivo del mensaje *');
	pll_register_string(THEME, 'Mensaje *');
	pll_register_string(THEME, 'ENVIAR MENSAJE');
	pll_register_string(THEME, '* Campos obligatorios');
	pll_register_string(THEME, 'Buscar');
	pll_register_string(THEME, '¿Buscas algo?');
	pll_register_string(THEME, 'LEER MÁS');
	pll_register_string(THEME, 'VER MÁS');
	pll_register_string(THEME, 'SIGUIENTE');
	pll_register_string(THEME, 'Publicado por');
	pll_register_string(THEME, 'Categorías');
	pll_register_string(THEME, 'Deja un comentario');
	pll_register_string(THEME, 'IR ATRÁS');
	pll_register_string(THEME, 'CARGAR MÁS');
	pll_register_string(THEME, 'La página que buscabas no existe o ha sido cambiada');
	pll_register_string(THEME, 'VOLVER AL INICIO');
	pll_register_string(THEME, 'Todavía no hay posts publicados');
	pll_register_string(THEME, 'Tu búsqueda no produjo ningún resultado');

	pll_register_string(THEME, 'Regístrate');
	pll_register_string(THEME, 'NOMBRE DE USUARIO');
	pll_register_string(THEME, 'CONTRASEÑA');
	pll_register_string(THEME, 'ÚNETE AHORA');
	pll_register_string(THEME, '¿Ya eres miembro?');
	pll_register_string(THEME, 'Entra');
	pll_register_string(THEME, 'Inviertes');

	// WIDGET
	pll_register_string(THEME, 'Invierte');
	pll_register_string(THEME, 'Documentos');
	pll_register_string(THEME, 'Te estamos redirigiendo...');

	// REGISTER FORM
	pll_register_string(THEME, 'Regístrate');
	pll_register_string(THEME, 'Nombre*');
	pll_register_string(THEME, 'Apellido*');
	pll_register_string(THEME, 'Correo electrónico*');
	pll_register_string(THEME, 'Enviar');
	pll_register_string(THEME, 'Teléfono');
	pll_register_string(THEME, 'Debes incluir tu nombre');
	pll_register_string(THEME, 'Debes incluir tu apellido');
	pll_register_string(THEME, 'No olvides tu email');
	pll_register_string(THEME, 'Debes incluir tu número de teléfono (sin espacios)');
	pll_register_string(THEME, 'Ya eres parte de PropCrowd!');
	pll_register_string(THEME, 'Ese nombre de usuario ya está registrado. Por favor elige otro.');
	pll_register_string(THEME, 'El email ya está registrado. Por favor, elige otro.');


	pll_register_string(THEME, 'Obtener más información.');
	pll_register_string(THEME, 'Denegar');
	pll_register_string(THEME, 'Aceptar');

	pll_register_string(THEME, 'Informate aquí');
	pll_register_string(THEME, 'meses');
	pll_register_string(THEME, 'Documentos');
	pll_register_string(THEME, 'Financiado');
	pll_register_string(THEME, 'Quedan');
	pll_register_string(THEME, 'días');
	pll_register_string(THEME, 'Tir');
	pll_register_string(THEME, 'Plazo');
	pll_register_string(THEME, 'Tipo');
	pll_register_string(THEME, 'anual');
	pll_register_string(THEME, 'Más Información');
	pll_register_string(THEME, 'Inversión mínima');
});
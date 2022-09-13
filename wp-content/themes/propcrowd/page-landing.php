<?php
/**
 * Template Name: Landing
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

$data = get_fields();
?>


<!-- <pre><?php //var_dump($data); ?></pre> -->

<div id="mainHero"
    style="background: url(http://propcrowd.com/wp-content/uploads/2019/01/iso-flat.svg) no-repeat top/800px; background-position: right 110px; background-position-x: 70%; background-size: 800px;">
    <div class="container" style="margin-bottom: 50px;">
        <div class="row no-gutters">
            <!-- <div class="col-md-6 order-md-2 mb-5 mb-md-0">  -->
            <div class="col-md-6 pr-md-4 pr-lg-5 display-4">
                <div class="owl-carousel owl-dots-overlay" id="mainHeroSlider">
                    <?php foreach ($data['hero_slider'] as $owl): ?>
                    <div class="h-100">
                        <figure>
                            <?=wp_get_attachment_image($owl['ID'], 'full', false);?>
                        </figure>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <!-- <div class="col-md-6 pr-md-4 pr-lg-5"> -->
            <div class="col-md-6 pr-md-4 pr-lg-5">
                <div class="display-4 hero-tittle"><?php the_field('hero_title');?>
                </div>
                <div class="excerpt alinear" style="padding-left: 40px;  margin-bottom: 20px;">
                    <?php the_field('hero_subtitle');?></div>
                <div class="excerpt" style="margin-bottom: 20px;"><?php the_field('hero_subtitle2');?></div>

                <div class="excerpt" style="margin-bottom: 0px; font-size: 14px;">
                    <?php the_field('hero_text_download_pdf');?></div>
                <div style="text-align: center;">
                    <a class="btn btn-primary btn-xs-big" style="margin-left: 0px; margin-bottom: 20px;"
                        href="#infoSection"><?php the_field('hero_btn_title');?></a> </div>
                <div class="excerpt" style="margin-bottom: 0px; font-size: 14px;">
                    <?php the_field('hero_text_register');?></div>
                <div style="text-align: center;">
                    <a class="btn btn-primary btn-xs-big" style="margin-left: 0px;"
                       href="<?php the_field('btn_register_link','options'); ?>" target="_blank"><?php the_field('hero_btn_register_text');?></a>
                </div>
            </div>
        </div>
        <div class="row no-gutters">
        </div>
    </div>
    <div class="col-md-12 padding-bottom-xs" style="padding-right: 0px; padding-left: 0px;">
        <div class="excerpt hero-last-text"
            style=" color: white; margin-bottom: 0px; font-size: 14px; text-align: center; background-color: gray; margin-top: 10px; padding-top: 5px; padding-bottom: 5px;">
            <p> <?php echo get_field('hero_last_text'); ?> </p> </div>
    </div>
</div>

<section id="infoSection" style="padding-top: 0px; padding-bottom: 0px;">
    <div class="col-md-12" style="padding-right: 0px; padding-left: 0px;">
        <div class="excerpt"
            style="margin-bottom: 25px; font-size: 42px; text-align: center; background-color: black; margin-top: 5px; color: white; padding-top: 25px; padding-bottom: 25px;">
            <?php the_field('form_field_title');?></div>
    </div>
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6 margin-top-25px" style="text-align:center">
                <div class="excerpt" style="font-size: 32px; text-align: center; color:black">
                    <?php the_field('pec_excerpt');?></div>
				<img src="http://propcrowd.com/wp-content/uploads/2019/01/libro_descarga.png" style="width: 183px;">
            </div>


            <div class="col-md-6 margin-top-25px" style="padding-bottom: 20px;">
				<?php echo do_shortcode('[contact-form-7 id="1136" title="Form Landing"]'); ?>
            </div>
        </div>
    </div>
	<div class="col-md-12" style="padding-right: 0px; padding-left: 0px;">
        <div class="excerpt"
            style="margin-bottom: 0px; font-size: 14px; background-color: #dcdcdc; margin-top: 10px; color:white; padding-left: 20px; padding-right: 20px;">
            <?php the_field('form_policy_text');?></div>
    </div>
    <div class="container no-padding">
        <div class="row no-gutters">
                <div class="col-md-6" style="padding-right: 0px; padding-left: 0px;">
                <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//propcrowd.com/oportunidades/calella">
                    <div class="excerpt"
                        style="margin-bottom: 0px; font-size: 20px; background-color: #3a5f96; margin-top: 10px; color:white; padding-left: 20px; padding-right: 20px; text-align: center; padding-top: 10px; padding-bottom: 10px; margin-bottom: 0px; margin-top: 0px;">
                        <i class="fab fa-facebook-f"> </i> Comparte
                    </div>
                </a>
                </div>

            <div class="col-md-6" style="padding-right: 0px; padding-left: 0px;">
            <a href="https://twitter.com/home?status=http%3A//propcrowd.com/oportunidades/calella">
                <div class="excerpt"
                    style="margin-bottom: 0px; font-size: 20px; background-color: #57c0ef; margin-top: 10px; color:white; padding-left: 20px; padding-right: 20px; text-align: center; padding-top: 10px; padding-bottom: 10px; margin-bottom: 0px; margin-top: 0px;">
                    <i class="fab fa-twitter"> </i> Tuitea
                </div>
            </a>
            </div>

        </div>
    </div>
</section>

<style>
.hero-last-text p{
	margin-bottom: 0px !important;
}


input[type=text], input[type=email], input[type=tel] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid black;
  border-radius: 40px;
}
input[type=button], input[type=submit], input[type=reset] {
  background-color: black;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 40px;
  width: 100%;
}
form label{
	width: 100%;
}
.wpcf7-list-item {
	margin-left: 0px !important;
}
#mainHero{
		max-height: 710px;
}
.margin-top-25px{
    margin-top: 25px;
}

.navbar .navbar-brand {
background: url("/wp-content/themes/propcrowd/assets/images/brand.svg") no-repeat center/cover;
/*color: transparent;
font-size: 0;
width: 180px;
height: 52px;
padding: 0;
margin: 0;*/
}

@media only screen and (max-width: 991px) {
  .hero-last-text {
    margin-top: 20px !important;
  }
  #mainHero{
      max-height: 610px;
  }
}
@media only screen and (max-width: 854px) {
  .padding-bottom-xs{
      margin-bottom: 32px;
  }
}
@media only screen and (min-width: 767px) {
	.hero-tittle {
		font-size: 30px !important;
		margin-bottom: 0px !important;
		color: black !important;
	}
}
@media only screen and (max-width: 767px) {
    .wpcf7-response-output {
    top: 50% !important;
    }
    .alinear{
        padding-left: 0px !important;
    }
	.hero-tittle {
		font-size: 30px !important;
		margin-bottom: 0px !important;
		color: black !important;
	}
	#mainHero{
        margin-top: 20px;
		max-height: 985px;
	}
    .no-padding{
        padding-left: 0px;
        padding-right: 0px 
    }

@media only screen and (max-width: 536px) {

	#mainHero{
        margin-top: 20px;
		max-height: 950px;
	}

}
@media only screen and (max-width: 435px) {

	#mainHero{
        margin-top: 20px;
		max-height: 975px;
	}

}
@media only screen and (max-width: 415px) {

	#mainHero{
        margin-top: 20px;
		max-height: 945px;
	}

}
@media only screen and (max-width: 412px) {

	#mainHero{
        margin-top: 20px;
		max-height: 930px;
	}

}
@media only screen and (max-width: 376px) {

	#mainHero{
        margin-top: 20px;
		max-height: 945px;
	}
@media only screen and (max-width: 325px) {

	#mainHero{
        margin-top: 20px;
		max-height: 990px;
	}

}





</style>

<?php
get_footer();

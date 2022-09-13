<?php $data = get_fields(get_option('page_on_front')); ?>

<div class="popup-oportunities-wrapper">
	<div class="popup-oportunities">
		<div class="close">&times;</div>
		<?php 
		echo $data['popup_title'] ? '<div class="title">'.$data['popup_title'].'</div>' : '';
		echo $data['popup_content'] ? '<div class="content">'.$data['popup_content'].'</div>' : '';
		if($data['popup_checkbox']): ?>
			<div class="footer">
				<label for="accept">
					<span><?php echo $data['popup_checkbox']; ?></span>
					<input type="checkbox" id="accept">
					<span></span>
				</label>
			</div>
		<?php endif; ?>
	</div><?php //popup-oportunities ?>
</div><?php //popup-oportunities-wrapper ?>



<?php add_action('wp_footer', function(){ ?>
<script>
function openpopup(href, target){
	jQuery('.popup-oportunities-wrapper').addClass('in');

	jQuery('.popup-oportunities-wrapper #accept').on('change', function(){

		setTimeout(() => {
			jQuery('.popup-oportunities .title').text('<?= pll_e('Te estamos redirigiendo...') ?>').css('textAlign', 'center');
			jQuery('.popup-oportunities .content').hide();
			jQuery('.popup-oportunities .footer').hide();
			jQuery('.popup-oportunities').css({paddingTop: '150px', paddingBottom: '200px'});
			window.location.href = href;
		}, 400);

	});

	// Cierra el popup si se clickea sobre el overlay
	jQuery('.popup-oportunities-wrapper').on('click', function(e){
		if(e.target !== this) return;
		jQuery(this).removeClass('in');
	})

	// Cierra el popup si se clickea en la X
	jQuery('.popup-oportunities .close').on('click', function(e){
		jQuery('.popup-oportunities-wrapper').removeClass('in');
	})
}
</script>
<?php }, 999);
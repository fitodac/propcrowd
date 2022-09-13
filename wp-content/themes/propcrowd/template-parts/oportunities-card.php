<?php 
$token = hash('sha256', $projID.APIKEY.strrev($projID));

$url = 'http://mk.propcrowd.com/api/projects?code='.$projID.'&token='.$token;
$json = file_get_contents($url);
$api = json_decode($json);
?>


<div id="item-<?php echo $api->id; ?>" class="card op--card mb-4">
	<?php echo $api->status ? '<span class="op--status" style="background-color:'. $api->status_color .'">'. $api->status .'</span>' : '' ?>

	<div class="card-body">
		<?php echo $api->title ? '<h4 class="op--title">'. $api->title .'</h4>' : '' ?>
		<div class="op--address"><?= $api->address->street.', '.$api->address->postal_code.', '.$api->address->city ?></div>
		<div class="op--address"><?= $api->building_type ?></div>
	</div><?php //card-body ?>


	<?php if($api->images): ?>
		<div class="op--images">
			<figure>
				<?php foreach($api->images as $img ): 
					echo $img->is_main ? '<img src="'. $img->url .'" alt="'. $img->name .'">' : ''; 
				endforeach; ?>
			</figure>
		</div><?php //images ?>
	<?php endif; ?>


	<div class="card-body">
		<div class="row">
			<div class="col-6 d-flex flex-flow-column">
				<label><?= pll_e('Financiado') ?></label>
				<span class="op--fund">
					<?= $api->fund_amount ?><span class="euro">€</span>
					<span class="op--percent"><?= number_format($api->percent) ?>%</span>
				</span>
			</div>

			<div class="col-6 text-right d-flex flex-flow-column">
				<label><?= pll_e('Objetivo') ?></label>
				<span class="op--objective"><?= number_format($api->amount) ?>€</span>
			</div>
		</div><?php //row ?>

		<div class="op--progress progress">
			<div class="progress-bar" role="progressbar" style="width:<?= $api->percent ?>%" aria-valuenow="<?php echo str_replace("%", "", $api->percent) ?>" aria-valuemin="0" aria-valuemax="100"></div>
		</div>

		<div class="op--info">
			<span class="op--investors"><?php echo $api->num_lenders .' '; echo 1 == $api->num_lenders ? pll_e('Inversor') : pll_e('Inversores') ?></span>
			<span class="op--investors"><?= pll_e('Quedan') ?> <strong><?= explode(' ', $api->left_time)[0] ?> <?= pll_e('días') ?></strong></span>
		</div>

		<div class="row mb-4">
			<div class="col-4 border-right">
				<label><?= pll_e('Tir') ?></label>
				<span class="op--tir"><?= $api->anual_tir ?><span class="euro">%</span></span>
				<small><?= pll_e('anual') ?></small>
			</div>

			<div class="col-4 border-right">
				<label><?= pll_e('Plazo') ?></label>
				<span class="op--months"><?= $api->months ?></span>
				<small><?= pll_e('meses') ?></small>
			</div>

			<div class="col-4">
				<label><?= pll_e('Tipo') ?></label>
				<span class="op--type"><?= $api->investment_type ?></span>
			</div>
		</div><?php //row ?>

		<a class="btn btn-secondary btn-block" href="<?= $api->url ?>" target="_blank"><?= pll_e('Más Información') ?></a>

		<div class="op--footer"><?= pll_e('Inversión mínima') ?>: <?= $api->min_investment ?>€</div>

	</div><?php //card-body ?>

</div><?php //card ?>
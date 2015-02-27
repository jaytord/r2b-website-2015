<div id="clients-page" class="page-content-inner">
	<div class="page-header"><div class="page-header-inner">
		<h2>CLIENTS</h2>
		<p>Cornhole authentic 90's American Apparel. YOLO letterpress ugh, hashtag fanny pack fingerstache authentic mlkshk aesthetic blog master cleanse craft beer PBR.</p>
	</div></div>

	<div class="cfm-project-gallery">
		<ul><!--
			<?php foreach ($data as $key => $client): ?>
			--><li data-id="<?= $client->id; ?>" data-image="<?= base_url().'img/clients/'.$client->thumbnail_image.'.jpg'; ?>">
				<div class="project-inner">
					<a class="cfm-project"></a>
				</div>
			</li><!--
			<?php endforeach; ?>
		--></ul>
	</div>
</div>


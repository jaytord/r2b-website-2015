<div id="clients-page" class="page-content-inner">
	<div class="page-header"><div class="page-header-inner">
		<h1>BRANDS WE WORK WITH</h1>
		<p>Research shows purpose-driven brands are measurably more successful. We work with organizations that are ready to discover, embrace and enhance their purpose and lean into a connected world.</p>
	</div></div>
	<div class="cfm-project-gallery">
		<ul>
			<?php foreach ($data as $key => $client): ?>
			<li data-id="<?= $client->id; ?>" data-image="<?= base_url().'img/clients/'.$client->thumbnail_image.'.jpg'; ?>">
				<div class="project-inner">
					<a class="cfm-project"></a>
				</div>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>


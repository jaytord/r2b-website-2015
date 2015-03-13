<div id="<?php echo $data->slug; ?>-gallery" class="project-asset-description">
	<div class="project-asset-description-inner">
		<h3><?php echo $asset->heading; ?></h3>
		<h2><?php echo $asset->subhead; ?></h2>
		<p><?php echo $asset->description; ?></p>
	</div>
</div>
<div class="cfm-project-gallery">
	<ul>
		<?php foreach ($asset->media as $key => $val): ?>
		<li data-id="<?= $val->media_id; ?>" data-image="<?php echo base_url().'img/assets/galleries/'.$val->filename.'.'.$val->media_type_name; ?>">
			<div class="project-inner <?php echo empty($val->title) ? 'hidelabel' : ''; ?>">
				<a class="cfm-project" <?php if(!empty($val->href)){ echo 'href="'.$val->href.'"'; } ?> target="_blank">
					<div class="project-label"><div class="project-label-inner"><h2><?= $val->title; ?></h2></div></div>
				</a>
			</div>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
<div class="asset-gallery">
	<ul>
		<?php foreach ($asset->media as $key => $val): ?>
		<li class="project-asset-image" data-image="<?php echo base_url().'img/assets/'.$val->filename.'.jpg'; ?>"></li>
		<?php endforeach; ?>
	</ul>
</div>
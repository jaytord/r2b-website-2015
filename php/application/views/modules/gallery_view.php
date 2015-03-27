<div id="<?php echo $data->slug; ?>-gallery" class="project-module-description">
	<div class="project-module-description-inner">
		<h3><?php echo $module->heading; ?></h3>
		<h2><?php echo $module->subhead; ?></h2>
		<p><?php echo $module->description; ?></p>
	</div>
</div>
<div class="cfm-project-gallery">
	<ul>
		<?php foreach ($module->media as $key => $val): ?>
		<li data-id="<?= $val->media_id; ?>" data-image="http://media.click3x.com/images/r2b/modules/gallery/<?php echo $val->filename.'.'.$val->media_type_name; ?>">
			<div class="project-inner <?php echo empty($val->title) ? 'hidelabel' : ''; ?>">
				<a class="cfm-project" <?php if(!empty($val->href)){ echo 'href="'.$val->href.'"'; } ?> target="_blank">
					<div class="project-label"><div class="project-label-inner"><h2><?= $val->title; ?></h2></div></div>
				</a>
			</div>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
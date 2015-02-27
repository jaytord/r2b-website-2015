<div id="casestudies-page" class="page-content-inner">
	<div class="page-header"><div class="page-header-inner">
		<h2>CASE STUDIES</h2>
		<p>Kale chips meditation cronut cold-pressed. Wayfarers plaid readymade sriracha, Carles mixtape.</p>
	</div></div>
	<div class="cfm-project-gallery">
		<ul>
			<?php foreach ($data as $key => $project): ?>
			<li data-id="<?= $project->id; ?>" data-image="http://media.click3x.com/images/410x410/<?php echo $project->thumbnail_image.'.jpg'; ?>">
				<div class="project-inner">
					<a class="cfm-project" href="<?= base_url(); ?>casestudy/<?= $project->slug; ?>" data-navigate-to="casestudy/<?= $project->slug; ?>">
						<div class="project-label"><div class="project-label-inner"><h2><?= $project->title; ?></h2></div></div>
					</a>
				</div>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
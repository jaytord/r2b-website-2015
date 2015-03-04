<div id="projects-page" class="page-content-inner">
	<div class="cfm-project-gallery">
		<ul>
			<?php foreach ($data as $key => $project): ?>
			<li data-id="<?= $project->id; ?>" data-image="<?php echo base_url().'img/projects/'.$project->thumbnail_image.'.jpg'; ?>">
				<div class="project-inner">
					<a class="cfm-project" href="<?= base_url().$category_slug.'/'.$project->slug; ?>" data-navigate-to="<?= $category_slug.'/'.$project->slug; ?>">
						<div class="project-label"><div class="project-label-inner"><h2><?= $project->title; ?></h2></div></div>
					</a>
				</div>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
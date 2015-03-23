<div id="projects-page" class="page-content-inner">
	<!-- <div class="page-header"><div class="page-header-inner">
		<div class="page-header-description">
			These projects were all built by our partner and parent company, the content execution powerhouse Click 3X.
		</div>	
	</div></div> -->
	<div class="cfm-project-gallery">
		<ul>
			<?php foreach ($data as $key => $project): ?>
			<li data-id="<?= $project->id; ?>" data-image="<?php echo base_url().'img/project_thumbnails/'.$project->thumbnail_image.'.jpg'; ?>">
				<div class="project-inner">
					<a class="cfm-project" href="<?= base_url().'project/'.$project->slug; ?>" data-navigate-to="project/<?= $project->slug; ?>">
						<div class="project-label"><div class="project-label-inner"><h2><?= $project->title; ?></h2></div></div>
					</a>
				</div>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
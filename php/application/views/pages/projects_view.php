<div id="projects-page" class="page-content-inner">
	<div class="cfm-project-gallery">
		<ul>
			<?php foreach ($data as $key => $project): ?>
			<li data-id="<?php echo $project->id; ?>" data-image="http://media.click3x.com/images/r2b/project_thumbnails/<?php echo $project->thumbnail_image; ?>.jpg">
				<div class="project-inner">
					<a class="cfm-project" href="<?php echo base_url().'project/'.$project->slug; ?>" data-navigate-to="project/<?php echo $project->slug; ?>">
						<div class="project-label"><div class="project-label-inner"><h2><?php echo $project->title; ?></h2></div></div>
					</a>
				</div>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
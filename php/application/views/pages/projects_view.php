<div id="projects-page" class="page-content-inner">
	<div class="page-header"><div class="page-header-inner">
		<h2>PROJECTS</h2>
		<p>Kale chips meditation cronut cold-pressed. Wayfarers plaid readymade sriracha, Carles mixtape.</p>
	</div></div>

	<div class="cfm-project-gallery">
		<ul>
			<?php foreach ($data as $key => $project): ?>
			<li data-id="<?= $project->id; ?>" data-image="<?= base_url().'img/projects/'.$project->image.'.jpg'; ?>">
				<div class="project-inner">
					<a class="cfm-project" href="<?= base_url(); ?>project/<?= $project->id; ?>" data-navigate-to="project/<?= $project->id; ?>">
						<div class="project-label"><div class="project-label-inner"><h3><?= $project->title; ?></h3></div></div>
					</a>
				</div>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
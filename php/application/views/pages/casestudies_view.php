<div id="casestudies-page" class="page-content-inner">
	<div class="page-header"><div class="page-header-inner">
		<h2>CASE STUDIES</h2>
		<p>Kale chips meditation cronut cold-pressed. Wayfarers plaid readymade sriracha, Carles mixtape.</p>
	</div></div>

	<div class="cfm-project-gallery">
		<ul>
			<?php foreach ($data as $key => $casestudy): ?>
			<li data-id="<?= $casestudy->id; ?>" data-image="<?= base_url().'img/projects/'.$casestudy->image.'.jpg'; ?>">
				<div class="project-inner">
					<a class="cfm-project" href="<?= base_url(); ?>project/<?= $casestudy->id; ?>" data-navigate-to="project/<?= $casestudy->id; ?>">
						<div class="project-label"><div class="project-label-inner"><h3><?= $casestudy->title; ?></h3></div></div>
					</a>
				</div>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
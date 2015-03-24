<div id="home-page" class="page-content-inner">
	<div id="reel-video" class="cfm-videoplayer" holdlastframe autoplay data-video-name="video/2015_R2B_WebTeaser" data-poster="<?= base_url(); ?>img/assets/video_posters/reel_poster.jpg">
	    <div class="cfm-videoplayer-inner">
	    	<div class="video-anchor-link"><a href="#montage-video"><span class="label">Watch Our Montage</span><span class="arrow"></span></a></div>
            <video class="cfm-videoplayer-mobile" width="960" height="540" controls></video>
            <div class="cfm-videoplayer-poster">
            	<div class="cfm-videoplayer-poster-inner">
					 <div class="cfm-videoplayer-playbutton"><span class="arrow"></span></div>
				</div>
            </div>
            <video class="cfm-videoplayer-desktop" width="960" height="540"></video>
            <div class="cfm-video-controls">
            	<ul>
					<li class="cfm-video-play-pause-btn cfm-video-btn"></li>
					<li class="cfm-video-fullscreen-btn cfm-video-btn"></li>
					<li class="cfm-video-mute-btn cfm-video-btn"></li>
				</ul><div class="cfm-video-progress-container"><a class="cfm-video-seek-bar"></a><input class="cfm-video-seek-bar-input" type="range" value="0"></div>
			</div>
	    </div>
	</div>
	<div class="main-navigation-gallery cfm-project-gallery">
		<ul>
			<li id="p1">
				<div class="project-inner">
					<a href="<?= base_url(); ?>about" data-navigate-to="about">
						<div class="project-label"><div class="project-label-inner"><h3>ABOUT</h3></div></div>
					</a>
				</div>
			</li>
			<li id="p3">
				<div class="project-inner">
					<a href="<?= base_url(); ?>projects" data-navigate-to="projects">
						<div class="project-label"><div class="project-label-inner"><h3>OUR WORK</h3></div></div>
					</a>
				</div>
			</li>
			<li id="p4">
				<div class="project-inner">
					<a href="<?= base_url(); ?>clients" data-navigate-to="clients">
						<div class="project-label"><div class="project-label-inner"><h3>CLIENTS</h3></div></div>
					</a>
				</div>
			</li>
			<li id="p5">
				<div class="project-inner">
					<a href="<?= base_url(); ?>contact" data-navigate-to="contact" >
						<div class="project-label"><div class="project-label-inner"><h3>CONTACT</h3></div></div>
					</a>
				</div>
			</li>
		</ul>
	</div>
	<div class="section-header">
		<h2>FEATURED WORK</h2>
	</div>
	<div class="cfm-project-gallery">
		<ul>
			<?php foreach ($featured_projects as $key => $project): ?>
			<li data-id="<?php echo $project->id; ?>" data-image="<?php echo base_url().'img/project_thumbnails/'.$project->thumbnail_image.'.jpg'; ?>">
				<div class="project-inner">
					<a class="cfm-project" href="<?php echo base_url().'featured/'.$project->slug; ?>" data-navigate-to="featured/<?php echo $project->slug; ?>">
						<div class="project-label"><div class="project-label-inner"><h2><?php echo $project->title; ?></h2></div></div>
					</a>
				</div>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div id="montage-video" class="section-header">
		<h2>2015 MONTAGE</h2>
	</div>
	<div id="reel-videoplayer" class="cfm-videoplayer" data-video-name="<?= base_url(); ?>video/r2b_reel_01" data-poster="<?= base_url(); ?>img/assets/video_posters/montage_poster.jpg">
	    <div class="cfm-videoplayer-inner">
            <video class="cfm-videoplayer-mobile" width="960" height="540" controls></video>
            <div class="cfm-videoplayer-poster">
            	<div class="cfm-videoplayer-poster-inner">
	            	<div class="cfm-videoplayer-playbutton"><span class="arrow"></span></div>
	            </div>
            </div>
            <video class="cfm-videoplayer-desktop" width="960" height="540"></video>
            <div class="cfm-video-controls">
            	<ul>
					<li class="cfm-video-play-pause-btn cfm-video-btn"></li>
					<li class="cfm-video-fullscreen-btn cfm-video-btn"></li>
					<li class="cfm-video-mute-btn cfm-video-btn"></li>
				</ul><div class="cfm-video-progress-container"><a class="cfm-video-seek-bar"></a><input class="cfm-video-seek-bar-input" type="range" value="0"></div>
			</div>
	    </div>
	</div>
</div>
<div class="page-header">
	<div class="page-header-inner">
		<div class="cfm-project-naviation cfm-navigation">
			<ul>
				<li><a href="<?php echo base_url().$parent["slug"]; ?>" data-navigate-to="<?php echo $parent["slug"]; ?>" ><span class="line-arrow-left line-arrow"></span><?php echo $parent["title"]; ?></a></li>
				
				<?php if( !empty($next) ) : ?>
				<li class="next-button"><a href="<?php echo base_url(). $page_slug. '/' . $next; ?>" data-navigate-to="<?php echo $page_slug. '/' . $next; ?>" ><span class="line-arrow-right line-arrow"></span></a></li>
				<?php endif; ?>
				<?php if( !empty($previous) ) : ?>
				<li class="previous-button"><a href="<?php echo base_url(). $page_slug. '/' . $previous; ?>" data-navigate-to="<?php echo $page_slug. '/' . $previous; ?>" ><span class="line-arrow-left line-arrow"></span></a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>
<div class="project-detail">
	<div id="featured-video" class="cfm-videoplayer" data-video="http://media.click3x.com/video/<?php echo $assets[0]->filename; ?>.mp4" data-poster="http://media.click3x.com/images/700x394/<?php echo $assets[0]->filename; ?>.jpg">
	    <div class="cfm-videoplayer-inner">
	        <div class="cfm-videoplayer-player">
	            <video class="cfm-videoplayer-mobile" width="960" height="540" controls></video>
	            <div class="cfm-videoplayer-poster"><div class="cfm-videoplayer-playbutton"><span class="arrow"></span></div></div>
	            <video class="cfm-videoplayer-desktop" width="960" height="540" controls></video>
	        </div>
	    </div>
	</div>
	<div class="project-about">
		<div class="project-about-inner">
			<div class="project-logo" data-image="<?php echo $client_logo; ?>"></div>
			<div class="project-description">
				<div class="project-description-inner">
	            	<h1><?php echo $data->title; ?></h1>
					<p><?php echo $data->description; ?></p>
					<div class="project-links-menu">
			            <div class="project-links-menu-inner">
			                <ul>
			                	<?php foreach ( $links as $key => $link ): ?>
			                    <li><a target="_blank" href="<?php echo $link->href; ?>"><h4><?php echo strtoupper( $link->label ); ?></h4></a></li>
			                    <?php endforeach; ?>
			                </ul>
				        </div>
					</div>
				</div>
            </div>
		</div>
	</div>
	<?php for($i = 1; $i<count($assets); $i++): $asset=$assets[$i] ?>
	<div class="project-assets-container">
		<div class="project-asset">
			<div id="featured-video" class="cfm-videoplayer" data-video="http://media.click3x.com/video/<?php echo $asset->filename; ?>.mp4" data-poster="http://media.click3x.com/images/700x394/<?php echo $asset->filename; ?>.jpg">
			    <div class="cfm-videoplayer-inner">
			        <div class="cfm-videoplayer-player">
			            <video class="cfm-videoplayer-mobile" width="960" height="540" controls></video>
			            <div class="cfm-videoplayer-poster"><div class="cfm-videoplayer-playbutton"><span class="arrow"></span></div></div>
			            <video class="cfm-videoplayer-desktop" width="960" height="540" controls></video>
			        </div>
			    </div>
			</div>
			<div class="project-asset-description">
				<h3><?php echo $asset->title; ?></h3>
				<p><?php echo $asset->description; ?></p>
			</div>
		</div>
	</div>
	<?php endfor; ?>
	</div>
</div>
<div class="project-asset-description">
	<div class="project-asset-description-inner">
		<h2><?php echo $asset->title; ?></h2>
	</div>
</div>
<div class="cfm-videoplayer project-asset-video" data-video="http://media.click3x.com/video/<?php echo $asset->media[0]->filename; ?>.mp4" data-poster="<?php echo base_url().'img/assets/'.$asset->media[0]->filename; ?>.jpg">
    <div class="cfm-videoplayer-inner">
        <video class="cfm-videoplayer-mobile" width="960" height="540" controls></video>
        <div class="cfm-videoplayer-poster">
            <div class="cfm-videoplayer-poster-header"><div class="cfm-videoplayer-poster-header-inner">
              <h1><?php echo $asset->heading; ?></h1>
              <h2><?php echo $asset->subhead; ?></h2>
              <p><?php echo $asset->blurb; ?></p>
              <div class="cfm-videoplayer-playbutton"><span class="arrow"></span><span class="label">Video Case Study</span></div>
            </div></div>
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
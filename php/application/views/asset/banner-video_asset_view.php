<div class="project-asset-description">
	<div class="project-asset-description-inner">
		<h2><?php echo $asset->title; ?></h2>
	</div>
</div>
<div class="cfm-videoplayer project-asset-video" data-video="http://media.click3x.com/video/<?php echo $asset->media[0]->filename; ?>.mp4" data-poster="<?php echo base_url().'img/assets/'.$asset->media[0]->filename; ?>.jpg">
    <div class="cfm-videoplayer-inner">
        <div class="cfm-videoplayer-player">
            <video class="cfm-videoplayer-mobile" width="960" height="540" controls></video>
            <div class="cfm-videoplayer-poster"><div class="cfm-videoplayer-playbutton"><span class="arrow"></span></div></div>
            <video class="cfm-videoplayer-desktop" width="960" height="540" controls></video>
        </div>
    </div>
</div>
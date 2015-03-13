<div class="page-header-navigation">
	<div class="page-header-inner">
		<div class="cfm-project-naviation cfm-navigation">
			<ul>
				<li><a href="<?php echo base_url().$parent_slug; ?>" data-navigate-to="<?php echo $parent_slug; ?>" ><span class="line-arrow-left line-arrow"></span><?php echo $parent_slug == "campaigns" ? 'Campaigns' : 'Projects'; ?></a></li>
				<?php if( !empty($next) ) : ?>
				<li class="next-button"><a href="<?php echo base_url(). $category_slug. '/' . $next; ?>" data-navigate-to="<?php echo $category_slug. '/' . $next; ?>" ><span class="line-arrow-right line-arrow"></span></a></li>
				<?php endif; ?>
				<?php if( !empty($previous) ) : ?>
				<li class="previous-button"><a href="<?php echo base_url(). $category_slug. '/' . $previous; ?>" data-navigate-to="<?php echo $category_slug. '/' . $previous; ?>" ><span class="line-arrow-left line-arrow"></span></a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>
<div class="project-detail">
	<div class="project-heading">
		<div class="project-heading-inner">
			<h2><?php echo $data->heading; ?></h2>
			<h1><?php echo $data->subhead; ?></h1>
			<?php if( count($assets) > 1): ?><div class="video-anchor-link"><a href="#<?php echo $data->slug; ?>-video"><span class="arrow"></span><span class="label"><?php echo !empty($assets[1]->title) ? $assets[1]->title : "Watch Video"; ?></span></a></div><?php endif; ?>
		</div>
	</div>
	<div class="featured-asset">
		<div class="featured-asset-inner project-asset-inner">
			<? $this->load->view( "asset/".$assets[0]->asset_type_name."_asset_view", array("asset"=>$assets[0]) ); ?>
		</div>
	</div>
	<div class="project-about">
		<div class="project-about-inner">
			<div class="project-asset-image project-logo" data-image="<?php echo $client_logo; ?>"></div>
			<div class="project-description">
				<div class="project-description-inner">
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
	<div class="project-assets-container">
		<?php for($i = 1; $i<count($assets); $i++): $asset=$assets[$i] ?>
			<div class="project-asset <?php echo $asset->asset_type_name; ?>">
				<div class="project-asset-inner">
				<? $this->load->view( "asset/".$asset->asset_type_name."_asset_view", array("asset"=>$asset) ); ?>
				</div>
			</div>
		<?php endfor; ?>
	</div>
</div>
<div class="page-footer-navigation">
	<div class="page-footer-inner">
		<div class="cfm-project-naviation cfm-navigation">
			<ul>
				<li><a href="<?php echo base_url().$parent_slug; ?>" data-navigate-to="<?php echo $parent_slug; ?>" ><span class="line-arrow-left line-arrow"></span><?php echo $parent_slug == "campaigns" ? 'Campaigns' : 'Projects'; ?></a></li>
				<?php if( !empty($next) ) : ?>
				<li class="next-button"><a href="<?php echo base_url(). $category_slug. '/' . $next; ?>" data-navigate-to="<?php echo $category_slug. '/' . $next; ?>" ><span class="line-arrow-right line-arrow"></span></a></li>
				<?php endif; ?>
				<?php if( !empty($previous) ) : ?>
				<li class="previous-button"><a href="<?php echo base_url(). $category_slug. '/' . $previous; ?>" data-navigate-to="<?php echo $category_slug. '/' . $previous; ?>" ><span class="line-arrow-left line-arrow"></span></a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</div>
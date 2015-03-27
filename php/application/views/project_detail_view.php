<div class="page-header-navigation">
	<div class="page-header-inner">
		<div class="cfm-project-naviation cfm-navigation">
			<ul>
				<li><a href="<?php echo base_url().$parent_slug; ?>" data-navigate-to="<?php echo $parent_slug; ?>" ><span class="line-arrow-left line-arrow"></span><?php echo $parent_slug == "home" ? 'Home' : 'All Work'; ?></a></li>
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
			<?php if( isset($modules) && count($modules) > 1): ?><div class="video-anchor-link"><a href="#<?php echo $data->slug; ?>-video"><span class="arrow"></span><span class="label"><?php echo !empty($modules[1]->title) ? $modules[1]->title : "Watch Case Study"; ?></span></a></div><?php endif; ?>
		</div>
	</div>
	<div class="featured-module">
		<div class="featured-module-inner project-module-inner">
			<?php if( isset($modules) && count($modules) > 0): ?>
			<?php $this->load->view( "modules/".$modules[0]->module_type_name."_view", array("module"=>$modules[0]) ); ?>
			<?php endif; ?>
		</div>
	</div>
	<div class="project-about">
		<div class="project-about-inner">
			<div class="project-module-image project-logo" data-image="http://media.click3x.com/images/r2b/client_logos/<?php echo $data->client_logo; ?>.jpg"></div>
			<div class="project-description">
				<div class="project-description-inner">
					<?php 
						$desc = $data->description;
						$desc = str_replace("\n\n", "</p><p>", $desc);
						$desc = str_replace("\r", "<br />", $desc);
						$desc = str_replace("\n", "<br />", $desc);
					?>
					<p><?php echo $desc; ?></p>
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
	<div class="project-module-container">
		<?php if(isset($modules)): for($i = 1; $i<count($modules); $i++): $module=$modules[$i] ?>
			<div class="project-module <?php echo $module->module_type_name; ?>">
				<div class="project-module-inner">
				<?php $this->load->view( "modules/".$module->module_type_name."_view", array("module"=>$module) ); ?>
				</div>
			</div>
		<?php endfor; endif; ?>
	</div>
</div>
<div class="page-footer-navigation">
	<div class="page-footer-inner">
		<div class="cfm-project-naviation cfm-navigation">
			<ul>
				<li><a href="<?php echo base_url().$parent_slug; ?>" data-navigate-to="<?php echo $parent_slug; ?>" ><span class="line-arrow-left line-arrow"></span><?php echo $parent_slug == "home" ? 'Home' : 'All Work'; ?></a></li>
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
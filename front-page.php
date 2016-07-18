<?php get_header(); ?>
<?php
if (have_posts()) :
	while (have_posts()) :
		the_post();
?>
                    	<div class="main-header">
							<div class="post-update">
    	                   		<span class="fa fa-history fa-fw"></span>
        	                    <time class="entry-date date updated post-update-font" datetime="<?php the_modified_time('c') ?>"><?php if ($mtime = get_mtime('Y/n/j')) echo $mtime; ?></time>
            	            </div>
                	    	<h1 class="single-title u-mb-small"><?php the_title(); ?></h1>
                        </div>
                        <div class="body">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/header.png" width="100%" height="100%" alt=""/>
							<div class="body-content">
<?php the_content(); ?>
							</div>
<?php include( STYLESHEETPATH . '/shared-button.php' ); ?>
<?php
	endwhile;
endif;
?>
<?php get_sidebar('right'); ?>
<?php get_sidebar('left'); ?>
<?php get_footer(); ?>

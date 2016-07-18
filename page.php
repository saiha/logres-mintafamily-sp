<?php get_header(); ?>
                    	<div class="main-header">
<?php
if (have_posts()) :
	while (have_posts()) :
		the_post();
?>
<?php if (get_mtime('c') == null) : ?>
							<div class="post-date">
    	                   		<span class="fa fa-clock-o fa-fw" ></span>
        	                    <time class="entry-date date published" datetime="<?php the_modified_time('c') ?>"><?php the_time('Y/n/j') ;?></time>
            	            </div>
                            <div class="post-update cf"></div>
<?php endif; ?>
<?php if (get_mtime('c') != null) : ?>
							<div class="post-date">
    	                   		<span class="fa fa-clock-o fa-fw" ></span>
        	                    <span class="entry-date date published"><?php the_time('Y/n/j') ;?></span>
            	            </div>
							<div class="post-update cf">
    	                   		<span class="fa fa-history fa-fw"></span>
        	                    <time class="entry-date date updated" datetime="<?php the_modified_time('c') ?>"><?php if ($mtime = get_mtime('Y/n/j')) echo $mtime; ?></time>
            	            </div>
<?php endif; ?>
                	    	<h1 class="single-title u-mb-small"><?php the_title(); ?></h1>
                        </div>
                        <div class="body">
							<div class="body-content">
<?php
		the_content();
	endwhile;
?>
							</div><!-- /.body-content -->
<?php
endif;
?>
<?php echo sp_ad_02(); ?>
<?php wp_related_posts(); ?> 
<?php get_sidebar('right'); ?>
<?php get_sidebar('left'); ?>
<?php get_footer(); ?>

<?php get_header(); ?>
<?php
if (have_posts()) :
	while (have_posts()) :
		the_post();
?>
                    	<div class="main-header">
							<div class="post-update">
    	                   		<span class="fa fa-history fa-fw"></span>
        	                    <time class="entry-date date updated post-update-font" datetime="2016-05-15">2016/5/15</time>
            	            </div>
                	    	<h1 class="single-title u-mb-small"><?php the_title(); ?></h1>
                        </div>
                        <div class="body">
<?php
		the_content();
	endwhile;
endif;
?>
<?php get_sidebar('left'); ?>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>

<?php get_header(); ?>
                    	<div class="main-header">
                	    	<h1 class="single-title u-mb-small"><?php single_cat_title(); ?></h1>
                        </div>
                        <div class="body">
							<div class="body-content">
<?php
if (have_posts()) :
	while (have_posts()) :
		the_post();
?>
							<div class="archive-article cf">
                            	<div class="archive-title"><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></div>
                            	<div class="archive-date cf">
                                	<span class="fa fa-clock-o fa-fw" ></span>
                                	<span class="entry-date date published"><?php the_time('Y/n/j') ;?></span>
				                    <span class="post-views"><?php echo getPostViews($post); ?></span>
                                </div>
                                <div class="archive-article-img">
	                            	<a href="<?php the_permalink(); ?>" class="new-entry-title"><?php the_post_thumbnail(); ?></a>
                                </div>
                                <div class="archive-text">
<?php
		the_excerpt();
?>
								</div>
                            </div><!-- /.archive-article -->
<?php
	endwhile;
?>
<?php
endif;
?>
                        </div><!-- /.body-content -->
<?php echo sp_ad_02(); ?>
<?php wp_related_posts(); ?> 
<?php get_sidebar('right'); ?>
<?php get_sidebar('left'); ?>
<?php get_footer(); ?>

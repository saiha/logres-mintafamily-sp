<?php query_posts('posts_per_page=7&ignore_sticky_posts=1'); ?>
<div class="content-right">
<?php if ( have_posts() ) : ?>
	<ul>
<?php while ( have_posts() ) : the_post(); ?>
    	<li>
			<div class="show-post">
  				<div class="show-post-img">
<?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理 ?>
    				<a href="<?php the_permalink(); ?>" class="new-entry-title"><?php the_post_thumbnail(); ?></a>
<?php else: // サムネイルを持っていないときの処理 ?>
    				<a href="<?php the_permalink(); ?>" class="new-entry-title"><img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt="NO IMAGE" title="NO IMAGE" width="90px" height="90" /></a>
<?php endif; ?>
    			</div><!-- /.show-post-img -->
				<div class="show-post-body">
                	<span class="fa fa-clock-o fa-fw show-post-time" ><?php the_time('Y/n/j') ;?></span>
					<a href="<?php the_permalink(); ?>" class="new-entry-title"><span class="show-post-title cf" ><?php the_title();?></span></a>
				</div><!-- /.show-post-body -->
			</div><!-- /.show-post -->
        </li>
<?php endwhile; ?>
	</ul>
<?php endif; ?>
<?php wp_reset_query(); ?>
</div><!-- /.content-right -->

<div class="content-right">
<?php
// views post metaで記事のPV情報を取得する
//setPostViews(get_the_ID());
// ループ開始
//query_posts('meta_key=post_views_count&orderby=meta_value_num&posts_per_page=7&post_date<&order=DESC');
my_query_posts('date_from=' . date("Y/m/d", strtotime("-30 day"  )) . '&date_to=' . date("Y-m-d") . '&meta_key=post_views_count&orderby=meta_value_num&posts_per_page=7&order=DESC');
if (have_posts()) : ?>
	<ul>
<?php while(have_posts()) : the_post(); ?>
		<li>
			<!-- 記事の表示 -->
			<div class="show-post">
				<!-- サムネイルの表示 -->
				<div class="show-post-img">
<?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理 ?>
    				<a href="<?php the_permalink(); ?>" class="new-entry-title"><?php the_post_thumbnail(); ?></a>
<?php else: // サムネイルを持っていないときの処理 ?>
    				<a href="<?php the_permalink(); ?>" class="new-entry-title"><img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png" alt="NO IMAGE" title="NO IMAGE" width="90px" height="90" /></a>
<?php endif; ?>
                </div><!-- /.show-post-img -->
				<!-- タイトルの表示 -->
                <div class="show-post-body">
                	<span class="fa fa-clock-o fa-fw show-post-time" ><?php the_time('Y/n/j') ;?></span>
                    <span class="popular-post-views"><?php echo getPostViews($post); ?></span>
					<a href="<?php the_permalink(); ?>" class="new-entry-title"><span class="show-post-title cf" ><?php the_title();?></span></a>
				</div><!-- /.show-post-body -->
            </div><!-- /.show-post -->
        </li> 
<?php endwhile; ?>
	</ul>
<?php endif; ?>
<?php wp_reset_query(); ?>
</div><!-- /.content-right -->

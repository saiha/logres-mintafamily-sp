<?php get_header(); ?>
                    	<div class="main-header">
                	    	<h1 class="single-title u-mb-small"><?php the_title(); ?></h1>
                        </div>
                        <div class="body">
<?php
if (have_posts()) :
$get_page_id = get_page_by_path('guide/medal')->ID;
//$args = array( 'posts_per_page' => 10, 'order'=> 'ASC', 'post_parent' => $get_page_id, 'post_type' => 'page' );
$args = array( 'posts_per_page' => 10, 'order'=> 'ASC', 'tag' => 'medal-category', 'post_type' => 'page' );
//var_dump($args);
$postslist = get_posts( $args );
?>
<span>目次</span>
  <div id="index">
    <ul>
<?php
foreach ( $postslist as $post ) :
  setup_postdata( $post ); ?>
      <li>
        <a href="#<?php echo $post->post_name; ?>"><?php the_title(); ?></a>
      </li>
<?php
  //endwhile;
endforeach;
wp_reset_postdata();
?>
    </ul>
  </div>
<?php
?>
<?php
if ( count($postslist) > 0 ) :
foreach ( $postslist as $post_old ) :
  //$args_detail = array( 'posts_per_page' => 100, 'order'=> 'ASC', 'post_parent' => $post_old->ID, 'post_type' => 'page' );
$args_detail = array( 'posts_per_page' => 100, 'order'=> 'ASC', 'tag' => $post_old->post_name, 'post_type' => 'page', 'orderby' => 'menu_order' );?>
  <div>
  <h3 id="<?php echo $post_old->post_name; ?>"><?php echo $post_old->post_title; ?></h3>
  
<?php
  //var_dump($args_detail);
  $postslist_detail = get_posts( $args_detail );
  if ( count($postslist_detail) > 0 ) :
?>
      <table class="medal">
        <tr>
          <th class="medal-name">メダル名</th>
          <th class="medal-img">メダル画像</th>
          <th class="medal-get">入手先</th>
          <th class="medal-zokusei">属性</th>
          <th class="medal-charaabi">キャラ<br>アビ</th>
        </tr>
<?php
    //var_dump($postslist_detail);
    foreach ( $postslist_detail as $post ) :
      setup_postdata( $post );
	  //var_dump($post_detail);
?>
        <tr>
          <td style="vertical-align: middle;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
          <td style="vertical-align: middle; align: center;"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('very_small_thumbnail', array('alt' => the_title_attribute('echo=0'), 'title' => the_title_attribute('echo=0'))); ?></a></td>
          <td style="vertical-align: middle;"><?php the_field('monster'); ?></td>
          <td style="vertical-align: middle; text-align: center;"><?php the_field('zokusei'); ?></td>
          <td style="vertical-align: middle;"><?php the_field('chara-ability'); ?></td>
        </tr>
<?php
    wp_reset_postdata();
    endforeach;
?>
      </table>
<?php
  endif;
?>
  </div>
<?php
endforeach;
endif;
?>
<?php
endif;
?>
<?php echo sp_ad_02(); ?>
<?php wp_related_posts(); ?> 
<?php get_sidebar('right'); ?>
<?php get_sidebar('left'); ?>
<?php get_footer(); ?>


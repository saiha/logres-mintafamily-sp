<?php

/*
  get_the_modified_time()の結果がget_the_time()より古い場合はget_the_time()を返す。
  同じ場合はnullをかえす。
  それ以外はget_the_modified_time()をかえす。
*/
 
function get_mtime($format) {
    $mtime = get_the_modified_time('Ymd');
    $ptime = get_the_time('Ymd');
    if ($ptime > $mtime) {
        return get_the_time($format);
    } elseif ($ptime === $mtime) {
        return null;
    } else {
        return get_the_modified_time($format);
    }
}

function sp_only_shortcode( $atts, $content = null ) {
	if (is_mobile()) {
	    return $content;
	} else {
		return '';
	}
}
add_shortcode('sp_only', 'sp_only_shortcode');

function pc_only_shortcode( $atts, $content = null ) {
	if (!is_mobile()) {
	    return $content;
	} else {
		return '';
	}
}
add_shortcode('pc_only', 'pc_only_shortcode');

if (!is_admin()) {
  $cssdir = get_template_directory_uri();
  // 自作スクリプトをページにリンク
  wp_enqueue_script( 'theme-script', $cssdir.'/js/mintafamily.js', array('jquery'));
}

function is_mobile(){
    $useragents = array(
        'iPhone',          // iPhone
        'iPod',            // iPod touch
        'Android',         // 1.5+ Android
        'dream',           // Pre 1.5 Android
        'CUPCAKE',         // 1.5+ Android
        'blackberry9500',  // Storm
        'blackberry9530',  // Storm
        'blackberry9520',  // Storm v2
        'blackberry9550',  // Storm v2
        'blackberry9800',  // Torch
        'webOS',           // Palm Pre Experimental
        'incognito',       // Other iPhone browser
        'webmate'          // Other iPhone browser
    );
    $pattern = '/'.implode('|', $useragents).'/i';
    return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

// カスタムメニュー
register_nav_menus(
  array(
    'place_global' => 'グローバル',
	'place_utility' => 'ユーティリティ',
  )
);

function sp_ad_02() {
    if(is_mobile()) {  
    return '<div class="ad-wrap-main">
            <span>スポンサーリンク</span>
            <div class="sp-ad-02">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- logres-mintafamily-sp02 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4214907421149333"
     data-ad-slot="6565096609"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
            </div>
            </div>';
	} else {
		return '';
	}
}

function sp_ad_03() {
    if(is_mobile()) {  
    return '<div class="ad-wrap-main">
            <span>スポンサーリンク</span>
            <div class="sp-ad-03">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- logres-mintafamily-sp03 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4214907421149333"
     data-ad-slot="8041829805"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
            </div>
            </div>';
	} else {
		return '';
	}
}

add_shortcode('sp_ad_02', 'sp_ad_02');
add_shortcode('sp_ad_03', 'sp_ad_03');

// ウィジェット
register_sidebar();

function isBot() {
    $bot_list = array (
        'Googlebot',
        'Yahoo! Slurp',
        'Mediapartners-Google',
        'msnbot',
        'bingbot',
        'MJ12bot',
        'Ezooms',
        'pirst; MSIE 8.0;',
        'Google Web Preview',
        'ia_archiver',
        'Sogou web spider',
        'Googlebot-Mobile',
        'AhrefsBot',
        'YandexBot',
        'Purebot',
        'Baiduspider',
        'UnwindFetchor',
        'TweetmemeBot',
        'MetaURI',
        'PaperLiBot',
        'Showyoubot',
        'JS-Kit',
        'PostRank',
        'Crowsnest',
        'PycURL',
        'bitlybot',
        'Hatena',
        'facebookexternalhit',
        'NINJA bot',
        'YahooCacheSystem',
    );
 
    $is_bot = false;
    foreach ($bot_list as $bot) {
        if (stripos($_SERVER['HTTP_USER_AGENT'], $bot) !== false) {
            $is_bot = true;
            break;
        }
    }
    return $is_bot;
}

/**
 * アクセス数の取得
 */
function getPostViews($post) {
    $post = get_post($post);
 
    $count_key = 'post_views_count';
    $count = get_post_meta( $post->ID, $count_key, true );
    if ( $count == '' ) {
        delete_post_meta( $post->ID, $count_key );
        add_post_meta( $post->ID, $count_key, '0' );
        return "0 View";
    }
 
    return number_format($count) . ' Views';
}
 
/**
 * アクセス数の保存
 */
function setPostViews($post) {
    //if (!is_single()) {
        // 個別記事以外を除外
    //    return;
    //}
 
    if (isBot()) {
        // Botを除外
        return;
    }
 
    if (is_user_logged_in()) {
        // ログインユーザーを除外
        return;
    }
 
    $post = get_post($post);
 
    $count_key = 'post_views_count';
    $count = get_post_meta( $post->ID, $count_key, true );
    if ( $count == '' ) {
        delete_post_meta( $post->ID, $count_key );
        add_post_meta( $post->ID, $count_key, 1 );
    } else {
        $count++;
        update_post_meta( $post->ID, $count_key, $count );
    }
}
add_action('wp_footer','setPostViews');

get_template_part('functions/manage_posts');

//最初のh2見出し手前にアドセンスを表示
function add_ad_before_h2_for_once($the_content) {
//広告（AdSense）タグを記入
$ad1 ='<div class="ad-wrap-main">
<span>スポンサーリンク</span>
<div class="sp-ad-01">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- logres-mintafamily-sp01 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4214907421149333"
     data-ad-slot="3611630202"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
</div>';
  if ( is_single() ) {//投稿ページ
    $h2 = '/^<h2.*?>.+?<\/h2>$/im';//H2見出しのパターン
    if ( preg_match_all( $h2, $the_content, $h2s )) {//H2見出しが本文中にあるかどうか
      if ( $h2s[0] ) {//チェックは不要と思うけど一応
        if ( $h2s[0][0] ) {//1番目のH2見出し手前にad1を挿入
          $the_content  = str_replace($h2s[0][0], $ad1.$h2s[0][0], $the_content);
        }
      }
    }
  }
  return $the_content;
}
add_filter('the_content','add_ad_before_h2_for_once');

//投稿日の期間指定
global $my_where;
function my_posts_where( $where ) {
  global $my_where;
 
  return $where . $my_where;
}
function my_query_posts( $query ) {
  global $wpdb, $my_where;
 
  $q = wp_parse_args( $query );
  $my_where = '';
 
  if ( $q['date_from'] ) {
    if ( $q['date_to'] )
      $my_where = " AND ( DATE($wpdb->posts.post_date) BETWEEN '" . $q['date_from'] . "' AND '" . $q['date_to'] . "' )";
    else
      $my_where = " AND DATE($wpdb->posts.post_date) >= '" . $q['date_from'] . "'";
  } elseif ( $q['date_to'] ) {
      $my_where = " AND DATE($wpdb->posts.post_date) <= '" . $q['date_to'] . "'";
  }
 
  add_filter( 'posts_where', 'my_posts_where' );
  query_posts( $query );
  remove_filter( 'posts_where', 'my_posts_where' );
}
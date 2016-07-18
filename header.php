<!DOCTYPE HTML>
<html dir="ltr" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title><?php bloginfo('name'); ?></title>
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/touch-icon.png" />
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/style.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" />
<link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.sidr/2.2.1/stylesheets/jquery.sidr.dark.min.css">
<!--[if lt IE 9]>
  <meta http-equiv="Imagetoolbar" content="no" />
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.12.3.min.js"></script>
<script src="//cdn.jsdelivr.net/jquery.sidr/2.2.1/jquery.sidr.min.js"></script>
<?php wp_head(); ?>
</head>
<body class="">
	<header>
    	<div class="mintafamily-logo">
        	<div class="logo-cont">
            	<p><img class="mintafamily-logo" src="<?php echo get_template_directory_uri(); ?>/images/mintafamily-logo.png" alt="Logo"/></p>
            </div>
        </div>
		<div class="fixed-header cf">
        	<div class="cont">
   	     		<div class="game-title">
            		<a href="/"><p>剣と魔法のログレス いにしえの女神</p></a>
            	</div>
        	</div>
            <a href="#sidr" class="slide-menu menu menu_nav">
            	<i class="fa fa-bars"></i>
            </a>
            <span class="menu">MENU</span>
<?php
	if ( !is_front_page() && function_exists('bread_crumb')) :
?>
	    	<div class="breadcrumbs">
<?php
		bread_crumb('navi_element=nav&elm_id=bread-crumb');	
?>
	        </div><!-- /.breadcrumbs -->
<?php
	else :
?>
            <style>
				body {
					padding-top: 61px!important;
				}
			</style>
<?php
	endif;
?>
        </div>
<!-- メニュー部分 -->
<div id="sidr-menu">
    <ul>
        <li><a href="/archives/category/guide">攻略記事</a></li>
        <li><a href="/archives/category/beginner">初心者向け</a></li>
        <li><a href="/forums/forum/question">質問コーナー</a></li>
        <li><a href="/family">ファミリー紹介</a></li>
        <li><a class="slide-menu" href="#sidr">閉じる</a></li>
    </ul>
</div>

<script>
$(document).ready(function() {
    $('.slide-menu').sidr({
      name: 'sidr-menu',
      side : 'right'
    });
});  
</script>
    </header>
    <div id="container" class="container drawer-overlay">
        <div class="wrapper cf">
        	<div class="main-wrap">
            	<div class="main-col-wrap">
                	<div class="content-wrap">
					<div class="weather">
                    	<h2 class="title">ルシェメル天気予報</h2>
                        <div>
<?php
$galeon_weather = array( 0 => 'dead', 1 => 'holy', 2 => 'dark', 3 => 'dead', 7 => 'rain', 8 => 'dead', 9 => 'holy', 10 => 'dark', 11 => 'rain', 12 => 'dead', 13 => 'holy', 14 => 'dark', 15 => 'dead', 19 => 'rain', 20 => 'dead', 21 => 'holy', 22 => 'dark', 23 => 'rain' );
$sougen_weather = array( 0 => 'wind', 1 => 'holy', 2 => 'dark', 3 => 'wind', 7 => 'rain', 8 => 'wind', 9 => 'holy', 10 => 'dark', 11 => 'rain', 12 => 'wind', 13 => 'holy', 14 => 'dark', 15 => 'wind', 19 => 'rain', 20 => 'wind', 21 => 'holy', 22 => 'dark', 23 => 'rain');
$sangaku_weather = array( 0 => 'hot', 1 => 'holy', 2 => 'dark', 3 => 'hot', 7 => 'rain', 8 => 'hot', 9 => 'holy', 10 => 'dark', 11 => 'rain', 12 => 'hot', 13 => 'holy', 14 => 'dark', 15 => 'hot', 19 => 'rain', 20 => 'hot', 21 => 'holy', 22 => 'dark', 23 => 'rain');
$shinrin_weather = array( 0 => 'rain', 1 => 'holy', 2 => 'dark', 3 => 'rain', 7 => 'wind', 8 => 'rain', 9 => 'holy', 10 => 'dark', 11 => 'wind', 12 => 'rain', 13 => 'holy', 14 => 'dark', 15 => 'rain', 19 => 'wind', 20 => 'rain', 21 => 'holy', 22 => 'dark', 23 => 'wind');

// 現在の天気
if ( date( 'G', strtotime('+ 9 hour')) >= '3' && date ( 'G', strtotime('+ 9 hour') ) < '7' ) :
  //echo '3:00〜7:00';
  $weather = 3;
  $weather_end = 7;
elseif ( date( 'G', strtotime('+ 9 hour')) >= '15' && date ( 'G', strtotime('+ 9 hour') ) < '19' ) :
  //echo '15:00〜19:00';
  $weather = 15;
  $weather_end = 19;
else :
  //echo date( 'G', strtotime('+ 9 hour')) . ':00〜' . date( 'G', strtotime('+ 10 hour')) . ':00';
  $weather = date( 'G', strtotime('+ 9 hour'));
  $weather_end = date( 'G', strtotime('+ 10 hour'));
endif;

// 次の時間の天気
if ( date( 'G', strtotime('+ 10 hour')) >= '3' && date ( 'G', strtotime('+ 10 hour') ) < '7' ) :
  //echo '7:00〜8:00';
  $weather_next = 7;
  $weather_next_end = 8;
elseif ( date( 'G', strtotime('+ 10 hour')) >= '15' && date ( 'G', strtotime('+ 10 hour') ) < '19' ) :
  //echo '19:00〜20:00';
  $weather_next = 19;
  $weather_next_end = 20;
else :
  //echo date( 'G', strtotime('+ 10 hour')) . ':00〜' . date( 'G', strtotime('+ 11 hour')) . ':00';
  $weather_next = date( 'G', strtotime('+ 10 hour'));
  $weather_next_end = date( 'G', strtotime('+ 11 hour'));
endif;
?>                    	<table class="weather">
                        	<tr>
                            	<th class="time">時間帯</th>
                            	<th class="place">海岸</th>
                            	<th class="place">草原</th>
                            	<th class="place">山岳</th>
                            	<th class="place">森林</th>
                            </tr>
                            <tr>
                            	<td>現在(<?php echo $weather; ?>時〜<?php echo $weather_end; ?>時)</td>
                            	<td class="<?php echo $galeon_weather[$weather]; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $galeon_weather[$weather]; ?>.png"></img></td>
                            	<td class="<?php echo $sougen_weather[$weather]; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $sougen_weather[$weather]; ?>.png"></img></td>
                            	<td class="<?php echo $sangaku_weather[$weather]; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $sangaku_weather[$weather]; ?>.png"></img></td>
                            	<td class="<?php echo $shinrin_weather[$weather]; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $shinrin_weather[$weather]; ?>.png"></img></td>
                            </tr>
                            <tr>
                            	<td>次  (<?php echo $weather_next; ?>時〜<?php echo $weather_next_end; ?>時)</td>
                            	<td class="<?php echo $galeon_weather[$weather_next]; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $galeon_weather[$weather_next]; ?>.png"></img></td>
                            	<td class="<?php echo $sougen_weather[$weather_next]; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $sougen_weather[$weather_next]; ?>.png"></img></td>
                            	<td class="<?php echo $sangaku_weather[$weather_next]; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $sangaku_weather[$weather_next]; ?>.png"></img></td>
                            	<td class="<?php echo $shinrin_weather[$weather_next]; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $shinrin_weather[$weather_next]; ?>.png"></img></td>
                            </tr>
                        </table>
                        </div>
                    </div>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
  <meta name="format-detection" content="telephone=no" />
  <title>
    <?php
      if (is_single()) {
        wp_title('|', true, 'right');
      }
      bloginfo('name');
    ?>
  </title>
  <meta name="description" content="サイト説明文" />
  <meta name="keywords" content="キーワード" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/css/normalize.css" media="all" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/css/style.css" media="all" />
  <!-- フォントのみFOUTにする -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/earlyaccess/notosansjapanese.css" media="none" onload="if(media!='all')media='all'" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/css/font-awesome.min.css" media="none" onload="if(media!='all')media='all'" />
  <noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/earlyaccess/notosansjapanese.css" media="all" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/css/font-awesome.min.css" media="all" />
  </noscript>
  <!-- [if lt IE 9]>
    <script src="node_module/html5shiv/dist/html5shiv.min.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
</head>

<body id="gDef" class="ldef">
  <div class="wrapper">
    <header class="header">
      <div class="box-title">
        <a class="non-deco" href="<?php echo esc_url( home_url( '/', 'http' ) ); ?>">
          <h1 class="ttl-main"><?php bloginfo('name'); ?></h1>
        </a>
      </div><!-- .box-title -->
      <?php
        if (is_home()) {
          get_navigation();
        }
      ?>
    </header>

<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes() ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes() ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes() ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes() ?>><!--<![endif]-->
  <head>
  	<meta charset="<?php bloginfo( 'charset' ) ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title( '|', true, 'right' ) ?></title>
	<meta name="author" content="">
	<link rel="author" href="">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">

	<?php wp_head() ?> 
  </head>


  <body <?php body_class() ?>>
    

  	<!-- MENU HOLDER -->
    <nav id="main_menu" class="container">
      <a class="mobile_icon">Menu</a>
      
      <ul class="social">
        <li><a href="https://twitter.com/claudiaolguinmx" class="twitter social">Twitter</a></li>
        <li class="active"><a href="#" class="linkedin social">Linkedin</a></li>
        <li><a href="<?php bloginfo('url')?>/contacto">Contacto</a></li>
      </ul>

      <h1 class="mobile_title main_title"><a href="<?php bloginfo('url'); ?>/inteligencia/">Claudia Olgu&iacute;n</a></h1>


      <?php wp_nav_menu(array(
    		'theme_location' => 'main-nav',
    		'container'      => 'ul',
    		'container_id'   => 'primary-nav'
  	  )) ?>
    </nav>
    <!-- END: MENU HOLDER -->



    <!-- MAIN HOLDER -->
    <div id="main_holder" class="container">

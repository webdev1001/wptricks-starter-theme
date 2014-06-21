<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>

		<!-- "WPtricks Starter": The HTML-5 WordPress Template Theme -->
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' | '; } ?><?php bloginfo('name'); if(is_home()) { echo ' | WordPress Theme Development' ; } ?></title>
        
        <!-- Start built in SEO -->
        <meta name="keywords" content="<?php echo tags4meta(); ?>" />
			<?php if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); // IF ON A PAGE OR SINGLE POST INCLUDE THE_EXCERPT ?>
         <meta name="description" content="<?php $content = get_the_content(); echo wp_trim_words( $content , '38' ); ?>" />
			 <?php endwhile; endif; elseif(is_home()) : // IF ON THE HOME PAGE SHOW SITE DESCRIPTION ?>
         <meta name="description" content="<?php bloginfo('description'); ?>" />
			 <?php endif; ?>
			 <?php if(is_single() || is_page() || is_home()) { // NOINDEX ARCHIVES, TAGS & AUTHOR PAGES?>
         <meta name="robots" content="index" />
			 <?php } else { ?>
         <meta name="robots" content="noindex, nofollow" />
			 <?php }?>
        
        <!-- FACEBOOK OG's -->
        <meta property="og:image" content="<?php $thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id,'facebook-og-thumbnail', true); echo $thumb_url[0]; ?>"/>
		<meta property="og:title" content="<?php echo the_title(); ?>"/>
		<meta property="og:url" content="<?php echo the_permalink(); ?>"/>
        <meta property="og:site_name" content="<?php echo the_title(); ?> - <?php bloginfo('description'); ?>"/>
        <meta property="og:type" content="blog"/>

        <!-- STYLESHEETS -->
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen">
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/options.css" media="screen">
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/font-awesome.min.css" media="screen">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/tooltipster.css" media="screen">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/magnific-popup.css" media="screen">
        
		<link rel="alternate" type="text/xml" title="<?php bloginfo('name'); ?> RSS 0.92 Feed" href="<?php bloginfo('rss_url'); ?>">
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS 2.0 Feed" href="<?php bloginfo('rss2_url'); ?>">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- JQUERY / other scripts loaded in the footer -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/javascript/modernizr.wptricks.js"></script>

		<?php wp_head(); ?>

		<?php
          add_filter('body_class','my_class_names');   
          function my_class_names($classes) {
              $classes[] = get_theme_mod('sidebar_position');
              return $classes;
          }
        ?>

		<?php
			// Collect the colours from the customizer.
			$content_text_color = get_option('content_text_color');
			$content_link_color = get_option('content_link_color');
			$content_link_hover_color = get_option('content_link_hover_color');
			$highlight_color = get_option('highlight_color');
			$h_tag_color = get_option('h1_title_color');	
		?>
		
		<style type="text/css">
			/* Spit out the colours in the header */
			body { color:  <?php echo $content_text_color; ?>; }<!-- body text colour -->
			body a { color:  <?php echo $content_link_color; ?>; } <!--anchor tag colours-->
			body a:hover { color:  <?php echo $content_link_hover_color; ?>; } <!--anchor tag :hover colours-->
			body > header hgroup, #wp-calendar a, a.button { background-color:  <?php echo $highlight_color; ?>; }
			.article > footer, input, textarea, .single article > footer, input[type="submit"] { border-color: <?php echo $highlight_color; ?>;  }
			#wp-calendar a, a.button { color:  <?php echo $content_link_hover_color; ?>; }
			h1, h2, h3, h4, h5, h6 { color:  <?php echo $h1_title_color; ?>; }
		</style>
	</head>
	<body <?php body_class($class); ?> id="top">
  
	
    	<section class="main-header">
            <header>
                <div class="wrapper">
                    <?php if ( get_theme_mod( 'header_logo' ) ) : 
                        // If the header logo is set in the theme customizer use that...
                    ?>
            
                     <hgroup id="logo">
                        <a href='<?php bloginfo('url'); ?>/' title='<?php bloginfo('name'); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'header_logo' ) ); ?>' alt='<?php bloginfo('name'); ?>'></a>
                            <h1><?php bloginfo('name'); ?></h1>
                            <h2><small><?php bloginfo('description'); ?></small></h2>
                    </hgroup> <!-- /#logo -->
                    
                    <?php else : 
                        // Otherwise use the default header.
                    ?>
                    
                    <hgroup id="logo">
                        <a href='http://wptricks.o.uk' title='WPtricks' rel='home' target="new"><img src='<?php bloginfo('template_directory'); ?>/images/logo.png' alt='WPtricks Testing'></a>
                            <h1><?php bloginfo('name'); ?></h1>
                            <h2><small><?php bloginfo('description'); ?></small></h2>
                    </hgroup> <!-- /#logo -->
                        
                        <?php endif; ?>
                </div><!-- /.wrapper -->
            </header>
            <nav>
                <div class="wrapper">
                    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' )); ?>
                </div><!-- /.wrapper -->
            </nav>
        </section> <!-- /.main-header -->
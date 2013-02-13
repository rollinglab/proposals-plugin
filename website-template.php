<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />

<title><?php

global $page, $paged;

wp_title( '|', true, 'right' );

// Add the blog name.
bloginfo( 'name' );

// Add the blog description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
     echo " | $site_description";

// Add a page number if necessary:
if ( $paged >= 2 || $page >= 2 )
     echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php 
/**
 * TO DO
 *
 * enqueue all scrips properly
 *
 */
?>
<link rel="stylesheet" href="<?php echo plugins_url( '/css/foundation-min.css', __FILE__ ); ?>" type="text/css" media="all">
<link rel="stylesheet" href="<?php echo plugins_url( '/css/website.css', __FILE__ ); ?>" type="text/css" media="all">
<script src="<?php echo plugins_url( '/js/libs/jquery-1.8.3.min.js', __FILE__ ); ?>"></script>
<script src="<?php echo plugins_url( '/js/app.js', __FILE__ ); ?>"></script>

</head>
<body>
     <div id="page" class="row">
          <div id="primary" class="eight columns"><?php
          
          if( have_posts() ) :
               
               while( have_posts() ) : the_post(); 
               
               ?>
               <article <?php post_class(); ?>
                    <header class="page-header">
                         <h1><?php the_title(); ?></h1>
                    </header>
                    
                    <div class="entry-content">
                         <?php the_content(); ?>
                    </div><!--.entry-content-->          
               </article><?php
               
               endwhile;
               
          endif; ?>
          </div><!--#primary-->
          
          <div id="secondary" class="four columns">
          </div><!--#secondary-->        
     </div><!--#page-->
</body>
</html>
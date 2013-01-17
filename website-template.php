<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<link rel="stylesheet" href="<?php echo plugins_url( '/css/foundation-min.css', __FILE__ ); ?>" type="text/css" media="all">
<link rel="stylesheet" href="<?php echo plugins_url( '/css/website.css', __FILE__ ); ?>" type="text/css" media="all">
<script src="<?php echo plugins_url( '/js/script.js', __FILE__ ); ?>"></script>

</head>
<body>
     <div id="page">
          <div id="main">
               <div id="primary" class="row">
                    <div id="content" class="columns eight">
                    <?php if( have_posts() ) : ?>
                         <?php while( have_posts() ) : the_post(); ?>
                         
                         <article <?php post_class(); ?>>
                              <header class="entry-header">
                                   <h1><?php the_title(); ?></h1>
                              </header><!--.entry-header-->
                              
                              <div class="entry-content">
                                   <?php the_content(); ?>
                              </div><!--.entry-content-->
                              
                              <footer class="entry-footer">
                              
                              </footer><!--.entry-footer-->
                         </article>
                                                  
                         <?php endwhile; ?>
                    <?php endif; ?>
                    </div><!-- #content -->
                    
                    <div class="columns four">
                         <h2>List</h2>
                    </div>
               </div><!-- #primary -->
          </div><!-- #main -->
     </div><!-- #page -->
</body>
</html>
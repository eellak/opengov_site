<?php
/**
 * Template Name: Προκήρυξη
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Boilerstrap consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Boilerstrap
 * @since Boilerstrap 1.0
 */

get_header();
get_sidebar( 'mobile' ); ?>

<div id="primary" class="site-content span8">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>
<p class="well well-small">
				<?php

  $custom_field_keys = get_post_custom_keys();
  foreach ( $custom_field_keys as $key => $value ) {
    $valuet = trim($value);
      if ( '_' == $valuet{0} )
      continue;
    $Fvalue =  get_post_custom_values($value);
    echo"<span class='badge badge-info'>$value:  </span>  ";
    	if(isset($Fvalue[0])) echo $Fvalue[0];
    echo "<br>";
    
  }
?>
    </p>

			</div><!-- #content -->
	</div><!-- #primary -->


<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>
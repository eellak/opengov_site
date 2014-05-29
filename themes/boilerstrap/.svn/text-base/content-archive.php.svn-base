<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Boilerstrap
 * @since Boilerstrap 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<header class="entry-header">
			<?php the_post_thumbnail(); ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'boilerstrap' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php echo"<span class='date'>";
				  the_date(); 
				echo "</span>";
				  ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php	echo '<p>'.get_the_post_image(150, $pozt->ID, 'alignleft').get_the_excerpt().'</p>'; ?>

		</div><!-- .entry-summary -->
		
	</article><!-- #post -->

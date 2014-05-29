<?php
/**
* Template Name: Home
*
* @description Paradoteo Δράση 5 - Πρότυπος Δικτυακός Τόπος Φορέα
* @author Fotis Routsis (fotis.routsis@gmail.com)
* @package drash5
* @license http://joinup.ec.europa.eu/software/page/eupl EUPL Licence
*
*/

$home_options = get_option('drasi5_options'); 

get_header();
get_sidebar( 'mobile' ); ?>

<div id="primary" class="site-content">
  <div id="content" class="entry-content" role="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
	<?php endwhile; // end of the loop. ?>
	<div class="entry-content">
	<?php 
	
	$nav_list = '';
	$thema_list = '';
	$cnt_section = 1;
	foreach($home_options as $section){
		if($section ==0) continue;
		
		$thematic = get_term( $section, 'thematic' ); 
		
		if($cnt_section == 1)
			$nav_list .= '<li class="active"><a href="#sec-'.$cnt_section.'" data-toggle="tab">'.$thematic->name.'</a></li>';
		else
			$nav_list .= '<li><a href="#sec-'.$cnt_section.'" data-toggle="tab">'.$thematic->name.'</a></li>';
		
		if($cnt_section == 1)		
			$thema_list .= '<div class="tab-pane active" id="sec-'.$cnt_section.'">';
		else
			$thema_list .= '<div class="tab-pane" id="sec-'.$cnt_section.'">';
			
		$args = array(
			'post_type'=>'post',
			'post_status' => 'publish',	
			'posts_per_page' => 4,
			'caller_get_posts'=> 1,
			'tax_query' => array(
				array(      
				'taxonomy' => 'thematic',
				'field' => 'id',
				'terms' =>$section,
			))
		);
		$postz = query_posts($args );
		$cnt =1 ;
		$post_list = '<div class="span4 alignright offset home_list"><h4>Δείτε επίσης</h4><ul>';
		foreach ($postz as $pozt){
			setup_postdata($pozt);
			if($cnt == 1){
				$thema_list .= '<article id="post-'.$pozt->ID.'" class="home_single span8" >';
				$thema_list .= '<header class="entry-header"><h1 class="entry-title"><a href="'.get_permalink($pozt->ID).'" title="'.get_the_title($pozt->ID).'" rel="bookmark">'.get_the_title($pozt->ID).'</a></h1></header>';
				$thema_list .= '<div class="entry-summary"><p>'.get_the_post_image(150, $pozt->ID, 'alignleft').get_the_excerpt().'</p></div>';
				$thema_list .= '</article>';
			} else {
				$post_list .= '<li><a href="'.get_permalink($pozt->ID).'" title="'.get_the_title($pozt->ID).'" rel="bookmark">'.get_the_title($pozt->ID).'</a></li>';
			}
			$cnt++;
		} 
		$post_list .='</ul></div>';
		$comment_list = '<div class="span4 alignright offset home_list"><h4>Τελευταία σχόλια</h4><ul>';
		
		// Get Comments on Taxonomy ---------------------
		global $wpdb;
			$sql =
			"SELECT *
			FROM $wpdb->comments
				LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID)
				INNER JOIN $wpdb->term_relationships as r1 ON ($wpdb->posts.ID = r1.object_id)
				INNER JOIN $wpdb->term_taxonomy as t1 ON (r1.term_taxonomy_id = t1.term_taxonomy_id)
			WHERE comment_approved = '1'
				AND comment_type = ''
				AND post_password = ''
				AND t1.taxonomy = 'thematic'
				AND t1.term_id = ".$section."";
				$comments = $wpdb->get_results($sql);
			foreach ($comments as $comment) {
				$comment_list .= '<li><a href="'.get_permalink($comment->comment_post_ID).'"><strong>'. $comment->comment_author . '</strong>: "' . substr(strip_tags($comment->comment_content),0,80). '..."</a></li>';
			}
		// ------------------------------------------------
		$comment_list .='</ul></div>';
		$thema_list .= $post_list.$comment_list.'</div>';
		$cnt_section++;
		wp_reset_query();
	}
	?>
		<div class="tabbable tabs-left">
		  <ul class="nav nav-tabs">
			<?php echo $nav_list; ?>
		  </ul>
		  <div class="tab-content">
			<?php echo $thema_list; ?>
		  </div>
		</div>
		
	</div><!-- .entry-content -->

  </div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>
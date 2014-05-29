<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Boilerstrap
 * @since Boilerstrap 1.0
 */
?>
  	</div><!-- #main .wrapper -->
  	<footer id="colophon" role="contentinfo">
  		<div class="site-info">
  		<div class="">
  	  	<?php 
  	  	    wp_nav_menu( array(
				'theme_location' => 'footer',
  	  	        'menu'       => 'navbar-inner',
  	  	        'depth'      => 3,
  	  	        'container'  => false,
  	  	        'menu_class' => '',
  	  	        //Process nav menu using our custom nav walker
  	  	        'walker' => new twitter_bootstrap_nav_walker())
  	  	    );
			
  	  	?></div>
  			<?php if ( is_active_sidebar( 'footer' ) ) : ?>
  				<div class="footer-sidebar" role="complementary">
  					<?php dynamic_sidebar( 'footer' ); ?>
  				</div><!-- #secondary -->
  			<?php endif; ?>
			
  		</div><!-- .site-info -->
  	</footer><!-- #colophon -->
  
<div class="row-fluid  sea-blue-1-bg" style="border-radius:5px;padding:4px;margin-top:20px;margin-bottom:20px;">
  <div class="span4">
  <a href="http://www.europa.eu" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/eu.jpg" alt='Ευρωπαϊκή Ένωση'  title='Ευρωπαϊκή Ένωση'></a>
  <img src="<?php echo get_template_directory_uri(); ?>/img/icons/gr.jpg"  alt='Ελληνική Δημοκρατία' title='Ελληνική Δημοκρατία'>
  <a href="http://www.epdm.gr" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/dioikhtikh.jpg"  title='Διοικητική Μεταρρύθμιση' alt='Διοικητική Μεταρρύθμιση'></a>
  <a href="http://www.espa.gr" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/espa.jpg"  alt='ΕΣΠΑ' title='ΕΣΠΑ'></a>
  </div>
  <div class="span8 ">
  <span class="small">H Δράση 5 - Πρότυπος δικτυακός τόπος δημόσιου φορέα αναπτύχθηκε 
στο πλαίσιο του έργου «Υλοποίηση προτύπων εφαρμογών και παροχή τεχνογνωσίας για την υλοποίηση
δράσεων διαφάνειας και συμμετοχής» στο πλαίσιο του άξονα προτεραιότητας 11 του Ε.Π. «Διοικητική 
Μεταρρύθμιση 2007-2013» . Έργο συγχρηματοδοτούμενο από ΕΥΡΩΠΑΪΚΟ ΚΟΙΝΩΝΙΚΟ ΤΑΜΕΙΟ (ΕΚΤ)</span>
</div></div>
  </div><!-- #page -->
  </div><!-- #page -->
  
  <?php wp_footer(); ?>

</body>
</html>
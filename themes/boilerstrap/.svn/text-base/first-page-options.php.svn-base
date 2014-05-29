<?php
/**
*
* @description Paradoteo Δράση 5 - Πρότυπος Δικτυακός Τόπος Φορέα
* @author Fotis Routsis (fotis.routsis@gmail.com)
* @package drash5
* @license http://joinup.ec.europa.eu/software/page/eupl EUPL Licence
*
*/

class Drasi5Options {
	function getOptions() {
		$options = get_option('drasi5_options');
		if (!is_array($options)) {

			$options['section_1'] = '';
			$options['section_2'] = '';
			$options['section_3'] = '';
			$options['section_4'] = '';
			$options['section_5'] = '';
			$options['section_6'] = '';
			$options['section_7'] = '';
			$options['section_8'] = '';
			$options['section_9'] = '';
			$options['section_10'] = '';
			
			update_option('drasi5_options', $options);
		}
		return $options;
	}

	function add() {
		if(isset($_POST['blocks_save'])) {
			$options = Drasi5Options::getOptions();
			
			$options['section_1'] = stripslashes($_POST['section_1']);
			$options['section_2'] = stripslashes($_POST['section_2']);
			$options['section_3'] = stripslashes($_POST['section_3']);
			$options['section_4'] = stripslashes($_POST['section_4']);
			$options['section_5'] = stripslashes($_POST['section_5']);
			$options['section_6'] = stripslashes($_POST['section_6']);
			$options['section_7'] = stripslashes($_POST['section_7']);
			$options['section_8'] = stripslashes($_POST['section_8']);
			$options['section_9'] = stripslashes($_POST['section_9']);
			$options['section_10'] = stripslashes($_POST['section_10']);
			
			update_option('drasi5_options', $options);

		} else {
			Drasi5Options::getOptions();
		}

		add_posts_page( 'Πρώτη Σελίδα','Πρώτη Σελίδα', 'edit_pages', basename(__FILE__), array('Drasi5Options', 'display'));
	}

	function display() {
		$options = Drasi5Options::getOptions();
?>

<form action="#" method="post" enctype="multipart/form-data" name="blocks_form" id="blocks_form">
	<div class="wrap">
		<h2>Επιλογές Πρώτης Σελίδας</h2>
		
		<p class="submit">
			<input class="button-primary" type="submit" name="blocks_save" value="Αποθήκευση" />
		</p>
		
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row">Επιλογές Πρώτης Σελίδας<br/><em style="font-weight:normal;">Οι 4 πρώτες επιλογές είναι υποχρεωτικές</em></th>
					<?php 
						$sections = get_terms( 'thematic' , array( 'orderby'    => 'count', 'hide_empty' => 1 ) ); 
					
						function get_select_option($sections, $selection, $not_required = false){
							if($not_required) 
								echo '<option value="0">--</option>';
								
							foreach( $sections as $section ) {
								echo '<option value="'.$section->term_id.'" ';
								if($selection == $section->term_id) 
									echo 'selected'; 
								echo '>'.$section->name .'</option>';
							}
						}
					?>
					<td>
						1. &nbsp; 
						<select name="section_1" size="1"><?php get_select_option($sections, $options['section_1']); ?></select><br/><br/>
						2. &nbsp; 
						<select name="section_2" size="1"><?php get_select_option($sections, $options['section_2']); ?></select><br/><br/>
						3. &nbsp; 
						<select name="section_3" size="1"><?php get_select_option($sections, $options['section_3']); ?></select><br/><br/>
						 4. &nbsp; 
						<select name="section_4" size="1"><?php get_select_option($sections, $options['section_4']); ?></select><br/><br/>
						 5. &nbsp; 
						<select name="section_5" size="1"><?php get_select_option($sections, $options['section_5'], true); ?></select><br/><br/>
						 6. &nbsp; 
						<select name="section_6" size="1"><?php get_select_option($sections, $options['section_6'], true); ?></select><br/><br/>
						 7. &nbsp; 
						<select name="section_7" size="1"><?php get_select_option($sections, $options['section_7'], true); ?></select><br/><br/>
						 8. &nbsp; 
						<select name="section_8" size="1"><?php get_select_option($sections, $options['section_8'], true); ?></select><br/><br/>
						 9. &nbsp; 
						<select name="section_9" size="1"><?php get_select_option($sections, $options['section_9'], true); ?></select><br/><br/>
						 10. &nbsp; 
						<select name="section_10" size="1"><?php get_select_option($sections, $options['section_10'], true); ?></select><br/><br/>
						
					</td>
				</tr>
			</tbody>
		</table>		

		<p class="submit">
			<input class="button-primary" type="submit" name="blocks_save" value="Αποθήκευση" />
		</p>
	</div>

</form>

<?php
	}
}

// Register functions
add_action('admin_menu', array('Drasi5Options', 'add'));

?>
<?php

/**
* Sets up the metabox on the post edit page 
*******************************************/

function revyooz_add_custom_box() {
	add_meta_box( 'revyooz_meta_box', 'Revyooz review data', 'revyooz_callback', 'post');
}
add_action( 'add_meta_boxes', 'revyooz_add_custom_box' );

/***************
* Adds the custom fields to the box
***************/

function revyooz_callback( $post ){
		
		global $wpdb;
		
	// First let's get all the values from the database,
	// so we can populate the form with any values already 
	// in the database.
		
	$values = get_post_custom( $post->ID );
	$rvz_enabled = isset( $values['revyooz_enabled'] ) ? esc_attr( $values['revyooz_enabled'][0] ) : '';
	$rvz_price = isset( $values['revyooz_price'] ) ? esc_attr( $values['revyooz_price'][0] ) : '';
	$rvz_url = isset( $values['revyooz_url'] ) ? esc_attr( $values['revyooz_url'][0] ) : '';
	$rvz_linktext = isset( $values['revyooz_linktext'] ) ? esc_attr( $values['revyooz_linktext'][0] ) : '';
	$rvz_stars_overall = isset( $values['revyooz_stars_overall'] ) ? esc_attr( $values['revyooz_stars_overall'][0] ) : '';
	$rvz_stars_1 = isset( $values['revyooz_stars_1'] ) ? esc_attr( $values['revyooz_stars_1'][0] ) : '';	
	$rvz_stars_2 = isset( $values['revyooz_stars_2'] ) ? esc_attr( $values['revyooz_stars_2'][0] ) : '';	
	$rvz_stars_3 = isset( $values['revyooz_stars_3'] ) ? esc_attr( $values['revyooz_stars_3'][0] ) : '';	
	$rvz_stars_4 = isset( $values['revyooz_stars_4'] ) ? esc_attr( $values['revyooz_stars_4'][0] ) : '';	
	$rvz_stars_5 = isset( $values['revyooz_stars_5'] ) ? esc_attr( $values['revyooz_stars_5'][0] ) : '';
	$rvz_featured = isset( $values['revyooz_featured'] ) ? esc_attr( $values['revyooz_featured'][0] ) : '';
		
	
	// Retrieve default values for stars etc.
	
	$sql = "SELECT * FROM wp_options WHERE option_name LIKE 'revyooz%'";
	$array_results = $wpdb->get_results( $sql );
	
	//var_dump($array_results);
	
	foreach ($array_results as $value){
		// Turns the values we get from the database into 
		// variables and values
		$varname = $value->option_name;
		$$varname = $value->option_value;
	}
	?>
	
	<input type="checkbox" <?php echo $rvz_enabled ?> name="revyooz_enabled" value="CHECKED" > <strong>Enable Revyooz for this post</strong>
	<br /><br />
	
	
	<?php
	
	
	echo '<strong>Price</strong> <br /> <strong>'.$revyooz_currency_symbol.'</strong> <input type="text" id="revyooz_price" name="revyooz_price" value="'.$rvz_price.'" size="7"> (Do not include the currency symbol) <br /><br />';
	
	echo '<strong>Affiliate URL</strong> <br /><textarea name="revyooz_url" cols="125" rows="4">'.$rvz_url.'</textarea>
	 <br /><br />';
	
	echo '<strong>Affiliate link text</strong> <br /><input type="text" id="revyooz_linktext" name="revyooz_linktext" value="'.$rvz_linktext.'" size="55"> <br /><br />';
	
	
	
	
	
	?>
	
	<style>
		td {
			font-size: 12px;
		}
	</style>
	
    <h2>Star ratings (Change category names in <a href="./options-general.php?page=revyooz-options">settings</a>)</h2>
 
    
	<table>
		<tr>
			<td><?php echo $revyooz_stars_overall_name ?></td>
			<td>
				<select name="revyooz_stars_overall">
				<option value="0" <?php selected($rvz_stars_overall, 0) ?> >0</option>
				<option value="1" <?php selected($rvz_stars_overall, 1) ?> >1</option>
				<option value="2" <?php selected($rvz_stars_overall, 2) ?> >2</option>
				<option value="3" <?php selected($rvz_stars_overall, 3) ?> >3</option>
				<option value="4" <?php selected($rvz_stars_overall, 4) ?> >4</option>
				<option value="5" <?php selected($rvz_stars_overall, 5) ?> >5</option>
				</select>	
			</td>
		</tr>
		
		<tr>
			<td><?php echo $revyooz_stars_cat1_name ?></td>
			<td>
				<select name="revyooz_stars_1">
				<option value="0" <?php selected($rvz_stars_1, 0) ?> >0</option>
				<option value="1" <?php selected($rvz_stars_1, 1) ?> >1</option>
				<option value="2" <?php selected($rvz_stars_1, 2) ?> >2</option>
				<option value="3" <?php selected($rvz_stars_1, 3) ?> >3</option>
				<option value="4" <?php selected($rvz_stars_1, 4) ?> >4</option>
				<option value="5" <?php selected($rvz_stars_1, 5) ?> >5</option>
				</select>	
			</td>
		</tr>
		
		<tr>
			<td><?php echo $revyooz_stars_cat2_name ?></td>
			<td>
				<select name="revyooz_stars_2">
				<option value="0" <?php selected($rvz_stars_2, 0) ?> >0</option>
				<option value="1" <?php selected($rvz_stars_2, 1) ?> >1</option>
				<option value="2" <?php selected($rvz_stars_2, 2) ?> >2</option>
				<option value="3" <?php selected($rvz_stars_2, 3) ?> >3</option>
				<option value="4" <?php selected($rvz_stars_2, 4) ?> >4</option>
				<option value="5" <?php selected($rvz_stars_2, 5) ?> >5</option>
				</select>	
			</td>
		</tr>

		<tr>
			<td><?php echo $revyooz_stars_cat3_name ?></td>
			<td>
				<select name="revyooz_stars_3">
				<option value="0" <?php selected($rvz_stars_3, 0) ?> >0</option>
				<option value="1" <?php selected($rvz_stars_3, 1) ?> >1</option>
				<option value="2" <?php selected($rvz_stars_3, 2) ?> >2</option>
				<option value="3" <?php selected($rvz_stars_3, 3) ?> >3</option>
				<option value="4" <?php selected($rvz_stars_3, 4) ?> >4</option>
				<option value="5" <?php selected($rvz_stars_3, 5) ?> >5</option>
				</select>	
			</td>
		</tr>

		<tr>
			<td><?php echo $revyooz_stars_cat4_name ?></td>
			<td>
				<select name="revyooz_stars_4">
				<option value="0" <?php selected($rvz_stars_4, 0) ?> >0</option>
				<option value="1" <?php selected($rvz_stars_4, 1) ?> >1</option>
				<option value="2" <?php selected($rvz_stars_4, 2) ?> >2</option>
				<option value="3" <?php selected($rvz_stars_4, 3) ?> >3</option>
				<option value="4" <?php selected($rvz_stars_4, 4) ?> >4</option>
				<option value="5" <?php selected($rvz_stars_4, 5) ?> >5</option>
				</select>	
			</td>
		</tr>
				
		<tr>
			<td><?php echo $revyooz_stars_cat5_name ?></td>
			<td>
				<select name="revyooz_stars_5">
				<option value="0" <?php selected($rvz_stars_5, 0) ?> >0</option>
				<option value="1" <?php selected($rvz_stars_5, 1) ?> >1</option>
				<option value="2" <?php selected($rvz_stars_5, 2) ?> >2</option>
				<option value="3" <?php selected($rvz_stars_5, 3) ?> >3</option>
				<option value="4" <?php selected($rvz_stars_5, 4) ?> >4</option>
				<option value="5" <?php selected($rvz_stars_5, 5) ?> >5</option>
				</select>	
			</td>
		</tr>
		
	</table>
	
	
	
	<br /><strong>Featured: </strong> <input type="radio" name="revyooz_featured" value="yes" <?php checked($rvz_featured, 'yes') ?> > Yes <input type="radio" name="revyooz_featured" value="no" <?php checked($rvz_featured, 'no') ?> > No<br />
	
<?php


}
 /****************************
 This function updates the 
 review info in the backend.
 ****************************/
 
// Have to figure out what array _POST[]? 
function revyooz_action (){

global $post; // needed to get the $post-ID
$post_id = $post->ID;

$rvz_enabled = $_POST['revyooz_enabled'];
if ($rvz_enabled != "CHECKED"){
	$rvz_enabled = "";
}
add_post_meta ($post_id, 'revyooz_enabled', $rvz_enabled, true) || update_post_meta ($post_id, 'revyooz_enabled', $rvz_enabled);


$rvz_price = $_POST['revyooz_price'];
add_post_meta ($post_id, 'revyooz_price', $rvz_price, true) || update_post_meta ($post_id, 'revyooz_price', $rvz_price);

$rvz_url = $_POST['revyooz_url'];
add_post_meta ($post_id, 'revyooz_url', $rvz_url, true) || update_post_meta ($post_id, 'revyooz_url', $rvz_url);

$rvz_linktext = $_POST['revyooz_linktext'];
add_post_meta ($post_id, 'revyooz_linktext', $rvz_linktext, true) || update_post_meta ($post_id, 'revyooz_linktext', $rvz_linktext);

$rvz_stars_overall = $_POST['revyooz_stars_overall'];
add_post_meta ($post_id, 'revyooz_stars_overall', $rvz_stars_overall, true) || update_post_meta ($post_id, 'revyooz_stars_overall', $rvz_stars_overall);

$rvz_stars_1 = $_POST['revyooz_stars_1'];
add_post_meta ($post_id, 'revyooz_stars_1', $rvz_stars_1, true) || update_post_meta ($post_id, 'revyooz_stars_1', $rvz_stars_1);

$rvz_stars_2 = $_POST['revyooz_stars_2'];
add_post_meta ($post_id, 'revyooz_stars_2', $rvz_stars_2, true) || update_post_meta ($post_id, 'revyooz_stars_2', $rvz_stars_2);

$rvz_stars_3 = $_POST['revyooz_stars_3'];
add_post_meta ($post_id, 'revyooz_stars_3', $rvz_stars_3, true) || update_post_meta ($post_id, 'revyooz_stars_3', $rvz_stars_3);

$rvz_stars_4 = $_POST['revyooz_stars_4'];
add_post_meta ($post_id, 'revyooz_stars_4', $rvz_stars_4, true) || update_post_meta ($post_id, 'revyooz_stars_4', $rvz_stars_4);

$rvz_stars_5 = $_POST['revyooz_stars_5'];
add_post_meta ($post_id, 'revyooz_stars_5', $rvz_stars_5, true) || update_post_meta ($post_id, 'revyooz_stars_5', $rvz_stars_5);

$rvz_featured = $_POST['revyooz_featured'];
add_post_meta ($post_id, 'revyooz_featured', $rvz_featured, true) || update_post_meta ($post_id, 'revyooz_featured', $rvz_featured);


return true;
	
 } // end function revyooz_action()
 add_action( 'save_post', 'revyooz_action' );
?>
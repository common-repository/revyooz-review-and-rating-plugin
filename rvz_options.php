<?php


function revyooz_register_settings() {
	add_option( 'revyooz_currency_symbol', '$');
	add_option( 'revyooz_display_side', 'right');
	add_option( 'revyooz_stars_overall_name', 'Overall');
	add_option( 'revyooz_stars_cat1_name', 'Value');
	add_option( 'revyooz_stars_cat2_name', 'Food');
	add_option( 'revyooz_stars_cat3_name', 'Performance');
	add_option( 'revyooz_stars_cat4_name', 'Plot');
	add_option( 'revyooz_stars_cat5_name', 'Style');
	
	
	
	register_setting( 'default', 'revyooz_currency_symbol' ); 
	register_setting( 'default', 'revyooz_display_side' ); 
	register_setting( 'default', 'revyooz_stars_overall_name' ); 
	register_setting( 'default', 'revyooz_stars_cat1_name' );
	register_setting( 'default', 'revyooz_stars_cat2_name' );
	register_setting( 'default', 'revyooz_stars_cat3_name' );
	register_setting( 'default', 'revyooz_stars_cat4_name' );
	register_setting( 'default', 'revyooz_stars_cat5_name' ); 
	
} 
add_action( 'admin_init', 'revyooz_register_settings' );
 
function revyooz_register_options_page() {
	add_options_page('Page title', 'Revyooz', 'manage_options', 'revyooz-options', 'revyooz_options_page');
}
add_action('admin_menu', 'revyooz_register_options_page');
 
function revyooz_options_page() {
	?>
<div class="wrap">
	<?php screen_icon(); ?>
	<h2>Revyooz Options</h2>
	<form method="post" action="options.php"> 
		<?php settings_fields( 'default' ); ?>
		<h3>Settings</h3>
			<p>How Revyooz should operate</p>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="revyooz_currency_symbol">Currency symbol</label></th>
					<td><input type="text" id="revyooz_currency_symbol" name="revyooz_currency_symbol" value="<?php echo get_option('revyooz_currency_symbol'); ?>" size="5" /></td>
				</tr>
				
				
				<tr valign="top">
					<th scope="row"><label for="revyooz_display_side">Display review on which side of post ('right' or 'left')</label></th>
					<td>
						<select name="revyooz_display_side">
							<option value="right" <?php if (get_option('revyooz_display_side') == "right"){echo "SELECTED";} ?>>Right</option>
							<option value="left" <?php if (get_option('revyooz_display_side') == "left"){echo "SELECTED";} ?>>Left</option>
						</select>
					
					</td>
				</tr>
				
				
				
				
			</table>
            
            <h3>Category settings</h3>
			<p>Default values for star categories</p>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="revyooz_stars_overall_name">Overall stars</label></th>
					<td><input type="text" id="revyooz_stars_overall_name" name="revyooz_stars_overall_name" value="<?php echo get_option('revyooz_stars_overall_name'); ?>" /></td>
				</tr>
                <tr valign="top">
					<th scope="row"><label for="revyooz_stars_cat1_name">Category 1 stars</label></th>
					<td><input type="text" id="revyooz_stars_cat1_name" name="revyooz_stars_cat1_name" value="<?php echo get_option('revyooz_stars_cat1_name'); ?>"  /></td>
				</tr>
                <tr valign="top">
					<th scope="row"><label for="revyooz_stars_cat2_name">Category 2 stars</label></th>
					<td><input type="text" id="revyooz_stars_cat2_name" name="revyooz_stars_cat2_name" value="<?php echo get_option('revyooz_stars_cat2_name'); ?>"  /></td>
				</tr>
                <tr valign="top">
					<th scope="row"><label for="revyooz_stars_cat3_name">Category 3 stars</label></th>
					<td><input type="text" id="revyooz_stars_cat3_name" name="revyooz_stars_cat3_name" value="<?php echo get_option('revyooz_stars_cat3_name'); ?>"  /></td>
				</tr>
                <tr valign="top">
					<th scope="row"><label for="revyooz_stars_cat4_name">Category 4 stars</label></th>
					<td><input type="text" id="revyooz_stars_cat4_name" name="revyooz_stars_cat4_name" value="<?php echo get_option('revyooz_stars_cat4_name'); ?>"  /></td>
				</tr>
                <tr valign="top">
					<th scope="row"><label for="revyooz_stars_cat5_name">Category 5 stars</label></th>
					<td><input type="text" id="revyooz_stars_cat5_name" name="revyooz_stars_cat5_name" value="<?php echo get_option('revyooz_stars_cat5_name'); ?>"  /></td>
				</tr>
			</table>
			
			

			<?php submit_button(); ?>
	</form>
</div>
<?php
}
?>
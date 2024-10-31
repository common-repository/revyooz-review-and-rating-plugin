<?php

/************************************
* Add the review information to 
* the post, at the top or bottom
* depending on where user specifies
* in the settings
************************************/


add_filter( 'the_content', 'display_revyooz_info' );


function display_revyooz_info($content){
	
	if (is_single()){
		// Only add the revyooz information on the post page
		// not on the main front page or anywhere else
		
		
	global $wpdb, $post; // Needed to access database & get post id 
	$post_id = $post->ID; // Gets the post id
	$meta_array = $wpdb->get_results("SELECT meta_key, meta_value FROM wp_postmeta WHERE post_id = $post_id"); // Gets all the postmeta for this post
	
	foreach ($meta_array as $value){
		// Turns the values we get from the database into 
		// variables and values
		$varname = $value->meta_key;
		$$varname = $value->meta_value;
	}

	if ($meta_array && $revyooz_enabled == "CHECKED"){
		// Only display info if there is a minimum of 
		// of info to display
	
		// If we are going to show the review, then lets load the stylesheet for it
		$rvz_plugin_url = plugin_dir_url( __FILE__ );
		wp_enqueue_style( 'revyooz_style', $rvz_plugin_url.'rvz_style.css' );

	
// Start building the review section

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

<style>



</style>

<div class="revyooz-review <?php echo "revyooz-display-" . $revyooz_display_side ?>">
<ul>
<?php
if ($revyooz_url && $revyooz_linktext){
?>
	<li><?php echo "<strong><a href=\"$revyooz_url\">$revyooz_linktext</a></strong>" ?></li>
<?php
}
?>
<?php
if ($revyooz_price){
?>
	<li><span class="rvz-feature">Price: </span>$<?php echo $revyooz_price ?></li>
<?php
}
?>


<?php
if ($revyooz_stars_overall){
?>
	<li><span><?php echo $revyooz_stars_overall_name ?></span><?php num_stars_2($revyooz_stars_overall) ?></li>
<?php
}
?>

<?php
if ($revyooz_stars_1){
?>
	<li><span><?php echo $revyooz_stars_cat1_name ?></span><?php num_stars_2($revyooz_stars_1) ?></li>
<?php
}
?>

<?php
if ($revyooz_stars_2){
?>
	<li><span><?php echo $revyooz_stars_cat2_name ?></span><?php num_stars_2($revyooz_stars_2) ?></li>
<?php
}
?>

<?php
if ($revyooz_stars_3){
?>
	<li><span><?php echo $revyooz_stars_cat3_name ?></span><?php num_stars_2($revyooz_stars_3) ?></li>
<?php
}
?>

<?php
if ($revyooz_stars_4){
?>
	<li><span><?php echo $revyooz_stars_cat4_name ?></span><?php num_stars_2($revyooz_stars_4) ?></li>
<?php
}
?>

<?php
if ($revyooz_stars_5){
?>
	<li><span><?php echo $revyooz_stars_cat5_name ?></span><?php num_stars_2($revyooz_stars_5) ?></li>
<?php
}
?>



</ul>
</div>


<?php
	} // end of if is_single()
		} // end of only display info if there is info to display


		return $content;
	
}


// Function to build the stars
function num_stars($number_of_stars){
		$star_url = plugins_url() . "/revyooz/img/bluestar.png"; 
		$width_per_star = 15;
		$height_per_star = 14;
		$width = $width_per_star * $number_of_stars;
		$stars_div = '<div class="revyooz-stars" style=" background-image:url(';
		$stars_div .= $star_url;
		$stars_div .= ');  min-height:';
		$stars_div .= $height_per_star;
		$stars_div .= 'px; width:';
		$stars_div .= $width;
		$stars_div .= 'px;">&nbsp;</div>';
		
		echo $stars_div;	
}

function num_stars_2($number_of_stars){
	// Use sprites to display ratings
	
	echo '<ul class="rvz-star-rating">';
	for ($i=1; $i<6; $i++){
		echo '<li class="';
		if ( $i <= $number_of_stars){
			echo "rated";
		}
		echo '"></li>';
	}
	echo "</ul>";
}



?>
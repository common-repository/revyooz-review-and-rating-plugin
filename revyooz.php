<?php
/**
 * Plugin Name: Revyooz 
 * Plugin URI: http://jasonmayoff.com/revyooz-plugin
 * Description: Add star reviews to any website
 * Version: 1.1
 * Author: Jason Mayoff
 * Author URI: http://jasonmayoff.com
 * License: GPL2
 */
 
 if (is_admin()){
	include 'rvz_admin.php';
	include 'rvz_options.php';
 }else{
	include 'rvz_add_to_post.php';
} 
 
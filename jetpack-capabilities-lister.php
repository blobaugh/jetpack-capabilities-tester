<?php
/*
Plugin Name: Jetpack Capabilities Lister
Plugin URI: http://github.com/blobaugh/jetpack-capabilities-lister
Description: Lists the capabilities of a user in regards to Jetpack
Author: Ben Lobaugh
Version: 0.6
Author URI: http://ben.lobaugh.net
*/


add_action( 'admin_notices', function() { 

	$caps = array( 
		'jetpack_connect',
		'jetpack_reconnect',
		'jetpack_disconnect',
		'jetpack_manage_modules',
		'jetpack_activate_modules',
		'jetpack_deactivate_modules',
		'jetpack_configure_modules',
		'jetpack_admin_page',
		'jetpack_connect_user'
	);


	if( is_admin() ) {
	
		echo "<div class='updated'>";

		echo "<ul>";

		
		foreach( $caps AS $c ) {
			echo "<li>" . jetpack_user_can( $c ) . "</li>";
		}

		echo "</ul>";

		echo "</div>";
	} // end if ( is_admin )
	
});


function jetpack_user_can( $cap ) {
	$cap2 = ucfirst( str_replace( '_', ' ', $cap ) );
	if( current_user_can( $cap ) ) {
		return $cap2 . ': <span style="background-color:green">YES</span>';	
	} else {
		return $cap2 . ': <span style="background-color:red">NO</span>';
	}
}

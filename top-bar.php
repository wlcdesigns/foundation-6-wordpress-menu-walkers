<?php
/* ------------- functions.php ------------- */

//Register Menu
function _register_menu() {
	register_nav_menu( 'topbar-menu', __( 'Top Bar Menu','textdomain' ) );
}

//Add Menu to theme setup hook
add_action( 'after_setup_theme', '_theme_setup' );

function _theme_setup()
{
	add_action( 'init', '_register_menu' );
		
	//Theme Support
	add_theme_support( 'menus' );
}

/* ------------- functions.php ------------- */

/*
 * Instatiate menu. This function will somewhere in yout theme, 
 * presumably the header.php
 */
 
echo'
<div class="top-bar">
	<div class="top-bar-right">';
		wp_nav_menu(array(
	    	'container' => false,
	    	'menu' => __( 'Top Bar Menu', 'textdomain' ),
	    	'menu_class' => 'dropdown menu',
	    	'theme_location' => 'main-menu',
	    	'items_wrap'      => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>',
	    	//Recommend setting this to false, but if you need a fallback...
	    	'fallback_cb' => 'f6_topbar_menu_fallback',
	        'walker' => new F6_TOPBAR_MENU_WALKER(),
		));
	echo'
	</div>
</div>';

?>
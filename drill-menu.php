<?php
/* ------------- functions.php ------------- */

//Register Menu
function _register_menu() {
	register_nav_menu( 'drill-menu', __( 'Drill Menu','textdomain' ) );
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
 * presumably the sidebar.php and/or off-canvas
 */
 
wp_nav_menu(array(
	'container' => false,
	'menu' => __( 'Drill Menu', 'textdomain' ),
	'menu_class' => 'vertical menu',
	'theme_location' => 'drill-menu',
	'items_wrap'      => '<ul id="%1$s" class="%2$s" data-drilldown="">%3$s</ul>',
	//Recommend setting this to false, but if you need a fallback...
	'fallback_cb' => 'f6_drill_menu_fallback',
    'walker' => new F6_DRILL_MENU_WALKER(),
));

?>
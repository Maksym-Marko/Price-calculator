<?php
/*
Plugin Name: Калькулятор цен на сайт
Plugin URI: https://github.com/Maxim-us/Price-calculator
Description: Калькулятор цен для Вашего сайта. Вы сможете настроить калькулятор цен для Ваших посетителей.
Author: Marko Maksym
Version: 1.1
Author URI: http://markomaksym.com.ua/
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*
* Unique string - MXPCTYW
*/

/*
* Define MXPCTYW_PLUGIN_PATH
*
* E:\OpenServer\domains\my-domain.com\wp-content\plugins\price-calculator-to-your-website\price-calculator-to-your-website.php
*/
if ( ! defined( 'MXPCTYW_PLUGIN_PATH' ) ) {

	define( 'MXPCTYW_PLUGIN_PATH', __FILE__ );

}

/*
* Define MXPCTYW_PLUGIN_URL
*
* Return http://my-domain.com/wp-content/plugins/price-calculator-to-your-website/
*/
if ( ! defined( 'MXPCTYW_PLUGIN_URL' ) ) {

	define( 'MXPCTYW_PLUGIN_URL', plugins_url( '/', __FILE__ ) );

}

/*
* Define MXPCTYW_PLUGN_BASE_NAME
*
* 	Return price-calculator-to-your-website/price-calculator-to-your-website.php
*/
if ( ! defined( 'MXPCTYW_PLUGN_BASE_NAME' ) ) {

	define( 'MXPCTYW_PLUGN_BASE_NAME', plugin_basename( __FILE__ ) );

}

/*
* Define MXPCTYW_TABLE_SLUG
*/
if ( ! defined( 'MXPCTYW_TABLE_SLUG' ) ) {

	define( 'MXPCTYW_TABLE_SLUG', 'mxpctyw_table_slug' );

}

/*
* Define MXPCTYW_PLUGIN_ABS_PATH
* 
* E:\OpenServer\domains\my-domain.com\wp-content\plugins\price-calculator-to-your-website/
*/
if ( ! defined( 'MXPCTYW_PLUGIN_ABS_PATH' ) ) {

	define( 'MXPCTYW_PLUGIN_ABS_PATH', dirname( MXPCTYW_PLUGIN_PATH ) . '/' );

}

/*
* Define MXPCTYW_PLUGIN_VERSION
*/
if ( ! defined( 'MXPCTYW_PLUGIN_VERSION' ) ) {

	// version
	define( 'MXPCTYW_PLUGIN_VERSION', '1.1' ); // Must be replaced before production on for example '1.0'

}

/*
* Define MXPCTYW_MAIN_MENU_SLUG
*/
if ( ! defined( 'MXPCTYW_MAIN_MENU_SLUG' ) ) {

	// version
	define( 'MXPCTYW_MAIN_MENU_SLUG', 'mxpctyw-price-calculator-to-your-website-menu' );

}

/**
 * activation|deactivation
 */
require_once plugin_dir_path( __FILE__ ) . 'install.php';

/*
* Registration hooks
*/
// Activation
register_activation_hook( __FILE__, array( 'MXPCTYW_Basis_Plugin_Class', 'activate' ) );

// Deactivation
register_deactivation_hook( __FILE__, array( 'MXPCTYW_Basis_Plugin_Class', 'deactivate' ) );


/*
* Include the main MXPCTYWPriceCalculatorToYourWebsite class
*/
if ( ! class_exists( 'MXPCTYWPriceCalculatorToYourWebsite' ) ) {

	require_once plugin_dir_path( __FILE__ ) . 'includes/final-class.php';

	/*
	* Translate plugin
	*/
	add_action( 'plugins_loaded', 'mxpctyw_translate' );

	function mxpctyw_translate()
	{

		load_plugin_textdomain( 'mxpctyw-domain', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

	}

}
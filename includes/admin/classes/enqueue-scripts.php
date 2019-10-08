<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXPCTYW_Enqueue_Scripts
{

	/*
	* MXPCTYW_Enqueue_Scripts
	*/
	public function __construct()
	{

	}

	/*
	* Registration of styles and scripts
	*/
	public static function mxpctyw_register()
	{

		// register scripts and styles
		add_action( 'admin_enqueue_scripts', array( 'MXPCTYW_Enqueue_Scripts', 'mxpctyw_enqueue' ) );

	}

		public static function mxpctyw_enqueue()
		{

			wp_enqueue_style( 'mxpctyw_font_awesome', MXPCTYW_PLUGIN_URL . 'assets/font-awesome-4.6.3/css/font-awesome.min.css' );

			wp_enqueue_style( 'mxpctyw_admin_style', MXPCTYW_PLUGIN_URL . 'includes/admin/assets/css/style.css', array( 'mxpctyw_font_awesome' ), MXPCTYW_PLUGIN_VERSION, 'all' );

			wp_enqueue_script( 'mxpctyw_admin_script', MXPCTYW_PLUGIN_URL . 'includes/admin/assets/js/script.js', array( 'jquery' ), MXPCTYW_PLUGIN_VERSION, false );

		}

}
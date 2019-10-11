<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXPCTYW_FrontEnd_Main
{

	/*
	* MXPCTYW_FrontEnd_Main constructor
	*/
	public function __construct()
	{

	}

	/*
	* Additional classes
	*/
	public function mxpctyw_additional_classes()
	{

		// enqueue_scripts class
		mxpctyw_require_class_file_frontend( 'enqueue-scripts.php' );

		MXPCTYW_Enqueue_Scripts_Frontend::mxpctyw_register();

		// create shortcode
		mxpctyw_require_class_file_frontend( 'shortcode.php' );

		MXPCTYW_Shortcode::create_shortcode();

	}

}

// Initialize
$initialize_admin_class = new MXPCTYW_FrontEnd_Main();

// include classes
$initialize_admin_class->mxpctyw_additional_classes();
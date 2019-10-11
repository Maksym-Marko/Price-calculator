<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXPCTYW_Admin_Main
{

	// list of model names used in the plugin
	public $models_collection = [
		'MXPCTYW_Main_Page_Model'
	];

	/*
	* MXPCTYW_Admin_Main constructor
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
		mxpctyw_require_class_file_admin( 'enqueue-scripts.php' );

		MXPCTYW_Enqueue_Scripts::mxpctyw_register();


		// CPT class
		// mxpctyw_require_class_file_admin( 'cpt.php' );

		// MXPCTYWCPTclass::createCPT();

	}

	/*
	* Models Connection
	*/
	public function mxpctyw_models_collection()
	{

		// require model file
		foreach ( $this->models_collection as $model ) {
			
			mxpctyw_use_model( $model );

		}		

	}

	/**
	* registration ajax actions
	*/
	public function mxpctyw_registration_ajax_actions()
	{

		// ajax requests to main page
		MXPCTYW_Main_Page_Model::mxpctyw_wp_ajax();

	}

	/*
	* Routes collection
	*/
	public function mxpctyw_routes_collection()
	{

		// main menu item
		MXPCTYW_Route::mxpctyw_get( 'MXPCTYW_Main_Page_Controller', 'index', '', [
			'page_title' 	=> 'Калькуляток Цен',
			'menu_title' 	=> 'Калькуляток Цен',
			'dashicons' 	=> 'dashicons-buddicons-replies'
		] );

	}

}

// Initialize
$initialize_admin_class = new MXPCTYW_Admin_Main();

// include classes
$initialize_admin_class->mxpctyw_additional_classes();

// include models
$initialize_admin_class->mxpctyw_models_collection();

// ajax requests
$initialize_admin_class->mxpctyw_registration_ajax_actions();

// include controllers
$initialize_admin_class->mxpctyw_routes_collection();
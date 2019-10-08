<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*
* Require class for admin panel
*/
function mxpctyw_require_class_file_admin( $file ) {

	require_once MXPCTYW_PLUGIN_ABS_PATH . 'includes/admin/classes/' . $file;

}


/*
* Require class for frontend panel
*/
function mxpctyw_require_class_file_frontend( $file ) {

	require_once MXPCTYW_PLUGIN_ABS_PATH . 'includes/frontend/classes/' . $file;

}

/*
* Require a Model
*/
function mxpctyw_use_model( $model ) {

	require_once MXPCTYW_PLUGIN_ABS_PATH . 'includes/admin/models/' . $model . '.php';

}
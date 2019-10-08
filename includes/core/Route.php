<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// require Route-Registrar.php
require_once MXPCTYW_PLUGIN_ABS_PATH . 'includes/core/Route-Registrar.php';

/*
* Routes class
*/
class MXPCTYW_Route
{

	public function __construct()
	{
		// ...
	}
	
	public static function mxpctyw_get( ...$args )
	{

		return new MXPCTYW_Route_Registrar( ...$args );

	}
	
}
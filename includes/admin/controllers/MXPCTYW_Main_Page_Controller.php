<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXPCTYW_Main_Page_Controller extends MXPCTYW_Controller
{
	
	public function index()
	{

		$model_inst = new MXPCTYW_Main_Page_Model();

		$data = $model_inst->mxpctyw_get_row();

		return new MXPCTYW_View( 'main-page', $data );

	}

	
}
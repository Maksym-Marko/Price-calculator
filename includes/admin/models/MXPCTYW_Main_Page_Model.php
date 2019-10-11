<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
* Main page Model
*/
class MXPCTYW_Main_Page_Model extends MXPCTYW_Model
{

	/*
	* Observe function
	*/
	public static function mxpctyw_wp_ajax()
	{

		add_action( 'wp_ajax_mxpctyw_update', array( 'MXPCTYW_Main_Page_Model', 'prepare_update_database_column' ), 10, 1 );

	}

	/*
	* Prepare for data updates
	*/
	public static function prepare_update_database_column()
	{
		
		// Checked POST nonce is not empty
		if( empty( $_POST['nonce'] ) ) wp_die( '0' );

		// Checked or nonce match
		if( wp_verify_nonce( $_POST['nonce'], 'mxpctyw_nonce_request' ) ){

			$data = array();

			$data['calc_name'] = sanitize_text_field( $_POST['calc_name'] );

			$data['calc_currency'] = sanitize_text_field( $_POST['calc_currency'] );

			$data['elements'] = array();

			foreach( $_POST['obj_price_calcs_elem'] as $key => $value ) {

				$data['elements'][$key] = array();

				$data['elements'][$key]['name'] = sanitize_text_field( $value['price_calc_element_name'] );

				$data['elements'][$key]['desc'] = sanitize_textarea_field( $value['price_calc_element_desc'] );

				$data['elements'][$key]['item_name'] = sanitize_text_field( $value['price_calc_element_item_name'] );

				$data['elements'][$key]['item_price'] = sanitize_text_field( $value['price_calc_element_item_price'] );

			}

			// Update data
			self::update_database_column( $data );		

		}

		wp_die();

	}

		// Update data
		public static function update_database_column( $data )
		{

			$serialized_data = maybe_serialize( $data );

			// update_option
			$_update_option = update_option( 'mxpctyw_calc_price_options', $serialized_data );

			if( $_update_option ) {

				echo 'updated';

			} else {

				echo 'failed';

			}

		}

	public function mxpctyw_get_row()
	{

		$data = array();

		$get_option = get_option( 'mxpctyw_calc_price_options' );

		if( $get_option !== false ) {

			$data = maybe_unserialize( $get_option );

		}
		return $data;
	}
	
}
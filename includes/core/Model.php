<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*
* Model class
*/
class MXPCTYW_Model
{

	private $wpdb;

	/**
	* Table name
	*/
	protected $table = MXPCTYW_TABLE_SLUG;

	/**
	* fields
	*/
	protected $fields = '*';

	/*
	* Model constructor
	*/
	public function __construct()
	{		 	

	}	

	

}
<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*
* Error Handle calss
*/
class MXPCTYW_Display_Error
{

	/**
	* Error notice
	*/
	public $mxpctyw_error_notice = '';

	public function __construct( $mxpctyw_error_notice )
	{

		$this->mxpctyw_error_notice = $mxpctyw_error_notice;

	}

	public function mxpctyw_show_error()
	{
		
		add_action( 'admin_notices', function() { ?>

			<div class="notice notice-error is-dismissible">

			    <p><?php echo $this->mxpctyw_error_notice; ?></p>
			    
			</div>
		    
		<?php } );

	}

}
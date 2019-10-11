jQuery( document ).ready( function( $ ) {

	// init 
	mxpctyw_add_custom_marker_script( $ );

	// reset marker
	mxpctyw_custom_marker_reset_marker_script( $ );

	// button delete price_calc
	check_count_price_calcs_and_hidden_del_button( $ );

	/*************
	* AJAX
	*/
	// create calc
	$( '#mxpctyw_calc_create' ).on( 'submit', function( e ) {

		e.preventDefault();

		// action
		var action = 'mxpctyw_update';

		// required fields
		var requiredFields = $( '#mxpctyw_price_calcs_wrap' ).find( '.mx-is_required' );

		// price_calcs wrap
		var wrapprice_calcs = $( '#mxpctyw_price_calcs_wrap' );

		if(
			mxpctyw_check_invalid_price_calc_fields( $, requiredFields, wrapprice_calcs ) &&
			mxpctyw_is_coordinates_fields( $, $( '.mx-is_coordinates' ) )
		) {

			// get data and send it
			mxpctyw_ajax_data( $, $( this ), action );

		}

	} );	
	

	/****************
	* price_calc box
	*/
	// create a new box price_calc
	var price_calcBox = $( '#mxpctyw_price_calcs_wrap_example' ).find( '.mxpctyw_price_calc_wrap' );

	// create a new box area
	var arerBox = $( '#mxpctyw_price_calcs_wrap_example' ).find( '.mxpctyw_price_calc_area' );

	// Add the first price_calc if the block is empty
	if( $( '#mxpctyw_price_calcs_wrap' ).find( '.mxpctyw_price_calc_wrap' ).length === 0 ) {

		$( price_calcBox ).clone().appendTo( '#mxpctyw_price_calcs_wrap' );

	}
	
	// event add price_calcs
	$( '#mxpctyw_price_calcs_wrap' ).on( 'click', '.mx-add_price_calc', function() {

		var requiredFields = $( '#mxpctyw_price_calcs_wrap' ).find( '.mx-is_required' );		

		var wrapprice_calcs = $( '#mxpctyw_price_calcs_wrap' );

		setTimeout( function(){

			if( mxpctyw_check_invalid_price_calc_fields( $, requiredFields, wrapprice_calcs ) ) {

				// set the number of price_calc
				mxpctyw_set_attr_for_poins( $, price_calcBox );	

				$( price_calcBox ).clone().appendTo( '#mxpctyw_price_calcs_wrap' );

			}

			// chech count price_calc
			check_count_price_calcs_and_hidden_del_button( $ );

		},500 );

	} );

	// delete price_calc
	$( '#mxpctyw_price_calcs_wrap' ).on( 'click', '.mx-del_price_calc', function() {

		if( confirm( confirmTextdelprice_calc ) ) {

			$( this ).parent().css( 'opacity', 0.4 );

			$( this ).parent().animate( { 'height': '15px' }, 500, function() {

				$( this ).remove();

			} );

			// chech count price_calc
			check_count_price_calcs_and_hidden_del_button( $ );

		}		

	} );	

	// open box
	$( '#mxpctyw_price_calcs_wrap' ).on( 'click', '.mx-open_price_calc_box', function( e ) {

		e.preventDefault();

		if( $( this ).parent().hasClass( 'mxpctyw_price_calc_wrap_open' ) ) {

			$( this ).parent().animate( { 'height': '50px' }, 500, function(){

				$( this ).removeClass( 'mxpctyw_price_calc_wrap_open' );

				$( this ).attr( 'style', '' );

			} );			

		} else {

			$( this ).parent().animate( { 'height': '200px' }, 500, function(){

				$( this ).addClass( 'mxpctyw_price_calc_wrap_open' );

				$( this ).css( 'height', 'auto' );

			} );

		}		

	} );

	// focus input name of the price_calc
	$( '#mxpctyw_price_calcs_wrap' ).on( 'focus', '.mx_new_price_calc_name', function() {

		if( !$( this ).parent().parent().hasClass( 'mxpctyw_price_calc_wrap_open' ) ) {

			$( this ).parent().parent().animate( { 'height': '200px' }, 500, function(){

				$( this ).addClass( 'mxpctyw_price_calc_wrap_open' );

				$( this ).css( 'height', 'auto' );

			} );

		}

	} );


	/***************
	* Areas
	*/
	// event add ares
	$( '#mxpctyw_price_calcs_wrap' ).on( 'click', '.mx-add_region', function() {

		var areaParent = $( this ).parent().parent();

		// check empty region inputs
		if( mxpctyw_check_empty_areas( $, areaParent ) ) {

			$( arerBox ).clone().appendTo( areaParent );

		}

	} );

	// event delete region
	$( '#mxpctyw_price_calcs_wrap' ).on( 'click', '.mx-delete_region', function() {

		$( this ).parent().remove();

	} );	

} );

/*
* functions
*/
// get data from the form
function mxpctyw_ajax_data( $, _this, action ) {

	// data vars	

	var nonce 				= _this.find( '#mxpctyw_wpnonce' ).val();

	var calcName 			= $( '#mx_name_of_the_calc' ).val();

	var calc_currency 			= $( '#mx_currency_of_the_calc' ).val();

	var obj_price_calcs_elem 	= {};

	// get data of price_calcs
	var obj_price_calc_tmp = {};

	$( '#mxpctyw_price_calcs_wrap' ).find( '.mxpctyw_price_calc_wrap' ).each( function(  index, element ) {

		// push name into tmp obj
		obj_price_calc_tmp['price_calc_element_name'] = $( this ).find( '.mx_new_price_calc_name' ).val();

		// push desc into tmp obj
		obj_price_calc_tmp['price_calc_element_desc'] = $( this ).find( '.mx_new_price_calc_desc' ).val();

		// push item name into tmp obj
		obj_price_calc_tmp['price_calc_element_item_name'] = $( this ).find( '.mx_new_price_calc_item_name' ).val();

		// push item price into tmp obj
		obj_price_calc_tmp['price_calc_element_item_price'] = $( this ).find( '.mx_new_price_calc_item_price' ).val();

		// --- push into main obj ---
		obj_price_calcs_elem[index] = obj_price_calc_tmp;

		// clean tmp obj
		obj_price_calc_tmp = {};

	} );

	// set data
	$( '#mxpctyw_price_calcs_wrap' ).find( '.mxpctyw_price_calc_wrap' ).promise().done( function() {

		var data = {

			'action'					: 	action,
			'nonce'						: 	nonce,
			'calc_name'					: 	calcName,
			'calc_currency' 			: 	calc_currency,
			'obj_price_calcs_elem' 		: 	obj_price_calcs_elem

		};

		jQuery.post( ajaxurl, data, function( response ) {

			if( response === 'updated' ) {

				alert( 'Данные сохранены!' );

			} else {

				alert( 'Что-то пошло не так. Возможно, Вы не внесли изменения.' );

			}

		} );

	} );		

}

// delete calc
function mxpctyw_delete_calc( $, nonce, id_calc ) {

	var data = {

		'action'			: 	'mxpctyw_del_calc',
		'nonce'				: 	nonce,
		'id_calc'			: 	id_calc

	};

	if( confirm( confirmTextdelcalc ) ) {

		jQuery.post( ajaxurl, data, function( response ) {

			console.log( response );

			window.location.href = 'admin.php?page=mxpctyw-many-price_calcs-on-the-calc';

		} );

	}

}

// check empty fields
function mxpctyw_check_invalid_price_calc_fields( $, requiredFields, wrapprice_calcs ) {

	var arrayBolleans = [];

	requiredFields.each( function(){

		if( $( this ).val().length === 0 ) {

			$( this ).addClass( 'is-invalid' );

			arrayBolleans.push( 'false' );

			// find parents and open it
			mxpctyw_find_parent_by_className( $, $( this ), 'mxpctyw_price_calc_wrap' );

		} else {

			// check coordinates
			if( $( this ).hasClass( 'mx-is_coordinates' ) ) {		

				if( mxpctyw_is_coordinates( $, $( this ).val() ) ) {

					$( this ).removeClass( 'is-invalid' );

					arrayBolleans.push( 'true' );

				} else {

					$( this ).addClass( 'is-invalid' );

					arrayBolleans.push( 'false' );

					// find parents and open it
					mxpctyw_find_parent_by_className( $, $( this ), 'mxpctyw_price_calc_wrap' );

				}

			} else {

				$( this ).removeClass( 'is-invalid' );

				arrayBolleans.push( 'true' );

			}			

		}		

	} );

	if( $.inArray( 'false', arrayBolleans ) === -1 ) {

		wrapprice_calcs.removeClass( 'is-invalid' );

		return true;

	} else {

		wrapprice_calcs.addClass( 'is-invalid' );

		return false;

	}

}

// set attr for price_calcs
function mxpctyw_set_attr_for_poins( $, price_calcBox ) {
	
	var data_id_last_price_calc = parseInt( $( '#mxpctyw_price_calcs_wrap' ).find( '.mxpctyw_price_calc_wrap' ).last().attr( 'data-id' ) );

	data_id_last_price_calc++;

	// set number
	price_calcBox.find( '.mx_number_of_price_calc_n' ).text( data_id_last_price_calc );

	// set data
	price_calcBox.attr( 'data-id', data_id_last_price_calc );

}

// check empty areas
function mxpctyw_check_empty_areas( $, areaParent ) {

	var _return = true;

	var inputs = areaParent.find( '.mx_new_price_calc_region' );

	inputs.each( function() {

		if( $( this ).val().length === 0 ) {

			$( this ).addClass( 'is-invalid' );

			_return = false;

			return false;

		} else {

			$( this ).removeClass( 'is-invalid' );

			_return = true;

		}

	} );

	return _return;

}

// find parent by className
function mxpctyw_find_parent_by_className( $, element, findParent ) {

	var allParents = element.parents();

	allParents.map( function( i, el ) {

		if( this.className.indexOf( findParent ) > -1 ) {

			var parentDataId = parseInt( this.dataset.id );

			$( '.' + findParent ).each( function() {

				var getDataId = parseInt( $( this ).attr( 'data-id' ) );

				if( getDataId === parentDataId ) {

					$( this ).addClass( 'mxpctyw_price_calc_wrap_open' );

					$( this ).attr( 'style', '' );

				}

			} );


		}		

	} );	

}

// is coordinates fields
function mxpctyw_is_coordinates_fields( $, element ) {

	var arrayBolleans = [];

	element.each( function() {

		if( mxpctyw_is_coordinates( $, $( this ).val() ) ) {

			$( this ).removeClass( 'is-invalid' );

			arrayBolleans.push( 'true' );

		} else {

			$( this ).addClass( 'is-invalid' );

			arrayBolleans.push( 'false' );

		}

	} );

	if( $.inArray( 'false', arrayBolleans ) === -1 ) {

		return true;

	} else {

		return false;

	}

}

// is coordinates
function mxpctyw_is_coordinates( $, $value ) {

	if( isNaN( $value ) ) {

		return false;

	}

	return true;

}

// button delete price_calc hidden
function check_count_price_calcs_and_hidden_del_button( $ ) {

	setTimeout( function() {

		var countprice_calcs = $( '#mxpctyw_price_calcs_wrap' ).find( '.mxpctyw_price_calc_wrap' ).length;

		if( countprice_calcs === 1 ) {

			$( '#mxpctyw_price_calcs_wrap' ).find( '.mxpctyw_price_calc_wrap' ).addClass( 'mxpctyw_hide_del_price_calc' );
		
		} else {

			$( '#mxpctyw_price_calcs_wrap' ).find( '.mxpctyw_price_calc_wrap' ).removeClass( 'mxpctyw_hide_del_price_calc' );

		}

	},1000 );	

}

// Add Custom Marker
function mxpctyw_add_custom_marker_script( $ ) {

	$( '#mxpctyw_price_calcs_wrap' ).on( 'click', '.mxpctyw_add_custom_marker', function() {

		var _this = $( this );

        var upload = wp.media( {

	        title: 'Choose Image',

	        multiple: false

        } ).on( 'select', function(){

            var select = upload.state().get('selection');

            var attach = select.first().toJSON();

            _this.attr( 'src', attach.url );

            _this.attr( 'data-default-marker', 1 );

            _this.parent().find( '.mxpctyw_custom_marker_reset_marker' ).show();

        } ).open();

	} );

}

// reset marker
function mxpctyw_custom_marker_reset_marker_script( $ ) {

	$( '#mxpctyw_price_calcs_wrap' ).on( 'click', '.mxpctyw_custom_marker_reset_marker', function() {

		$( this ).parent().find( '.mxpctyw_add_custom_marker' ).attr( 'src', mxpctyw_localize_script_obj.default_marker_src );

		$( this ).parent().find( '.mxpctyw_add_custom_marker' ).attr( 'data-default-marker', 0 );

		$( this ).hide();

	} );
	
}
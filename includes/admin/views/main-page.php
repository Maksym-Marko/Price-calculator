<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// var_dump( $data );

?>

<h1 class="text-secondary">Настроить Калькулятор</h1>

<form id="mxpctyw_calc_create" class="mx-settings" method="post" action="">

	<div class="mx-block_wrap_price">

		<div class="form-group">
			<label for="mx_name_of_the_calc">Название Калькулятора <span class="text-danger">*</span></label>
			<input type="text" class="form-control" id="mx_name_of_the_calc" name="mx_name_of_the_calc" value="<?php echo $data['calc_name']; ?>" required />	
		</div>		

	</div>

	<!-- area of creating a new price_calcs  -->
	
	<!-- Working block -->
	<div class="mx-block_wrap_price" id="mxpctyw_price_calcs_wrap">

		<?php if( $data['elements'] !== NULL ) : ?>
		
			<?php foreach( $data['elements'] as $key => $value ) : ?>

				<?php $element_id = $key + 1; ?>

				<!-- price_calc wrap -->
				<div class="mxpctyw_price_calc_wrap" data-id="<?php echo $element_id; ?>">

					<div class="mx_number_of_price_calc">
						<span class="mx_number_of_price_calc_s">#</span>
						<span class="mx_number_of_price_calc_n"><?php echo $element_id; ?></span>
					</div>

					<button type="button" class="mx-open_price_calc_box"><i class="fa fa-angle-down"></i></button>

					<button type="button" class="mx-add_price_calc" title="Добавить элемент"><i class="fa fa-plus"></i></button>

					<button type="button" class="mx-del_price_calc" title="Удалить"><i class="fa fa-trash"></i></button>
						
					<div class="form-group mx-form-group_first">

						<small class="form-text text-dark">Название элемента подсчета *</small><br>
						<input type="text" class="mx_new_price_calc_name form-control mx-is_required" name="mx_new_price_calc_name" placeholder="Например: Ламинат" value="<?php echo $value['name']; ?>" />
						<hr>

						<small class="form-text text-dark">Описание</small>
						<textarea name="mx_new_price_calc_desc" class="mx_new_price_calc_desc form-control" placeholder="Например: Сколько метров"><?php echo $value['desc']; ?></textarea>

						<div>
							
							<small class="form-text text-dark">Единица измерения *</small>
							<input type="text" name="mx_new_price_calc_item_name" class="mx_new_price_calc_item_name form-control mx-is_required" placeholder="Например: 1 м" value="<?php echo $value['item_name']; ?>" />
							
							<small class="form-text text-dark">Цена *</small>
							<input type="text" name="mx_new_price_calc_item_price" class="mx_new_price_calc_item_price form-control mx-is_required mx-is_coordinates" placeholder="Например: 7" value="<?php echo $value['item_price']; ?>" />
							
						</div>

					</div>

				</div>
				<!-- price_calc wrap -->

			<?php endforeach; ?>

		<?php endif; ?>

	</div>

	<!-- This block is an example block structure. For JS -->
	<div class="mx-block_wrap_price" id="mxpctyw_price_calcs_wrap_example" style="display: none;">
		<?php include( 'components/add_price_calc_for_js.php' ); ?>
	</div>
	<!-- end JS block -->

	<div class="mx-block_wrap_price">

		<p class="mx-submit_button_wrap">
			<input type="hidden" id="mxpctyw_wpnonce" name="mxpctyw_wpnonce" value="<?php echo wp_create_nonce( 'mxpctyw_nonce_request' ) ;?>" />
			<input class="button-primary" type="submit" name="mxpctyw-submit" value="Создать калькулятор" />
		</p>

	</div>

</form>

<!-- Variables for javascript with translation functions -->
<?php include( 'components/js_vars.php' ); ?>
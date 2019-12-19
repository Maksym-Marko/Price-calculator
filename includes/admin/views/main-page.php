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
			<input type="text" class="form-control" id="mx_name_of_the_calc" name="mx_name_of_the_calc" value="<?php echo $data['calc_name']; ?>" placeholder="Например: Калькулятор ремонта" required />	
		</div>

	</div>

	<div class="mx-block_wrap_price">

		<div class="form-group">
			<label for="mx_name_of_the_calc">Валюта <span class="text-danger">*</span></label>
			<input type="text" class="form-control" id="mx_currency_of_the_calc" name="mx_currency_of_the_calc" value="<?php echo $data['calc_currency']; ?>" placeholder="Например: $" required />	
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
							<input type="number" step="0.01" name="mx_new_price_calc_item_price" class="mx_new_price_calc_item_price form-control mx-is_required mx-is_coordinates" placeholder="Например: 7" value="<?php echo $value['item_price']; ?>" />
							
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

<div class="mx-block_wrap_price">

	<div class="form-group">
		<h4>Шорткод для вставки:</h4>
		<span class="mx-shordcode-calc">
			[mxpctyw_price_calc]
		</span>
	</div>		

</div>

<div class="mx-block_wrap_price" style="background: #e4f9e2;">

	<div class="form-group">
		<h4>Плагин полезен Вам?</h4>
		<a href="https://wordpress.org/plugins/price-calculator-to-your-website/#reviews" target="_blank">Оставьте, пожалуйста, отзыв здесь</a> или <a href="https://wordpress.org/support/plugin/price-calculator-to-your-website/" target="_blank">напишите свои пожелания здесь</a>.

		<br><br>
		Также, заходите на мой сайт <a href="http://markomaksym.com.ua/ru/glavnaya/" target="_blank">markomaksym.com.ua</a>

		<br><br>
		<b>Спасибо, что используете плагин "Калькулятор цен на сайт". Мне приятно :)</b>
	</div>		

</div>

<!-- Variables for javascript with translation functions -->
<?php include( 'components/js_vars.php' ); ?>
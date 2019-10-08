<!-- price_calc wrap -->
<div class="mxpctyw_price_calc_wrap" data-id="1">

	<div class="mx_number_of_price_calc">
		<span class="mx_number_of_price_calc_s">#</span>
		<span class="mx_number_of_price_calc_n">1</span>
	</div>

	<button type="button" class="mx-open_price_calc_box"><i class="fa fa-angle-down"></i></button>

	<button type="button" class="mx-add_price_calc" title="Добавить элемент"><i class="fa fa-plus"></i></button>

	<button type="button" class="mx-del_price_calc" title="Удалить"><i class="fa fa-trash"></i></button>
		
	<div class="form-group mx-form-group_first">

		<small class="form-text text-dark">Название элемента подсчета *</small><br>
		<input type="text" class="mx_new_price_calc_name form-control mx-is_required" name="mx_new_price_calc_name" placeholder="Например: Ламинат" />
		<hr>

		<small class="form-text text-dark">Описание</small>
		<textarea name="mx_new_price_calc_desc" class="mx_new_price_calc_desc form-control" placeholder="Например: Сколько метров"></textarea>

		<div>
			
			<small class="form-text text-dark">Единица измерения *</small>
			<input type="text" name="mx_new_price_calc_item_name" class="mx_new_price_calc_item_name form-control mx-is_required" placeholder="Например: 1 м" />
			
			<small class="form-text text-dark">Цена *</small>
			<input type="text" name="mx_new_price_calc_item_price" class="mx_new_price_calc_item_price form-control mx-is_required mx-is_coordinates" placeholder="Например: 7" />
			
		</div>

	</div>

</div>
<!-- price_calc wrap -->

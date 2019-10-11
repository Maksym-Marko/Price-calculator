<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class MXPCTYW_Shortcode
{

	/*
	* MXPCTYW_Shortcode
	*/
	public function __construct()
	{

	}

	/*
	* Create shortcode
	*/
	public static function create_shortcode()
	{
		
		add_shortcode( 'mxpctyw_price_calc', function() {

			ob_start();

				$get_option = get_option( 'mxpctyw_calc_price_options' );

				if( $get_option !== false ) : ?>

					<?php $data = maybe_unserialize( $get_option ); ?>

					<div class="mx-calc-wrap">
						
						<h3><?php echo esc_html_e( $data['calc_name'], 'mxpctyw-domain' ); ?></h3>

						<div class="mx-calc-body">

							<?php foreach( $data['elements'] as $key => $value ) : ?>

								<!-- item ... -->
								<div class="mx-calc-item">

									<h4>
										<?php echo esc_html_e( $value['name'], 'mxpctyw-domain' ); ?>
										<span><?php echo esc_html_e( $value['item_price'], 'mxpctyw-domain' ); ?><?php echo esc_html_e( $data['calc_currency'], 'mxpctyw-domain' ); ?> </span>/
										<span><?php echo esc_html_e( $value['item_name'], 'mxpctyw-domain' ); ?></span>
									</h4>

									<div class="mx-calc-item-progress">

										<span><?php echo esc_html_e( $value['desc'], 'mxpctyw-domain' ); ?></span>

										<input type="number" data-calc-item-price="<?php echo esc_html_e( $value['item_price'], 'mxpctyw-domain' ); ?>" class="mx-calc-user-enter" />

										<span>Цена: </span><span class="mx-calc-price-result">0</span>
										<span><?php echo esc_html_e( $data['calc_currency'], 'mxpctyw-domain' ); ?></span>

									</div>
									
								</div>
								<!-- ... item -->

							<?php endforeach; ?>
							
						</div>

						<div class="mx-calc-footer">

							<button id="mxCalcCount">Рассчитать</button>

							<div id="mx-calc-result">
								<span>Сумма: </span>
								<span id="mxCalcShowAmonut">0</span>
								<span><?php echo $data['calc_currency']; ?></span>
							</div>
						</div>
	
					</div>

				<?php endif; ?>

			<?php return ob_get_clean();

		} );

	}
	
}
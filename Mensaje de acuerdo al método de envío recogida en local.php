
//* Mensaje de acuerdo al método de envío recogida en local
add_action( 'woocommerce_cart_totals_after_shipping' , 'mostrar_mensaje_tipo_envio' );
add_action( 'woocommerce_review_order_after_shipping' , 'mostrar_mensaje_tipo_envio' );
function mostrar_mensaje_tipo_envio() {
		$chosen_method    = WC()->session->get( 'chosen_shipping_methods' );
		$chosen_method     = explode(':', reset($chosen_method) );
		if ( $chosen_method[0] == 'local_pickup' ){
		    echo '<tr class="msg-shipping">
	            <td colspan="2" style="text-align:center;background:lightyellow;">
	            	<strong>Horario de atención de 8:00am - 12:00m</strong>
	            </td>
	        </tr>';
		}
}

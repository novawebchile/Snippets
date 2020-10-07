
//* Mostrar aviso al seleccionar tipo de envio 
add_action( 'woocommerce_cart_totals_after_shipping' , 'dl_abrir_mensaje_seleccionando_envio' );
add_action( 'woocommerce_review_order_after_shipping' , 'dl_abrir_mensaje_seleccionando_envio' );

function dl_abrir_mensaje_seleccionando_envio() {
		$chosen_method    = WC()->session->get( 'chosen_shipping_methods' );
		$chosen_method     = explode(':', reset($chosen_method) );

		if ( $chosen_method[0] == 'mrw' ){ //Aquí el metodo de envío
		    echo '<tr class="dl-msj-envio"><td colspan="2" style="text-align:center;background:#e0e0e0;">
 //Cambiar estilos en linea
	            	<strong>Lo recibirás mañana si lo pides antes de las 17:00!</strong> //Cambia tu mensaje
	            </td></tr>';			
		}
}
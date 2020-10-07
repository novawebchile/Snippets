//Notificar aviso  cuanto falta para envio gratuito 
add_action( 'woocommerce_before_checkout_form_cart_notices', 'dl_notificacion_envio_carrito_checkout', 10, 0 );
function dl_notificacion_envio_carrito_checkout() {
	if ( is_checkout() && WC()->cart ) {
		$total = WC()->cart->get_cart_contents_total(); // Después del dto
		$limit = 100.00; // Pon aquí cual es el precio del envío gratuito
		// Condicional si el carrito es inferior a la cantidad
		if ( $total < $limit ) {
			// Calcular diferencia
			$diff = $limit - $total;
			$diff_formatted = wc_price( $diff );
			// Mostrar aviso
			wc_add_notice( sprintf( "Añade %s para tener envío gratuito!", $diff_formatted ), 'notice' );
		}
	}
}
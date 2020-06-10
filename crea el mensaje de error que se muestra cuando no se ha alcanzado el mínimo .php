 // Crea el mensaje de error que se muestra cuando no se ha alcanzado el mínimo 

function gowoo_minimum_order() {
    if( is_cart() || is_checkout() ) { 
 
        $cart_subtotal = 0;
 
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
            $cart_subtotal += $cart_item['line_total'];
        endforeach; 
 
                        
        if( $cart_subtotal < 30000 ) {
        
            $message = 'Recuerde que para finalizar su compra debe alcanzar un monto mínimo de $30.000 Pesos <br/>';
            wc_add_notice( $message, 'error' );
        }
    }
}
add_action( 'woocommerce_check_cart_items', 'gowoo_minimum_order' );
?>
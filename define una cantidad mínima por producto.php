// Define una cantidad mínima por producto
add_action( 'woocommerce_check_cart_items', 'set_min_quantity_per_product' );
function set_min_quantity_per_product() {
    // Only run in the Cart or Checkout pages
    if( is_cart() || is_checkout() ) {
        global $woocommerce;
        $i = 0;

        // Lista de ID de productos y su cantidad mínima correspondiente
        $product_min_qty = array(
            array( 'id' => 12, 'min' => 10 ),
            array( 'id' => 7, 'min' => 5 )
        );

        // Array para guardar los productos del carrito que no cumplan la condición
        $bad_products = array();

 		// Comprobamos el número de productos del carrito
        foreach( $woocommerce->cart->cart_contents as $product_in_cart ) {

            foreach( $product_min_qty as $product_to_test ) {

                if( $product_to_test['id'] == $product_in_cart['product_id'] ) {

                    if( $product_in_cart['quantity'] < $product_to_test['min'] ) {

                        $bad_products[$i]['id'] = $product_in_cart['product_id'];
                        $bad_products[$i]['in_cart'] = $product_in_cart['quantity'];
                        $bad_products[$i]['min_req'] = $product_to_test['min'];
                    }
                }
            }
            $i++;
        }

        // Crea el mensaje de error que se muestra cuando no se ha alcanzado el mínimo
        if( is_array( $bad_products) && count( $bad_products ) >= 1 ) {

            $message = 'Lo sentimos. Pero para finalizar su compra debe alcanzar un mínimo de productos.<br/>';
            foreach( $bad_products as $bad_product ) {

                $message .= 'El producto "'. get_the_title( $bad_product['id'] ) .'" requiere una cantidad mínima de '. $bad_product['min_req'] .' unidades'.'. Usted sólo ha incluido '. $bad_product['in_cart'] .'.';
            }
            wc_add_notice( $message, 'error' );
        }
    }
}

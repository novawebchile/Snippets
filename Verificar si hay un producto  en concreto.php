add_action( 'woocommerce_before_cart', 'esl_find_product_in_cart_alt' );

function esl_find_product_in_cart_alt() {

$product_id = 197; // Indicamos el ID de producto que queremos detectar
$in_cart = false; // Inicializamos la variable en false

// Recorremos los productos del carrito y comprobamos si está el ID 197
foreach( WC()->cart->get_cart() as $cart_item ) {
   $product_in_cart = $cart_item['product_id'];
   if ( $product_in_cart === $product_id ) $in_cart = true;
}

  // Añadimos condicional para ejecutar algo en caso de que si esté
    if ( $in_cart ) {

        $notice = 'El producto ' . $product_id . ' está en el carrito';
        wc_print_notice( $notice, 'notice' );

    }

}

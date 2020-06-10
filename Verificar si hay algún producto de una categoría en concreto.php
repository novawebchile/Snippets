add_action('woocommerce_before_cart', 'esl_check_category_in_cart');

function esl_check_category_in_cart() {

// Inicializamos la variable en falso antes de recorrer los productos del carrito
$cat_in_cart = false;

// Recorremos los productos del carrito
foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

    // Si el producto tiene la categoría "Camisetas" asignada, pasamos la variable $cat_in_cart a verdadera
    if ( has_term( 'Camisetas', 'product_cat', $cart_item['product_id'] ) ) {
        $cat_in_cart = true;
        break;
    }
}

//Si hay algun producto de esa categoría hacemos o ejecutamos una función
if ( $cat_in_cart ) {
        wc_print_notice( 'Tienes una camiseta en el carrito de la compra', 'notice' );
}

}

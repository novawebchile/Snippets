<?php
//* NO incluyas la etiqueta de apertura
// Elimina el campo Notas del pedido de la página Checkout
add_filter( 'woocommerce_checkout_fields' , 'ocultar_woocommerce_checkout_fields' );
function ocultar_woocommerce_checkout_fields( $fields ) {
     unset($fields['order']['order_comments']);
     return $fields;
}
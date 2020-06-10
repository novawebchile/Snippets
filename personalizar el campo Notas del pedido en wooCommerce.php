<?php
//* NO incluyas la etiqueta de apertura
//* Modifica el campo "Notas del pedido" en WooCommerce
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
     $fields['order']['order_comments']['placeholder'] = 'Nombre de placeholder aquí';
     $fields['order']['order_comments']['label'] = 'Nombre de etiqueta aquí';
     return $fields;
}
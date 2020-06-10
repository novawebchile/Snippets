<?php
//* NO incluyas la etiqueta de apertura
 
//* Cambia el texto del botón Añadir al carrito en WooCommerce en un producto individual: versiones menores a 2.1
add_filter( 'add_to_cart_text', 'woo_custom_cart_button_text' );
 
function woo_custom_cart_button_text() {
 
        return __( 'Mi Texto 1', 'woocommerce' );
 
}
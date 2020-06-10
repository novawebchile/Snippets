return '';
};

add_filter( 'wc_add_to_cart_message', 'ocultar_wc_add_to_cart_message', 10, 2 );



Esta semana, además, me he visto con la necesidad de ocultar ese mismo mensaje de «se ha añadido a tu carrito», pero sólo para un producto en concreto. Ya que se trataba de una campaña específica que se promocionaba por medio de landing page o página de ventas externa que enlazaba con el checkout de la tienda directamente. Y para ese producto en concreto, no querían que apareciera nada más que pudiera distraer el proceso de la compra, simplemente la página de pago.

Si te encuentras en un caso parecido, puedes modificar la función anterior añadiendo un condicional para el producto o productos necesarios:


function ocultar_wc_add_to_cart_message( $message, $product_id ) {
if($product_id!=449) return $message;
else
return '';
};

add_filter( 'wc_add_to_cart_message', 'ocultar_wc_add_to_cart_message', 10, 2 );

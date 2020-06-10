$free = array();

foreach ( $rates as $rate_id => $rate ) {

if ( 'free_shipping' === $rate->method_id ) {

$free[ $rate_id ] = $rate;

break;

}

}

return ! empty( $free ) ? $free : $rates;

}

add_filter( 'woocommerce_package_rates', 'ocultar_otros_envios', 100 );

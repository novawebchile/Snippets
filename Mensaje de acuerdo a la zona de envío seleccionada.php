
//* Mensaje de acuerdo a la zona de envío seleccionada
add_action( 'woocommerce_cart_totals_after_shipping' , 'mostrar_mensaje_zona_envio' );
add_action( 'woocommerce_review_order_after_shipping' , 'mostrar_mensaje_zona_envio' );
function mostrar_mensaje_zona_envio() {
    $targeted_zones_names = array('Países Nórdicos'); //Zonas de envío configuradas
    // Zona de envío seleccionada por el usuario
    $chosen_methods    = WC()->session->get( 'chosen_shipping_methods' ); // Método de envío seleccionado
    $chosen_method     = explode(':', reset($chosen_methods) );
    $shipping_zone     = WC_Shipping_Zones::get_zone_by( 'instance_id', $chosen_method[1] );
    $current_zone_name = $shipping_zone->get_zone_name();
    $message = "El envío puede tardar 48h para esta zona";
    if( in_array( $current_zone_name, $targeted_zones_names ) ){
        echo '<tr class="msg-shipping">
            <td colspan="2" style="text-align:center"><strong>' . $message . '</strong></td>
        </tr>';
    }
}

//Finalizar los pedidos automáticamente y actualizar al estado de completado
Asegúrate de insertar el código en el archivo functions.php del tema activo en tu sitio web.

add_action( 'woocommerce_thankyou', 'wc_autocompletar_orden' );
function wc_autocompletar_orden( $order_id ) {
  global $woocommerce;
  if ( ! $order_id ) { return; }
  $order = new WC_Order( $order_id );
  $order->update_status( 'completed' );
}

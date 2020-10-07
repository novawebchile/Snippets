//Boton seguir comprando checkout woocommerce
add_action('woocommerce_cart_coupon', 'themeprefix_back_to_store');
function themeprefix_back_to_store() { ?>
<a class="button wc-backward" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>"><?php _e( 'Seguir comprando', 'woocommerce' ) ?></a>
<?php
}
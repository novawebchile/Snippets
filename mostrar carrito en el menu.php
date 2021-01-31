add_filter('wp_nav_menu_items','carrito_en_menu', 10, 2);

function carrito_en_menu($menu, $args) {

 if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'primary' !== $args->theme_location ) return $menu;
    
    ob_start();
    global $woocommerce;
    $viewing_cart = __('Ver tu carrito', 'your-theme-slug');
    $start_shopping = __('Empezar a comprar', 'your-theme-slug');
    $cart_url = $woocommerce->cart->get_cart_url();
   
    $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
    $cart_contents_count = $woocommerce->cart->cart_contents_count;
    $cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'your-theme-slug'), $cart_contents_count);
   
    $cart_total = $woocommerce->cart->get_cart_total();
    $menu_item="";
 
    if ( $cart_contents_count > 0 ) {
        if ($cart_contents_count == 0) {
            $menu_item = '<ul><li class="right"><a class="wcmenucart-contents" title="'. $start_shopping .'" href="'. $shop_page_url .'">';
        } else {
            $menu_item = '</a></li><li class="right"><a class="wcmenucart-contents" title="'. $viewing_cart .'" href="'. $cart_url .'">';
        }

    $menu_item .= '<i class="icon ion-android-cart"></i> '; // Podriamos utilizar la de Dashicons:<i class="dashicons dashicons-cart"></i>
    $menu_item .= $cart_contents.' - '. $cart_total;
    $menu_item .= '</a></li></ul>';
    }
 echo $menu_item;
 $social = ob_get_clean();
 return $menu . $social;

} 
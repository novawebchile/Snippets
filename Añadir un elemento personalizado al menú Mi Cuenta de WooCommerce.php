add_filter ( 'woocommerce_account_menu_items', 'dpw_more_link' );
function dpw_more_link( $menu_links ){


	$new = array( 'micuentamenu' => 'Nuevo enlace' );

        // Colocamos el nuevo elemento en la posición que nos interese (cambiando el 1 por el orden que queramos). 
	$menu_links = array_slice( $menu_links, 0, 1, true )
	+ $new
	+ array_slice( $menu_links, 1, NULL, true );

	return $menu_links;

}

add_filter( 'woocommerce_get_endpoint_url', 'dpw_hook_endpoint', 10, 4 );
function dpw_hook_endpoint( $url, $endpoint, $value, $permalink ){

	if( $endpoint === 'micuentamenu' ) {

		// enlace donde queremos que apunte el menú
		$url = 'http://';

	}
	return $url;

}
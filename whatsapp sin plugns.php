// [WhatsApp] Añade CTA flotante para activar conversación
if ( in_array( 'woocommerce/woocommerce.php', get_option( 'active_plugins' ) ) && version_compare( WC()->version , '3.0.0', '>' ) ){

	add_action( 'wp_head', 'include_fontawsome_brands_icons' );
	function include_fontawsome_brands_icons(){
		?>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/brands.css" integrity="sha384-BKw0P+CQz9xmby+uplDwp82Py8x1xtYPK3ORn/ZSoe6Dk3ETP59WCDnX+fI1XCKK" crossorigin="anonymous">
		<?php
	}

	add_action( 'wp_footer', 'add_whatsapp_sticky_cta' );
	function add_whatsapp_sticky_cta(){

		//Reemplaza el texto de ejemplo que hay entre comillas, por tu enlace de WhatsApp. ¡Siempre entre las comillas!
		$whatsapp_link = "https://api.whatsapp.com/send?phone=56936989790";

		//Esto evita que el CTA se muestre en páginas "no interesantes" de WooCommerce
		if ( !is_checkout() && !is_cart() && !is_account_page() ) {
			?>
			<a href="<?php echo $whatsapp_link; ?>" rel="nofollow" target="_blank" style="font-size:60px;color:#22BF4A;position:fixed;bottom:20px;right:28px;z-index:999;">
				<i class="fab fa-whatsapp" style="background-color: #fff;padding: 10px 14px;border-radius: 50px;"></i>
			</a>
			<?php
		}
	}
}

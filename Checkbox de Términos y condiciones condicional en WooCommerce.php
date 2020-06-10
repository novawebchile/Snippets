add_action( 'woocommerce_review_order_before_submit', 'checkout_checkbox_conditional' );


function checkout_checkbox_conditional() {

     $page_id = 57; // Página por defecto para términos y condiciones
     $notice = __( 'He leído y estoy de acuerdo con [additional-terms]', 'themedomain' );

 $product_id = 13; // ID de producto de ejemplo para el que mostramos otras condiciones
 $in_cart = false;

 foreach( WC()->cart->get_cart() as $cart_item ) {
    $product_in_cart = $cart_item['product_id'];
    if ( $product_in_cart === $product_id ) $in_cart = true;
 }

   if ( $in_cart ) $page_id = 61; //Página de terminos y condiciones para el producto específico

     if ( ! isset( $page_id ) || empty( $page_id ) ) {
     return NULL;
     }

     if ( FALSE !== strpos( $notice, '[additional-terms]' ) ) {

     $notice = str_replace( '[additional-terms]', '<a href="' . esc_url( get_permalink( $page_id ) ) . '" target="_blank"> ' . esc_html( get_the_title( $page_id ) ) . '</a>', $notice );

 } // End If Statement

     woocommerce_form_field( 'woo_additional_terms', array(
     'type'          => 'checkbox',
     'class'         => array( 'form-row woo-additional-terms' ),
     'label_class'   => array( 'woocommerce-form__label woocommerce-form__label-for-checkbox checkbox' ),
     'input_class'   => array( 'woocommerce-form__input woocommerce-form__input-checkbox input-checkbox' ),
     'required'      => TRUE,
     'label'         => wp_kses_post( $notice )
 ) );

    }

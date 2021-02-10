function my_checkout_value( $value, $input ) {
    if ( in_array( $input, array( 'billing_first_name', 'billing_address_1' ) ) ) {
        return false;
    }
    return $value;
}
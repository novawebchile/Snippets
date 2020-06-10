add_action( 'init', function() {
    register_post_status( 'wc-en-fabricacion', array(
        'label'                     => 'En fabricación',
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'En fabricación <span class="count">(%s)</span>', 'En fabricación <span class="count">(%s)</span>'),
    ) );
}, 10 );

add_filter ( 'wc_order_statuses', function( $estados ) {
    $estados['wc-en-fabricacion'] = 'En fabricación';
    return $estados;
}, 10, 1 );
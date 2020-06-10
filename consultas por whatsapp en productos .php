add_action( 'woocommerce_share', 'dcms_question_whatsapp' );

function dcms_question_whatsapp(){
	$phone = '34610123456';
	$message = 'Quiero información del producto: '.get_the_title().' ';
	$text = 'Preguntar por Whatsapp';
	$ico = '<img src="'.get_stylesheet_directory_uri().'/img/whatsapp.png" width=20 height=20 />';

	$url = 'https://api.whatsapp.com/send?phone='.$phone.'&amp;text='.str_replace(' ', '%20', $message);
	$link = '<a class="dc-link" href="'.$url.'" target="_blank">'.$ico. ' <span>'.$text.'</span></a>';

	echo '<div class="dc-whatsapp-container">'. $link. '</div>';
};

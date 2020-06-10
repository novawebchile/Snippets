<?php
//* NO incluyas la etiqueta de apertura
 
//* Reemplaza el texto de WooCommerce "Sin stock" por "Vendido"
add_filter('woocommerce_get_availability', 'availability_filter_func');
 
function availability_filter_func($availability)
{
	$availability['availability'] = str_ireplace('Sin stock', 'Vendido', $availability['availability']);
	return $availability;
}
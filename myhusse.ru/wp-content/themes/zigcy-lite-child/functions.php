<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
    
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);
function change_existing_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'RUB': $currency_symbol = 'руб.'; break;
     }
     return $currency_symbol;
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
 
function woo_remove_product_tabs( $tabs ) {
 
unset( $tabs['additional_information'] ); // Убираем вкладку "Свойства"
 
return $tabs;
 
}
add_filter('woocommerce_product_description_heading', 'my_product_description_heading',10,1);
function my_product_description_heading($description) {
    $description = '';
    return $description;
}
add_action( 'woocommerce_after_shop_loop_item_title', 'add_short_description', 9 );
function add_short_description() {
	echo ('<span class="short_descr">');
      echo  the_excerpt().'</span><br />';
}
// Display variation's price even if min and max prices are the same
add_filter('woocommerce_available_variation', function ($value, $object = null, $variation = null) {
  if ($value['price_html'] == '') {
    $value['price_html'] = '<span class="price">' . $variation->get_price_html() . '</span>';
  }
  return $value;
}, 10, 3);
add_action( 'wp_footer', 'cart_update_qty_script' );

function cart_update_qty_script() {
    if (is_cart()) :
    ?>
    <script>
        jQuery('div.woocommerce').on('change', '.qty', function(){
            jQuery("[name='update_cart']").removeAttr("disabled").trigger("click");
        });
    </script>
    <?php
    endif;
}
/*
 * Step 1. Add Link to My Account menu
 */
add_filter ( 'woocommerce_account_menu_items', 'misha_log_history_link', 40 );
function misha_log_history_link( $menu_links ){
 
	$menu_links = array_slice( $menu_links, 0, 2, true ) 
	+ array( 'edit-profile' => 'Редактировать профиль' )
	+ array_slice( $menu_links, 2, NULL, true );
 
	return $menu_links;
 
}
/*
 * Step 2. Register Permalink Endpoint
 */
add_action( 'init', 'misha_add_endpoint' );
function misha_add_endpoint() {
 
	// WP_Rewrite is my Achilles' heel, so please do not ask me for detailed explanation
	add_rewrite_endpoint( 'edit-profile', EP_PAGES );
 
}
/*
 * Step 3. Content for the new page in My Account, woocommerce_account_{ENDPOINT NAME}_endpoint
 */
add_action( 'woocommerce_account_edit-profile_endpoint', 'misha_my_account_endpoint_content' );
function misha_my_account_endpoint_content() {
 
	// of course you can print dynamic content here, one of the most useful functions here is get_current_user_id()
	echo do_shortcode( '[wppb-edit-profile form_name="оптовые-покупатели"]' );
 
}
/*
 * Step 4
 */
// Go to Settings > Permalinks and just push "Save Changes" button.
add_filter('woocommerce_sale_flash', 'my_custom_sale_flash', 10, 3);
function my_custom_sale_flash($text, $post, $_product) {
return '
<span class="onsale"><img src="http://myhusse.ru/wp-content/uploads/2019/07/fire.svg" alt="" width="25" height="25" class="alignnone size-thumbnail wp-image-1281"  role="img" /></span>
';
}
function get_user_role() {
  global $current_user;

  $user_roles = $current_user->roles;
  $user_role = array_shift($user_roles);

  return $user_role;
}
add_filter( 'woocommerce_before_shop_loop_item_title' , 'wishlist_catalog' );
function wishlist_catalog() {
  echo do_shortcode('[yith_wcwl_add_to_wishlist]');
}
function my_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );
function my_woocommerce_catalog_orderby( $orderby ) {
  unset($orderby["date"]);
  return $orderby;
}
add_filter( "woocommerce_catalog_orderby", "my_woocommerce_catalog_orderby", 20 );
add_filter('woocommerce_catalog_orderby', 'wc_customize_product_sorting');

function wc_customize_product_sorting($sorting_options){
    $sorting_options = array(
        'popularity' => __( 'Популярные', 'woocommerce' ),
        'date'       => __( 'Новинки', 'woocommerce' ),
        'price'      => __( 'Сначала дешевле', 'woocommerce' ),
        'price-desc' => __( 'Сначала дороже', 'woocommerce' ),
    );

    return $sorting_options;
}
?>

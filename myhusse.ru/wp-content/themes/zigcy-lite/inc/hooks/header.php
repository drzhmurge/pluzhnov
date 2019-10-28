<?php 

if ( !function_exists( 'zigcy_lite_top_left_header_callback' ) ) {

    function zigcy_lite_top_left_header_callback() {

        $zigcy_lite_top_header_text =  get_theme_mod('zigcy_lite_top_header_text');?>

        <div class = "store-mart-lite-top-header">
        	<?php 
         if ( $zigcy_lite_top_header_text ) {?>
         <div class = "top-header-left-text">
           <?php echo esc_html($zigcy_lite_top_header_text); ?>
       </div>
       <?php } ?>
   </div>
   <?php 
}
}
add_action( 'zigcy_lite_top_left_header','zigcy_lite_top_left_header_callback' );

/*******************************************************************************************************/

if ( !function_exists( 'zigcy_lite_top_right_header_callback' ) ) {

    function zigcy_lite_top_right_header_callback() {

        $zigcy_lite_call_title = get_theme_mod('zigcy_lite_call_title','Shop online or call');
        $zigcy_lite_contact_no = get_theme_mod('zigcy_lite_contact_no');
        $zigcy_lite_header = get_theme_mod('zigcy_lite_header_type','layout1');?>

        <div class = "store-mart-lite-top-header-left">
        	<?php if ($zigcy_lite_header == 'layout1'){ 
              if ( $zigcy_lite_call_title ) {?>
              <div class = "top-header-call-title">
                <?php echo esc_html($zigcy_lite_call_title); ?>
            </div>
            <?php } ?>

            <?php 
            if ( $zigcy_lite_contact_no ) {?>
            <div class = "top-header-contact-num">
                <i class="fa fa-phone"></i>
                <?php echo esc_html($zigcy_lite_contact_no); ?>
            </div>
            <?php } ?>
            <?php } ?>
            <div class="store-mart-lite-sc-icons">
              <?php do_action('zigcy_lite_social_icons'); ?>
          </div>
      </div>
      <?php 
  }
}
add_action( 'zigcy_lite_top_right_header','zigcy_lite_top_right_header_callback' );


/*******************************************************************************************************/

 /**
 * Site Logo
 */
 if ( !function_exists( 'zigcy_lite_header_logo_callback' ) ) {

    function zigcy_lite_header_logo_callback() {?>
    <div class="site-branding">
       <?php
       the_custom_logo();
       if ( is_front_page() && is_home() ) :
        ?>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php
    else :
        ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <?php
    endif;
    $zigcy_lite_description = get_bloginfo( 'description', 'display' );
    if ( $zigcy_lite_description || is_customize_preview() ) :
        ?>
        <p class="site-description"><?php echo $zigcy_lite_description; /* WPCS: xss ok. */ ?></p>
    <?php endif; ?>
</div><!-- .site-branding -->
<?php
}
}add_action( 'zigcy_lite_header_logo', 'zigcy_lite_header_logo_callback', 5 );


/*******************************************************************************************************/

/**
* Site Logo
*/
if( ! function_exists('zigcy_lite_main_navigation_callback') ){
  function zigcy_lite_main_navigation_callback(){
    ?>
    <nav id="site-navigation" class="main-navigation">
      <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button>
      <?php
      wp_nav_menu( array(
       'link_before'    => '<span>',
       'link_after'     => '</span>',
       'theme_location' => 'menu-1',
       'container_class'=> 'menu-primary-menu-container',
       'menu_id'        => 'primary-menu',
       'fallback_cb'    => 'false'

   ) );
   ?>
</nav><!-- #site-navigation -->

<?php
}
} add_action( 'zigcy_lite_main_navigation', 'zigcy_lite_main_navigation_callback', 10 );


/*******************************************************************************************************/
/**
* Display login/Signup on header 
*
*/
if( ! function_exists('zigcy_lite_login_signup') ){
    function zigcy_lite_login_signup(){
        if ( ! class_exists( 'WooCommerce' ) )
            return;
        $woo_acc =get_permalink( get_option('woocommerce_myaccount_page_id'));
        if( is_user_logged_in() ){ ?>
        <div class="lrm-login sm-icon-header">
           <a href="<?php echo esc_url($woo_acc); ?>">

             <i class="lrm-login" aria-hidden="true"></i>
             <ul class="profile-menu"><li><a href="#" class="lrm-show-if-logged-in">
                 <?php global $current_user;
  get_currentuserinfo();
  echo '<a href="http://myhusse.ru/my-account/">';
  echo $current_user->user_firstname . " " . $current_user->user_lastname . "</br>";
  echo "<span class='role_user " . get_user_role() . "'>" . "</span>";
  echo '</a>';
?>
		</a><ul class="dropdown">
        <a href="http://myhusse.ru/my-account/orders/"><li>Заказы</li></a>
        <a href="http://myhusse.ru/my-account/edit-profile"><li>Данные аккаунта</li></a>
		<a href="http://myhusse.ru/my-account/customer-logout/?_wpnonce=1dfdde2c7e"><li>Выйти</li></a>
      </ul></li></ul>
         </a>
     </div>
     <?php 
 }else{ ?>
 <div class="user-logout-wrap sm-icon-header">
      <a href="<?php echo esc_url($woo_acc); ?>">
       
     <i class="lrm-login lnr lnr-user" aria-hidden="true"></i>
     <span class="lrm-login">
         <?php esc_html_e('Вход/Регистрация','zigcy-lite'); ?>
     </span>
 </a>
</div>
<?php
}
}
}
/*******************************************************************************************************/
/**
 * Add browse Product categories in header
**/
add_action('zigcy_lite_product_cat_menu','zigcy_lite_add_browse_categories_nav_menu_items');
if ( ! function_exists( 'zigcy_lite_add_browse_categories_nav_menu_items' ) ) {
    function zigcy_lite_add_browse_categories_nav_menu_items() {

     if ( ! class_exists( 'WooCommerce' ) )
        return;

    $product_categories = get_terms( 'product_cat');
    $count = count($product_categories);                
    ?>
    <div class="browse-category-wrap">
        <div class="browse-category">
            <i class="lnr lnr-menu"></i>
            <?php esc_html_e('Каталог','zigcy-lite'); ?>
        </div>
        <div class="categorylist">
           <ul>
            <div class="sidebar"><div id="left">
            <nav id="menuVertical">
			<ul>
				<li><a href="http://myhusse.ru/product-category/dogs"><img src="http://myhusse.ru/wp-content/uploads/2019/08/husse-dog-food-sample-2.jpg"><span>Для собак</span></a>
					<ul>
						<li><a href="http://myhusse.ru/product-category/dogs/food/dry-food-dogs">Сухие корма</a></li>
						<li><a href="http://myhusse.ru/product-category/dogs/food/canned-food-dogs">Консервы</a></li>
						<li><a href="http://myhusse.ru/product-category/dogs/dobavki-dogs">Пищевые добавки</a></li>
						<li><a href="http://myhusse.ru/product-category/dogs/hygiene-dogs">Гигиена</a></li>
					</ul>
				</li>
				<li><a href="http://myhusse.ru/product-category/cats"><img src="http://myhusse.ru/wp-content/uploads/2019/08/husse-cat-food-sample-2.jpg"><span>Для кошек</span></a>
					<ul>
						<li><a href="http://myhusse.ru/product-category/cats/food/dry-food-cats">Сухие корма</a></li>
            <li><a href="http://myhusse.ru/product-category/cats/food/canned-food-cats">Консервы</a></li>
            <li><a href="http://myhusse.ru/product-category/cats/dobavki-cats/">Пищевые добавки</a></li>
						<li><a href="http://myhusse.ru/product-category/cats/hygiene-cats">Гигиена</a></li>
					</ul>
				</li>
				<li><a href="http://myhusse.ru/shop/?swoof=1&onsales=salesonly"><img src="http://myhusse.ru/wp-content/uploads/2019/06/discount.svg"><span>Акции и скидки</span></a></li>
			</ul>
		</nav><!--menuVertical-->
	</div><!--left--></div>

            </ul>
        </div>
    </div>
    <?php
}
}

/*******************************************************************************************************/

/**
* Display cart icon
*/ 
if(! function_exists('zigcy_lite_woo_cart_icon') ){
    function zigcy_lite_woo_cart_icon(){

        $zigcy_lite_cart_enable = get_theme_mod('zigcy_lite_cart_enable','off');

        if( ! $zigcy_lite_cart_enable == 'off' || ! class_exists( 'WooCommerce' ) )
            return;

        if ( function_exists( 'zigcy_lite_woocommerce_header_cart' ) ) {
            ?>
            <div class="cart-icon-wrap">
                <?php zigcy_lite_woocommerce_header_cart(); ?>
            </div>
            <?php
        }

    }
}

/*******************************************************************************************************/

/**
* Search Icon
*/
if( ! function_exists('zigcy_lite_header_search_icon') ){
    function zigcy_lite_header_search_icon(){
        ?>
        <div class="sml-search-icon-wrap">
            <span class="sml-search-icon">
                <i class="lnr lnr-magnifier" aria-hidden="true"></i>
            </span>
            <div class="search-outer">
                <div class="search-form-wrap">
                    <h3 class="search-label"><?php esc_html_e('Search','zigcy-lite'); ?></h3>
                    <?php get_search_form(); ?>
                    <a href="javascript:void(0)" class="btn-hide">
                        <i class="lnr lnr-cross"></i>
                    </a>
                </div>
                <div class="search-content"></div>
            </div>
        </div>
        <?php 
    }
}

/**
* Mobile navigation menu
*/

add_action('zigcy_lite_mob_nav','zigcy_lite_mob_nav');
if( ! function_exists('zigcy_lite_mob_nav')){
    function zigcy_lite_mob_nav(){
    ?>
    <div class="mob-nav-wrapper">
        <div class="mob-hiriz-wrapp">
            <div class="menu-toggle">
                <span class="lnr lnr-menu"></span>
            </div>
            <?php zigcy_lite_mob_nav_logo(); ?>
            <div class="user-logout-wrap sm-icon-header"> <a href="http://myhusse.ru/my-account/"> 
            <i class="lrm-login lnr lnr-user" aria-hidden="true"></i> 
            <span class="lrm-login"> Вход/Регистрация </span> </a></div>
            <div class="sm-wishlist-wrap sm-icon-header"> <a href="http://myhusse.ru/wishlist" title="Избранное" class="sm-wishlist-ct-class"> <i class="lnr lnr-heart" aria-hidden="true"></i> <span class="wishlist-counter"> 0 </span> </a><div id="sm-wishlist-loader" style="display:none;"> <noscript><img src="http://myhusse.ru/wp-content/themes/zigcy-lite/assets/images/spinner.gif" alt="Главная"></noscript><img class="lazyload" src="data:image/svg+xml,%3Csvg%20xmlns=%22http://www.w3.org/2000/svg%22%20viewBox=%220%200%20%20%22%3E%3C/svg%3E" data-src="http://myhusse.ru/wp-content/themes/zigcy-lite/assets/images/spinner.gif" alt="Главная"></div><div class="wishlist-dropdown product_list_widget"><p class="empty">Пока нет товаров в избранном</p></div></div>
            <?php if(class_exists('WooCommerce')){
                zigcy_lite_woocommerce_header_cart();
            } ?>
        </div>
        <div class="mob-side-nav-wrapp">
            <div class="top-close-wrapp">
                <?php zigcy_lite_mob_nav_logo(); ?>
                <div class="mob-nav-close"><span class="lnr lnr-cross"></span></div>
            </div>
            <div class="search-wrapp">
                <?php get_search_form(); ?>
            </div>
            <div class="menu-wrapp-outer">
                <?php 
                wp_nav_menu( array(
                    'link_before'    => '<span>',
                    'link_after'     => '</span>',
                    'theme_location' => 'menu-1',
                    'container_class'=> 'menu-primary-menu-container',
                    'menu_id'        => 'primary-menu',
                    'fallback_cb'    => 'false'

                ) );
                 ?>
            </div>
        </div>
    </div>
    <div class="browse-category-wrap mobile">
        <div class="browse-category">
            <i class="lnr lnr-menu"></i>
            Каталог        </div>
        <div class="categorylist">
           <ul>
            <div class="sidebar"><div id="left">
            <nav id="menuVertical">
			<ul>
				<li><a href="http://myhusse.ru/product-category/dogs"><picture><source srcset="http://myhusse.ru/wp-content/webp-express/webp-images/doc-root/wp-content/uploads/2019/08/husse-dog-food-sample-2.jpg.webp" type="image/webp"><img src="http://myhusse.ru/wp-content/uploads/2019/08/husse-dog-food-sample-2.jpg" class="webpexpress-processed"></picture><span>Для собак</span></a>
					<ul>
						<li><a href="http://myhusse.ru/product-category/dogs/food/dry-food-dogs">Сухие корма</a></li>
						<li><a href="http://myhusse.ru/product-category/dogs/food/canned-food-dogs">Консервы</a></li>
						<li><a href="http://myhusse.ru/product-category/dogs/dobavki-dogs">Пищевые добавки</a></li>
						<li><a href="http://myhusse.ru/product-category/dogs/hygiene-dogs">Гигиена</a></li>
					</ul>
				</li>
				<li><a href="http://myhusse.ru/product-category/cats"><picture><source srcset="http://myhusse.ru/wp-content/webp-express/webp-images/doc-root/wp-content/uploads/2019/08/husse-cat-food-sample-2.jpg.webp" type="image/webp"><img src="http://myhusse.ru/wp-content/uploads/2019/08/husse-cat-food-sample-2.jpg" class="webpexpress-processed"></picture><span>Для кошек</span></a>
					<ul>
						<li><a href="http://myhusse.ru/product-category/cats/food/dry-food-cats">Сухие корма</a></li>
            <li><a href="http://myhusse.ru/product-category/cats/food/canned-food-cats">Консервы</a></li>
            <li><a href="http://myhusse.ru/product-category/cats/dobavki-cats/">Пищевые добавки</a></li>
						<li><a href="http://myhusse.ru/product-category/cats/hygiene-cats">Гигиена</a></li>
					</ul>
				</li>
				<li><a href="http://myhusse.ru/shop/?swoof=1&amp;onsales=salesonly"><img src="http://myhusse.ru/wp-content/uploads/2019/06/discount.svg"><span>Акции и скидки</span></a></li>
			</ul>
		</nav><!--menuVertical-->
	</div><!--left--></div>

            </ul>
        </div>
    </div>
<?php 
    }
}

if( ! function_exists('zigcy_lite_mob_nav_logo') ){
    function zigcy_lite_mob_nav_logo(){
        $zigcy_lite_mobile_header_logo = get_theme_mod('zigcy_lite_mobile_header_logo');
        $image_id   = get_post_thumbnail_id();
        $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
        $image_alt  = get_post_meta( $image_id, '_wp_attachment_image_alt', true );

        if( $zigcy_lite_mobile_header_logo ){ ?>
        <a href="<?php echo esc_url(home_url('/'));?>">
            <img src="<?php echo esc_url($zigcy_lite_mobile_header_logo); ?>" alt="<?php echo esc_attr($alt);?>" >
        </a>
        <?php
    }else{
        the_custom_logo();
    }
}
}

/**
* Mobile View Logo
*
*/
 if ( !function_exists( 'zigcy_header_logo_mob' ) ) {

    function zigcy_header_logo_mob() {
        global $zigcy_options;
        
        $header_logo        = get_theme_mod('custom_logo');
        $header_logo_mob    = get_theme_mod('zigcy_lite_mob_nav_logo');

        $logo_url = $header_logo;

        if( $header_logo_mob ){
            $logo_url = $header_logo_mob;
        }
        echo '<div class="site-logo-wrapp">';
        
        if ( !empty( $logo_url ) ) { ?>

            <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>">

        <?php
        } else {
            ?>
            
                <?php if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                <?php else : ?>
                    <p class="site-title"><?php bloginfo( 'name' ); ?></p>
                <?php
                endif;

                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) :
                    ?>
                    <p class="site-description"><?php echo esc_html( $description ); ?></p>
                    <?php
                endif;
                ?>
            
            <?php
        }
        echo '</div>';
    }

}
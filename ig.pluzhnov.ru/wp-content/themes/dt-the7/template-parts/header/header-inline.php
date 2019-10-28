<?php
/**
 * Inline header.
 *
 * @since   3.0.0
 * @package The7/Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div <?php presscore_header_class( 'masthead inline-header' ); ?> <?php presscore_header_inline_style(); ?> role="banner">

	<?php presscore_get_template_part( 'theme', 'header/top-bar' ); ?>

	<header class="header-bar">

		<?php presscore_get_template_part( 'theme', 'header/branding' ); ?>

		<?php presscore_get_template_part( 'theme', 'header/primary-menu' ); ?>

		<?php presscore_render_header_elements( 'near_menu_right' ); ?>
		<?php
global $current_user;
	if ( is_user_logged_in() ) {
		get_currentuserinfo();
		echo '<ul class="profile-menu"><li><a href="/my-account/" class="lrm-show-if-logged-in">';
		echo $current_user->user_firstname . " " . $current_user->user_lastname . "</br>";
		echo '</a><ul class="dropdown"><a href="/orders/"><li>Заказы</li></a><a href="/edit-profile"><li>Данные аккаунта</li></a><a href=""><li>Выйти</li></a></ul></li></ul>';
	}
	else {
		echo '<a href="" class="lrm-login lrm-register lrm-hide-if-logged-in">Войти</a>';
	}

  
    ?>

	</header>

</div>

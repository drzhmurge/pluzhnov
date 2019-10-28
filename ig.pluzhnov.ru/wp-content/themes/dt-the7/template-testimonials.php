<?php
/**
 * Template Name: Testimonials
 *
 * Testimonials template.
 *
 * @since   1.0.0
 *
 * @package The7\Templates
 */

defined( 'ABSPATH' ) || exit;

$config = presscore_config();
$config->set( 'template', 'testimonials' );
$config->set( 'template.layout.type', 'masonry' );

add_action( 'presscore_before_main_container', 'presscore_page_content_controller', 15 );

get_header();

if ( presscore_is_content_visible() ) : ?>

	<!-- Content -->
	<div id="content" class="content" role="main">
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "8091",
  CURLOPT_URL => "http://82.202.226.91:8091/recording/api.php?action=get-table",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "OFFICE=1&DATE=15.10.2019",
  CURLOPT_HTTPHEADER => array(
    "Accept: */*",
    "Accept-Encoding: gzip, deflate",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Content-Length: 24",
    "Content-Type: application/x-www-form-urlencoded",
    "Cookie: PHPSESSID=fba5bca0f0971a8bcb9b344649060c35",
    "Host: 82.202.226.91:8091",
    "cache-control: no-cache",
    "x-api-key: theartofharmony"
  ),
));

$response = curl_exec($curl);
$obj = json_decode($response, true);

curl_close($curl);

print_r($obj);

?>	

	</div><!-- #content -->

	<?php do_action( 'presscore_after_content' );

endif;

get_footer(); ?>

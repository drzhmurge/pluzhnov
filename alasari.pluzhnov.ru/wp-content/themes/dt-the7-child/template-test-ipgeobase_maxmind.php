<?php
use GeoIp2\WebService\Client;

/*
*	Template Name: Тестирование сервисов IpGeoBase и MaxMind
*/

get_header();
wp_enqueue_script('wt-cookie');
?>
    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <div>
                    <h1>Пример прямого обращения к сервисам геолокации</h1>

                    <h2>WtGeolocation() - IpGeoBase</h2>
                    <?php
                    $geo = new WtGeolocation(array(
                        'base_name' => 'ipgeobase_service'
                    ));
                    $geo->cookie = false;
                    $geo->reloadData();
                    $data = $geo->getData();
                    var_dump($data);
                    ?>

                    <h2>WtGeolocation() - MaxMind</h2>
                    <?php
                    $geo = new WtGeolocation(array(
                        'base_name' => 'maxmind_service',
                        'maxmind_user_id' => 000000,
                        'maxmind_license_key' => 'license_key',
                        'maxmind_language' => array('ru')
                    ));
                    $geo->cookie = false;
                    $geo->reloadData();
                    $data = $geo->getData();
                    var_dump($data);
                    ?>
                </div>
            </main>
            <!-- #main -->
        </div>
        <!-- #primary -->
    </div><!-- .wrap -->

<?php get_footer();
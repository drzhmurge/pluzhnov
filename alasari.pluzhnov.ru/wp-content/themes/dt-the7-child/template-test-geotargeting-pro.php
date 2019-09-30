<?php
use GeoIp2\WebService\Client;

/*
*	Template Name: Тестирование плагина WT Geotargeting Pro
*/

get_header();
wp_enqueue_script('wt-cookie');
?>
    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <div>
                    <h1>Пример работы c шорткодом [wt_geotargeting]</h1>
                    Контент для региона:<br>
                    <?php echo do_shortcode('
        [wt_geotargeting type="region" region_show="Самарская область"]Самарская область[/wt_geotargeting]
        [wt_geotargeting type="region" region_show="Московская область"]Московская область[/wt_geotargeting]
        [wt_geotargeting type="region" region_show="Нижегородская область"]Нижегородская область[/wt_geotargeting]
        [wt_geotargeting type="region" region_show="Липецкая область"]Липецкая область[/wt_geotargeting]
        [wt_geotargeting type="region" default=true]По умолчанию[/wt_geotargeting]
    '); ?><br><br>


                    Контент для страны:<br>
                    <?php echo do_shortcode('
        [wt_geotargeting type="country" country_show="RU"]Россия[/wt_geotargeting]
        [wt_geotargeting type="country" country_show="UA"]Украина[/wt_geotargeting]
        [wt_geotargeting type="country" country_show="BY"]Беларусь[/wt_geotargeting]
        [wt_geotargeting type="country" country_show="IT"]Италия[/wt_geotargeting]
        [wt_geotargeting type="country" default=true]По умолчанию[/wt_geotargeting]
    '); ?><br><br>

                    Вывод информации о местоположении посетителя:
                    IP: <?php echo do_shortcode('[wt_geotargeting get="ip"]'); ?><br>
                    Страна: <?php echo do_shortcode('[wt_geotargeting get="country"]'); ?><br>
                    Город: <?php echo do_shortcode('[wt_geotargeting get="city"]'); ?><br>
                    Регион: <?php echo do_shortcode('[wt_geotargeting get="region"]'); ?><br>
                    Округ: <?php echo do_shortcode('[wt_geotargeting get="district"]'); ?><br>
                    Широта (Latitude): <?php echo do_shortcode('[wt_geotargeting get="lat"]'); ?><br>
                    Долгота (Longitude): <?php echo do_shortcode('[wt_geotargeting get="lng"]'); ?><br>
                </div>
                <div>
                    <h1>Пример смены региона</h1>

                    <h2>C помощью Java Script</h2>
                    <a onclick="WtLocation.setCity('Самара', 'reload');">Выбрать город Самара и перезагрузить
                        страницу</a><br>
                    <a onclick="WtLocation.setRegion('Самарская область', 'reload');">Выбрать Самарскую область и
                        перезагрузить страницу</a><br>
                    <a onclick="WtLocation.setCity('Москва', 'reload');">Выбрать город Москва и перезагрузить
                        страницу</a><br>
                    <a onclick="WtLocation.setValues({'city': 'Самара', 'region': 'Самарская область', 'country': 'RU'}, 'reload');">
                        Выбрать город Самара с учетом Самарской области, страны Россия, и перезагрузить страницу</a><br>
                    <a onclick="WtLocation.setValues({'region': 'Московская область', 'country': 'RU'}, 'reload');">
                        Выбрать Московскую область, страну Россия, и перезагрузить страницу</a><br>

                    <h2>C помощью GET-переменных</h2>
                    <a href="/?wt_region_by_default=Приморский+край">Владивосток</a>,
                    <a href="/?wt_city_by_default=Москва">Москва</a>,
                    <a href="/?wt_region_by_default=Самарская+область">Тольятти</a>,
                    <a href="/?wt_geo_clean=1">Очистка</a>
                </div>
                <div>
                    <h1>Пример работы c контактами, привязанными к региону</h1>
                    <b>PHP:</b><br>
                    Текущий регион: <?php echo WT::$obj->contacts->getValue('region'); ?><br>
                    Телефон: <?php echo WT::$obj->contacts->getValue('phone'); ?><br>
                    Адрес: <?php echo WT::$obj->contacts->getValue('address'); ?><br>
                    Email: <?php echo WT::$obj->contacts->getValue('email'); ?><br>
                    Регион по умолчанию: <?php echo WT::$obj->contacts->getRegionDefaultName(); ?><br>
                    Количество регионов по умолчанию: <?php echo WT::$obj->contacts->getRegionsDefaultCount(); ?><br>
                    Получить из добавленных регионов город
                    Тольятти: <?php var_dump(WT::$obj->contacts->getRegion('Тольятти', array('type' => 'city'))); ?><br>
                    Получить из добавленных регионов страну Россия по коду ISO(Альфа-2):
                    <?php var_dump(WT::$obj->contacts->getCountry(null, array('iso' => 'RU'))); ?><br>
                    Проверить наличие региона:
                    <?php
                    $check_region = WT::$obj->contacts->checkRegion('Тольятти', array('type' => 'city'));
                    if ($check_region) echo 'есть';
                    else echo 'нет';
                    ?><br>


                    <br><br><b>Пример работы c шорткодом [wt_contacts]:</b><br>
                    Текущий регион: <?php echo do_shortcode('[wt_contacts get="region"]'); ?><br>
                    <?php echo do_shortcode('[wt_contacts get="phone"]Телефон: {return}<br>[/wt_contacts]'); ?>
                    <?php echo do_shortcode('[wt_contacts get="phone-2"]Еще телефон: {return}<br>[/wt_contacts]'); ?>
                    Адрес: <?php echo do_shortcode('[wt_contacts get="address"][/wt_contacts]'); ?><br>
                    Email: <?php echo do_shortcode('[wt_contacts get="email"][/wt_contacts]'); ?><br>
                </div>
            </main>
            <!-- #main -->
        </div>
        <!-- #primary -->
    </div><!-- .wrap -->

<?php get_footer();
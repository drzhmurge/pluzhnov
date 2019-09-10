<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'pluzhnov' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'drzhmurge' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'EpiphoneG310' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '^wKIk|CkcdXA09401t5P5ySIgVa5L{S:$HoY]>zp.OCTH7;>2VzHLAE0wNoU3VM>' );
define( 'SECURE_AUTH_KEY',  '[VAI>z/(1fSn_rL=])n-~M9d%:eHKyQGKjsexNQ?S<]DB@jRsN^9xAhA%j5mgf,C' );
define( 'LOGGED_IN_KEY',    '~|t1G13m N>@_(i4`D)Fj0~pO zdt9f.v? XblXT:t]]&Hgz]=!*an6YxYPoOWTv' );
define( 'NONCE_KEY',        'EeTjlyC5??Hnq;S/+zdwx+~q)cdXV_1!*>Hfd@vZ;S?g_/JHOz(s6w=1)!]Nl< )' );
define( 'AUTH_SALT',        'tyOLz7c4pIAk3rs^lC_C)eo4{4x| ]!5js14P/8TfKJ1Ov2h`(~v1un*Pcb_>Q2)' );
define( 'SECURE_AUTH_SALT', 'Q[^@R}o>erAP=SY2%o;!lRW#*Mt2{#EYN?HwP5hhsyN6QJ4kb1>MJU58/dH!KdhI' );
define( 'LOGGED_IN_SALT',   'ptxYVwhpVHGe/8L}anBfKv+@EcvQR_kC>tb}g;R(R2Da<_)%vQB{>SUw>PEbZH%D' );
define( 'NONCE_SALT',       '>9%f+ByWa8fUH)n#hA#VSia3XU,oY+)@ZJM[kY18rOrz,w,TJ<,)SQ(|DwJiKR>y' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );

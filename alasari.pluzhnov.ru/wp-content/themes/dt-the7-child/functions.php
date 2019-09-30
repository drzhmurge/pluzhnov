<?php
// Bootstrap Modal
wp_register_style(
    'bootstrap-modal',
    get_stylesheet_directory_uri().'/libs/bootstrap-parts/modal.css',
    array(),
    '3.3.7');
wp_register_script(
    'bootstrap-modal',
    get_stylesheet_directory_uri().'/libs/bootstrap-parts/modal.js',
    array('jquery'),
    '3.3.7');
// Bootstrap Tooltip
wp_register_script(
    'bootstrap-tooltip',
    get_stylesheet_directory_uri().'/libs/bootstrap-parts/tooltip.js',
    array('jquery'),
    '3.3.7');
// Bootstrap PopOver
wp_register_style(
    'bootstrap-popover',
    get_stylesheet_directory_uri().'/libs/bootstrap-parts/popover.css',
    array(),
    '3.3.7');
wp_register_script(
    'bootstrap-popover',
    get_stylesheet_directory_uri().'/libs/bootstrap-parts/popover.js',
    array('jquery', 'bootstrap-tooltip'),
    '3.3.7');
wp_enqueue_style('bootstrap-modal');
wp_enqueue_script('bootstrap-modal');
wp_enqueue_script('bootstrap-tooltip');
wp_enqueue_style('bootstrap-popover');
wp_enqueue_script('bootstrap-popover');
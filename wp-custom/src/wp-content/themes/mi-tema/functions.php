<?php
/**
 * Funciones del tema personalizado CI/CD
 */

function mi_tema_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'mi_tema_setup');

function mi_tema_scripts()
{
    wp_enqueue_style('mi-tema-style', get_stylesheet_uri(), array(), '3.0');
}
add_action('wp_enqueue_scripts', 'mi_tema_scripts');

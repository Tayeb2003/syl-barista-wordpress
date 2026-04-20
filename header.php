<?php
/**
 * Theme header.
 *
 * @package SylBarista
 */

if (!defined('ABSPATH')) {
    exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo esc_attr(get_bloginfo('description')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#content"><?php esc_html_e('Skip to content', 'syl-barista'); ?></a>
<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
            <span class="logo-top">Syl</span>
            <span class="logo-bottom">Barista</span>
        </a>
        <nav class="primary-nav" aria-label="<?php esc_attr_e('Primary navigation', 'syl-barista'); ?>">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'fallback_cb'    => false,
                    'menu_class'     => 'menu-list',
                )
            );
            ?>
        </nav>
        <a class="btn btn-small" href="#reservations"><?php esc_html_e('Reserve', 'syl-barista'); ?></a>
    </div>
</header>
<main id="content" class="site-content">

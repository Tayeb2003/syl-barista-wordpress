<?php
/**
 * Local business schema output.
 *
 * @package SylBarista
 */

if (!defined('ABSPATH')) {
    exit;
}

function syl_barista_output_local_business_schema(): void
{
    if (!is_front_page()) {
        return;
    }

    $name    = get_bloginfo('name') ?: 'Syl Barista';
    $phone   = syl_barista_get_business('phone', '+0000000000');
    $address = syl_barista_get_business('address', 'Add address in customizer');
    $map     = syl_barista_get_business('map', home_url('/'));

    $schema = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'CafeOrCoffeeShop',
        'name'        => $name,
        'telephone'   => $phone,
        'address'     => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => $address,
            'addressLocality' => 'City',
            'addressCountry'  => 'Country',
        ),
        'url'         => home_url('/'),
        'hasMap'      => $map,
        'priceRange'  => '$$',
        'servesCuisine' => 'Coffee',
    );

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>';
}
add_action('wp_head', 'syl_barista_output_local_business_schema', 40);

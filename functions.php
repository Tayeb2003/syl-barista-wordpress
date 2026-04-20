<?php
/**
 * Syl Barista Theme functions.
 *
 * @package SylBarista
 */

if (!defined('ABSPATH')) {
    exit;
}

define('SYL_BARISTA_VERSION', '1.0.0');

require_once get_template_directory() . '/inc/schema.php';

function syl_barista_setup(): void
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('editor-styles');
    add_theme_support('responsive-embeds');
    add_editor_style('style.css');

    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'syl-barista'),
        )
    );

    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
}
add_action('after_setup_theme', 'syl_barista_setup');

function syl_barista_enqueue_assets(): void
{
    wp_enqueue_style(
        'syl-barista-fonts',
        'https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700&family=Playfair+Display:wght@700&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'syl-barista-style',
        get_stylesheet_uri(),
        array('syl-barista-fonts'),
        SYL_BARISTA_VERSION
    );

    wp_enqueue_script(
        'syl-barista-theme',
        get_template_directory_uri() . '/js/theme.js',
        array(),
        SYL_BARISTA_VERSION,
        true
    );

}
add_action('wp_enqueue_scripts', 'syl_barista_enqueue_assets');

function syl_barista_customize_register(WP_Customize_Manager $wp_customize): void
{
    $wp_customize->add_section(
        'syl_barista_business',
        array(
            'title'    => __('Business Details', 'syl-barista'),
            'priority' => 35,
        )
    );

    $fields = array(
        'phone' => __('Phone Number', 'syl-barista'),
        'whatsapp' => __('WhatsApp Link', 'syl-barista'),
        'reservation_email' => __('Reservation Email', 'syl-barista'),
        'address' => __('Street Address', 'syl-barista'),
        'hours' => __('Opening Hours', 'syl-barista'),
        'map' => __('Google Map Link', 'syl-barista'),
    );

    $sanitize_map = array(
        'phone' => 'sanitize_text_field',
        'whatsapp' => 'esc_url_raw',
        'reservation_email' => 'sanitize_email',
        'address' => 'sanitize_text_field',
        'hours' => 'sanitize_text_field',
        'map' => 'esc_url_raw',
    );

    foreach ($fields as $key => $label) {
        $setting_id = 'syl_barista_' . $key;
        $wp_customize->add_setting(
            $setting_id,
            array(
                'default'           => '',
                'sanitize_callback' => $sanitize_map[$key] ?? 'sanitize_text_field',
            )
        );
        $wp_customize->add_control(
            $setting_id,
            array(
                'label'   => $label,
                'section' => 'syl_barista_business',
                'type'    => 'text',
            )
        );
    }
}
add_action('customize_register', 'syl_barista_customize_register');

function syl_barista_get_business(string $field, string $fallback = ''): string
{
    $value = get_theme_mod('syl_barista_' . $field, '');
    return $value !== '' ? (string) $value : $fallback;
}

function syl_barista_reservation_form_shortcode(): string
{
    $feedback = '';
    if (
        isset($_POST['syl_barista_reserve_nonce']) &&
        wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['syl_barista_reserve_nonce'])), 'syl_barista_reserve')
    ) {
        $name    = sanitize_text_field((string) wp_unslash($_POST['guest_name'] ?? ''));
        $email   = sanitize_email((string) wp_unslash($_POST['guest_email'] ?? ''));
        $date    = sanitize_text_field((string) wp_unslash($_POST['reserve_date'] ?? ''));
        $message = sanitize_textarea_field((string) wp_unslash($_POST['reserve_note'] ?? ''));

        if ($name && $email && $date) {
            $to      = syl_barista_get_business('reservation_email', get_option('admin_email'));
            $subject = sprintf(__('New reservation request from %s', 'syl-barista'), $name);
            $body    = "Name: {$name}\nEmail: {$email}\nDate: {$date}\n\nMessage:\n{$message}";
            $headers = array('Content-Type: text/plain; charset=UTF-8');
            wp_mail($to, $subject, $body, $headers);
            $feedback = '<p class="form-success">' . esc_html__('Reservation request sent. We will confirm shortly.', 'syl-barista') . '</p>';
        } else {
            $feedback = '<p class="form-error">' . esc_html__('Please complete required fields.', 'syl-barista') . '</p>';
        }
    }

    ob_start();
    ?>
    <form class="syl-form" method="post" action="">
        <?php echo wp_kses_post($feedback); ?>
        <label>
            <?php esc_html_e('Name *', 'syl-barista'); ?>
            <input type="text" name="guest_name" required>
        </label>
        <label>
            <?php esc_html_e('Email *', 'syl-barista'); ?>
            <input type="email" name="guest_email" required>
        </label>
        <label>
            <?php esc_html_e('Preferred Date & Time *', 'syl-barista'); ?>
            <input type="text" name="reserve_date" placeholder="YYYY-MM-DD HH:MM" required>
        </label>
        <label>
            <?php esc_html_e('Message', 'syl-barista'); ?>
            <textarea name="reserve_note" rows="4"></textarea>
        </label>
        <?php wp_nonce_field('syl_barista_reserve', 'syl_barista_reserve_nonce'); ?>
        <button type="submit"><?php esc_html_e('Send Reservation Request', 'syl-barista'); ?></button>
    </form>
    <?php
    return (string) ob_get_clean();
}
add_shortcode('syl_barista_reservation_form', 'syl_barista_reservation_form_shortcode');

function syl_barista_register_block_patterns(): void
{
    if (!function_exists('register_block_pattern')) {
        return;
    }

    register_block_pattern_category(
        'syl-barista',
        array('label' => __('Syl Barista', 'syl-barista'))
    );

    register_block_pattern(
        'syl-barista/reservation-cta',
        array(
            'title'      => __('Reservation CTA', 'syl-barista'),
            'categories' => array('syl-barista'),
            'content'    => '<!-- wp:group {"className":"section section-soft"} --><div class="wp-block-group section section-soft"><!-- wp:heading {"level":2} --><h2>Reserve your table</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Book your Syl Barista experience with one click.</p><!-- /wp:paragraph --><!-- wp:buttons --><div class="wp-block-buttons"><!-- wp:button {"className":"btn"} --><div class="wp-block-button btn"><a class="wp-block-button__link wp-element-button" href="#reservations">Reserve</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div><!-- /wp:group -->',
        )
    );
}
add_action('init', 'syl_barista_register_block_patterns');

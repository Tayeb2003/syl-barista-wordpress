<?php
/**
 * Template Name: Reservations
 *
 * @package SylBarista
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$phone    = syl_barista_get_business('phone', '+000 000 0000');
$whatsapp = syl_barista_get_business('whatsapp', '#');
?>
<section class="section">
    <div class="container split">
        <div>
            <p class="eyebrow">Reservations</p>
            <h1><?php the_title(); ?></h1>
            <p><?php esc_html_e('Reserve your table for curated tasting, client meetings, or private moments.', 'syl-barista'); ?></p>
            <ul class="quick-links">
                <li><a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>"><?php esc_html_e('Call Now', 'syl-barista'); ?></a></li>
                <li><a href="<?php echo esc_url($whatsapp); ?>" target="_blank" rel="noopener"><?php esc_html_e('WhatsApp', 'syl-barista'); ?></a></li>
            </ul>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>
        </div>
        <div>
            <?php echo do_shortcode('[syl_barista_reservation_form]'); ?>
        </div>
    </div>
</section>
<?php
get_footer();

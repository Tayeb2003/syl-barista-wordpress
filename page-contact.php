<?php
/**
 * Template Name: Contact
 *
 * @package SylBarista
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$phone   = syl_barista_get_business('phone', '+000 000 0000');
$address = syl_barista_get_business('address', 'Set address in customizer');
$map     = syl_barista_get_business('map', '#');
$hours   = syl_barista_get_business('hours', 'Set opening hours in customizer');
?>
<section class="section">
    <div class="container split">
        <div class="card">
            <p class="eyebrow">Contact</p>
            <h1><?php the_title(); ?></h1>
            <p><?php echo esc_html($address); ?></p>
            <p><?php echo esc_html($hours); ?></p>
            <p><a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a></p>
            <a class="btn btn-ghost" href="<?php echo esc_url($map); ?>" target="_blank" rel="noopener"><?php esc_html_e('Open in Google Maps', 'syl-barista'); ?></a>
        </div>
        <div>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>
<?php
get_footer();

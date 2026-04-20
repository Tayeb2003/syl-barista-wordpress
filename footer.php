<?php
/**
 * Theme footer.
 *
 * @package SylBarista
 */

if (!defined('ABSPATH')) {
    exit;
}

$phone = syl_barista_get_business('phone', '+000 000 0000');
$map   = syl_barista_get_business('map', '#');
?>
</main>
<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <h2><?php bloginfo('name'); ?></h2>
            <p><?php esc_html_e('Craft coffee, curated atmosphere, and elevated hospitality.', 'syl-barista'); ?></p>
        </div>
        <div>
            <h3><?php esc_html_e('Visit', 'syl-barista'); ?></h3>
            <p><?php echo esc_html(syl_barista_get_business('address', 'Set address in customizer')); ?></p>
            <p><?php echo esc_html(syl_barista_get_business('hours', 'Set opening hours in customizer')); ?></p>
        </div>
        <div>
            <h3><?php esc_html_e('Connect', 'syl-barista'); ?></h3>
            <p><a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a></p>
            <p><a href="<?php echo esc_url($map); ?>" target="_blank" rel="noopener"><?php esc_html_e('Open Map', 'syl-barista'); ?></a></p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>

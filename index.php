<?php
/**
 * Fallback template.
 *
 * @package SylBarista
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<section class="section">
    <div class="container">
        <h1><?php single_post_title(); ?></h1>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article <?php post_class(); ?>>
                    <?php the_content(); ?>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p><?php esc_html_e('No content found.', 'syl-barista'); ?></p>
        <?php endif; ?>
    </div>
</section>
<?php
get_footer();

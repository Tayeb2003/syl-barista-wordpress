<?php
/**
 * Front page template.
 *
 * @package SylBarista
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$phone      = syl_barista_get_business('phone', '+000 000 0000');
$whatsapp   = syl_barista_get_business('whatsapp', '#');
$map        = syl_barista_get_business('map', '#');
$address    = syl_barista_get_business('address', 'Set address in customizer');
$hours      = syl_barista_get_business('hours', 'Set opening hours in customizer');
?>
<section class="hero reveal-on-scroll">
    <div class="container hero-grid">
        <div>
            <p class="eyebrow">Modern Luxury Coffee House</p>
            <h1>Syl Barista</h1>
            <p class="hero-copy">Where artisan precision meets urban elegance. Experience signature brews, refined ambience, and unforgettable hospitality.</p>
            <div class="hero-actions">
                <a class="btn" href="#reservations"><?php esc_html_e('Reserve Your Table', 'syl-barista'); ?></a>
                <a class="btn btn-ghost" href="#menu"><?php esc_html_e('View Menu', 'syl-barista'); ?></a>
            </div>
        </div>
        <div class="hero-card">
            <h2><?php esc_html_e('Today at Syl', 'syl-barista'); ?></h2>
            <p><?php echo esc_html($hours); ?></p>
            <ul>
                <li><?php esc_html_e('Single-origin espresso flight', 'syl-barista'); ?></li>
                <li><?php esc_html_e('Signature saffron latte', 'syl-barista'); ?></li>
                <li><?php esc_html_e('Chef-paired pastry tasting', 'syl-barista'); ?></li>
            </ul>
        </div>
    </div>
</section>

<section id="menu" class="section reveal-on-scroll">
    <div class="container">
        <p class="eyebrow">Signature Drinks</p>
        <h2>Crafted to be remembered</h2>
        <div class="cards">
            <article class="card">
                <h3>Velvet Cortado</h3>
                <p>Dense crema, caramel finish, and balanced citrus notes.</p>
                <span>$7</span>
            </article>
            <article class="card">
                <h3>Syl Saffron Latte</h3>
                <p>Steamed milk infused with saffron and cardamom sweetness.</p>
                <span>$9</span>
            </article>
            <article class="card">
                <h3>Midnight Mocha</h3>
                <p>Dark cocoa, espresso intensity, and a silky texture.</p>
                <span>$8</span>
            </article>
        </div>
    </div>
</section>

<section class="section section-soft reveal-on-scroll">
    <div class="container split">
        <div>
            <p class="eyebrow">Our Story</p>
            <h2>Born from craft, built for moments</h2>
            <p>Syl Barista is designed as a premium retreat for coffee lovers, remote creators, and curated social gatherings. Every drink is dialed for precision and every seat is placed for comfort.</p>
        </div>
        <div class="story-points">
            <p>Hand-selected beans from trusted farms</p>
            <p>Barista-led tasting experiences</p>
            <p>Luxury interior with warm textures</p>
        </div>
    </div>
</section>

<section class="section reveal-on-scroll">
    <div class="container testimonials">
        <p class="eyebrow">Guest Impressions</p>
        <h2>An atmosphere people return to</h2>
        <div class="cards">
            <blockquote class="card">“Elegant, quiet, and consistently perfect espresso.”<cite>- A. Rahman</cite></blockquote>
            <blockquote class="card">“The saffron latte is exceptional. Service is polished.”<cite>- M. Elia</cite></blockquote>
            <blockquote class="card">“Best place for client meetings and slow mornings.”<cite>- T. Nassar</cite></blockquote>
        </div>
    </div>
</section>

<section id="reservations" class="section section-soft reveal-on-scroll">
    <div class="container split">
        <div>
            <p class="eyebrow">Reservations</p>
            <h2>Reserve your Syl Barista experience</h2>
            <p>Reserve ahead for tasting flights, private conversations, or evening ambience.</p>
            <ul class="quick-links">
                <li><a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>"><?php esc_html_e('Call Now', 'syl-barista'); ?></a></li>
                <li><a href="<?php echo esc_url($whatsapp); ?>" target="_blank" rel="noopener"><?php esc_html_e('WhatsApp', 'syl-barista'); ?></a></li>
                <li><a href="<?php echo esc_url($map); ?>" target="_blank" rel="noopener"><?php esc_html_e('Open Map', 'syl-barista'); ?></a></li>
            </ul>
        </div>
        <div>
            <?php echo do_shortcode('[syl_barista_reservation_form]'); ?>
        </div>
    </div>
</section>

<section class="section reveal-on-scroll">
    <div class="container split">
        <div>
            <p class="eyebrow">Location & Hours</p>
            <h2>Visit us in person</h2>
            <p><?php echo esc_html($address); ?></p>
            <p><?php echo esc_html($hours); ?></p>
            <a class="btn btn-ghost" href="<?php echo esc_url($map); ?>" target="_blank" rel="noopener"><?php esc_html_e('Get Directions', 'syl-barista'); ?></a>
        </div>
        <div class="map-frame">
            <p><?php esc_html_e('Map link is configured in the customizer for deep-link navigation.', 'syl-barista'); ?></p>
        </div>
    </div>
</section>
<?php
get_footer();

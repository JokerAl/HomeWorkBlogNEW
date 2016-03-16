<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>
<div class="wrapper">
    <div id="primary" class="content-area ">
        <main id="main" class="site-main container-fluid " role="main">
            <section class="gallery">
            <header class="page-header">
                <h1><?php echo get_cat_name(4); ?></h1>
            </header><!-- .page-header -->

            <?php
            if (have_posts()) :

                if (is_home() && !is_front_page()) : ?>
                    <header>
                        <h1 class="page-title screen-reader-text"><?php post_title(); ?></h1>
                    </header>

                    <?php
                endif;

                /* Start the Loop */
                while (have_posts()) : the_post();


                    get_template_part('template-parts/content-category', get_post_format());

                endwhile;?>

                <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>

            <?php else :

                get_template_part('template-parts/content-category', 'none');

            endif; ?>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->

    </main><!-- #main -->
    <!-- #primary -->

<?php
get_sidebar();
?> </div><?php
get_footer();

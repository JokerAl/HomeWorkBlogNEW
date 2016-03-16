<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

get_header(); ?>
    <div class="wrapper">
    <div id="primary" class="content-area clearfix">

        <main id="main" class="site-main container-fluid " role="main">
            <div class="flexslider ">
                <ul class="slides">
                    <?php $args = array(
                        'post_type' => 'slider',
                        'posts_per_page' => 6,
                    );
                    $the_query = new WP_Query($args);

                    if ($the_query->have_posts()) :
                        while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <li>
                                <div class="thumbnail-wrapper">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <div class="wrapper-desc">
                                    <h3>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <p><?php the_excerpt(); ?></p>
                                </div>
                            </li>
                        <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </ul>
            </div>
            <header class="page-header">
                <h1 class="page-tittle"><?php echo __('Latest Blog Post') ?></h1>
            </header><!-- .page-header -->

            <?php
            if (have_posts()) :

                if (is_home() && !is_front_page()) : ?>
                    <header>
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </header>

                    <?php
                endif;

                /* Start the Loop */
                while (have_posts()) : the_post();

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part('template-parts/content', get_post_format()); ?>


                <?php endwhile; ?>

                <?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
            <?php else :

                get_template_part('template-parts/content', 'none');

            endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar(); ?>
    </div><?php
get_footer();

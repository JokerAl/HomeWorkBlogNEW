<?php


get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main clearfix" role="main">
            <?php
            the_post_thumbnail();
            while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                echo do_shortcode('[contact-form-7 id="79" title="Contact form 1"]' );
            endwhile; // End of the loop.
            ?>


        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar('contact');
get_footer();

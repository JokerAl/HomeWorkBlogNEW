<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

?>

<article class="container-fluid" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">

        <div class="titel-post">
            <?php
            if (is_single()) {
                the_title('<h1 class="entry-title">', '</h1>');
            } else {
                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            }

            if ('post' === get_post_type()) : ?>
                <?php
            endif; ?>
            <div class="entry-date">
                <div class="inner-block">
                <span class="entry-day"><?php echo Get_the_date('d'); ?></span>
                <span class="entry-month"><?php echo Get_the_date('F'); ?></span>
                </div>
            </div>
            <div class="comments-count">
                <a href="<?php the_permalink() ?>#comments">
                    <?php comments_number( __( '0 Comments' ), __( '1 Comment' ), __( '% Comments' ) ); ?>
                </a>
            </div>
            <div class="category-post">
                <?php $categories = get_the_category();
                if ( $categories ) {
                    foreach ( $categories as $category ) {
                        $out .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a>, ';
                    }
                    echo trim( $out, ', ' );
                }
                ?>
            </div>
        </div>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        the_content(sprintf(
        /* translators: %s: Name of current post. */
            wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', '_s'), array('span' => array('class' => array()))),
            the_title('<span class="screen-reader-text">"', '"</span>', false)
        ));

        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', '_s'),
            'after' => '</div>',
        ));
        ?>
        <a href="<?php the_permalink(); ?>" class="read-more"><?php echo __('Continue Reading'); ?></a>

    </div><!-- .entry-content -->


</article><!-- #post-## -->

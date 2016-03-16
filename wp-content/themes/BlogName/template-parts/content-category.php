<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */

?>

<article class="col-sm-6" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
      <div class="entry-content">
        <div class="wrapper-cat">
            <a href="<?php the_permalink(); ?>"> <?php
        the_title( '<h3 class="entry-title">', '</h3>' );?></a>
            <?php
        the_post_thumbnail();
        the_excerpt();

        ?>
    </div><!-- .entry-content -->

    </div>
</article><!-- #post-## -->

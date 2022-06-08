<?php
/**
 * Template Name: Full Width Page
 * description: Custom Homepage Layout
 */
get_header(); ?>

<main id="primary" class="site-main">

  <?php
    while ( have_posts() ) :
      the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class('inner-page-wide'); ?>>
        <header class="entry-header">
          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
          <?php
          the_content();

          wp_link_pages(
            array(
              'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'landmarkauctions' ),
              'after'  => '</div>',
            )
          );
          ?>
        </div><!-- .entry-content -->

        <?php if ( get_edit_post_link() ) : ?>
          <footer class="entry-footer">
            <?php
            edit_post_link(
              sprintf(
                wp_kses(
                  /* translators: %s: Name of current post. Only visible to screen readers */
                  __( 'Edit <span class="screen-reader-text">%s</span>', 'landmarkauctions' ),
                  array(
                    'span' => array(
                      'class' => array(),
                    ),
                  )
                ),
                wp_kses_post( get_the_title() )
              ),
              '<span class="edit-link">',
              '</span>'
            );
            ?>
          </footer><!-- .entry-footer -->
        <?php endif; ?>
      </article><!-- #post-<?php the_ID(); ?> -->

  <?php
    endwhile; // End of the loop.?>

</main><!-- #main -->

<?php
get_footer();
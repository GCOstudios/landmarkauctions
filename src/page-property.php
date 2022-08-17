<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Template Name: Property Details
 */

get_header(); ?>

<main id="primary" class="site-main">
  <article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?> itemtype="https://schema.org/WebPage" itemscope="itemscope">
    <header>
      <h1></h1>
    </header>
    <div class="auction-grid">

    </div>
  </article>
</main>

<?php get_footer();
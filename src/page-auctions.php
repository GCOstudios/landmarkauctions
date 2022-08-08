<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Template Name: Demo Page
 */

get_header(); ?>

<main id="primary" class="site-main">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemtype="https://schema.org/WebPage" itemscope="itemscope">
    <header>
      <h1>Hello World!</h1>
    </header>
    <?php // do our api calls
      $auctions = wpgetapi_endpoint( 'ams1', 'auctions', array('debug' => false) );
      // $propteries = json_decode($auctions);
      // var_dump($auctions);
      foreach ($auctions as $value) {
        echo "<br>";
        foreach ($value as $item => $val) {
          echo "$item = $val<br>";
        }
      }
    ?>

    <!-- <?php esc_html_e( $propteries[1]->Reference); ?> -->
    <!-- <?php esc_html_e( $auctions[0]['FullAddress']); ?> -->
  </article>
</main>

<?php get_footer();
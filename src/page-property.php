<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Template Name: Property Details
 */

get_header(); ?>

<main id="primary" class="site-main">
  <article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?> itemtype="https://schema.org/WebPage" itemscope="itemscope">
    <?php
      $auction_root = wpgetapi_endpoint( 'ams1', 'auction_root', array('debug' => false) );
      $property_id = $_GET['propertyId'];
      echo print_r($auction_root);
    ?>
    <header>
      <h1><?php echo $_GET['propertyId']; ?></h1>
    </header>
    <div class="auction-grid">
      <?php // print_r($_GET); ?>
      <?php print_r($auction_root.'"/getauctiondetails/"'.$property_id); ?>
    </div>
  </article>
</main>

<?php get_footer();
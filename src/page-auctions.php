<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Template Name: Demo Page
 */

get_header(); ?>

<main id="primary" class="site-main">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemtype="https://schema.org/WebPage" itemscope="itemscope">
    <header>
      <h1 style="text-align: center">Auctions API</h1>
    </header>
    <div class="auction-grid">
    <?php // do our api calls
      $auctions = wpgetapi_endpoint( 'ams1', 'auctions', array('debug' => false) );
      // $propteries = json_decode($auctions);
      // var_dump($auctions);
      $i = 0;

      // foreach ($auctions as $value) {
      //   echo "<pre>"; var_dump($value);
      // }

      foreach ($auctions as $value => $val) {
        $img_url = $auctions[$value]['Thumbnail'];

        if ($img_url == null) {
          $img_url = "https://via.placeholder.com/255x218";
        }
        // echo '<a href="/tabs?propertyId='. $auctions[$value]['ID'] .'">';
        echo '<div class="property-card">';
        echo '<div style="background-image: url('. $img_url .');" class="grid-img"></div>';
        echo '<p>'. $auctions[$value]['Tagline'] .'</p>';
        echo '<hr>';
        echo '<p>Status: '. $auctions[$value]['SoldStatus'] . '</p>';
        echo '<p>Auction '. $auctions[$value]['StartDate']. '</p>';
        echo '<p>Lot </p>';
        echo '<p>Sector </p>';
        echo '<p>Price Guide Price*: '. $auctions[$value]['GuidePrice']. '</p>';
        echo '<p>Yield </p>';
        echo '</div>';
        // echo '</a>';
      }
    ?>
    </div>

    <!-- <?php esc_html_e( $propteries[1]->Reference); ?> -->
    <!-- <?php esc_html_e( $auctions[0]['FullAddress']); ?> -->
  </article>
</main>

<?php get_footer();
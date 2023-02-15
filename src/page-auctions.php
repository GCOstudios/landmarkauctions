<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Template Name: Auction Listing
 */

get_header();

$auctions = wpgetapi_endpoint( 'ams1', 'auctions', array('debug' => false) );
// $propteries = json_decode($auctions);
// var_dump($auctions);
$i = 1;

$filteredOnWeb = array_filter(
  $auctions,
  function($obj) {
    return $obj['IsShownOnWeb'] === true;
  }
);

$filteredFutureAuction = array_filter(
  $filteredOnWeb,
  function($obj) {
    $EndDate = $obj['EndDate'];
    $futureDate = strtotime($EndDate) - time();
    return  $futureDate > 0;
  }
);

asort($filteredFutureAuction);

// var_dump($filteredFutureAuction);
// var_dump($currentTime);

// foreach ($auctions as $value) {
//   echo "<pre>"; var_dump($value);
// }

?>

<main id="primary" class="site-main">
  <article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?> itemtype="https://schema.org/WebPage" itemscope="itemscope">
    <header>
      <h1><?php the_title(); ?></h1>
    </header>
    <hr>
    <div class="grid-filters">
      <p>Showing results <?php echo count($filteredFutureAuction); ?></p>
    </div>
    <div class="auction-grid">
    <?php // do our api calls
      foreach ($filteredFutureAuction as $value => $val) {
        $img_url = $filteredFutureAuction[$value]['Thumbnail'];
        $start_date = $filteredFutureAuction[$value]['StartDate'];

        // echo $start_date;
        // echo date('YW', strtotime($start_date));

        if ($img_url == null) {
          $img_url = "https://via.placeholder.com/255x218";
        }
        echo '<a href="/property-details?lotId='. $filteredFutureAuction[$value]['LotID'] .'">';
        echo '<div class="property-card">';
          if ($filteredFutureAuction[$value]['SoldStatus'] == 1) {
            echo '<div class="sold-container"><img class="ribbon" src="'. get_template_directory_uri() .'/images/auction-ended.png" alt="Auction Ended" /><div style="background-image: url('. $img_url .');" class="grid-img"></div></div>';
          } else {
            echo '<div style="background-image: url('. $img_url .');" class="grid-img"></div>';
          }
          
          echo '<div class="grid-info">';
            echo '<h4 class="grid-address">'. $filteredFutureAuction[$value]['Tagline'] .'</h4>';
            echo '<hr>';
            echo '<div class="lot-info">';
              echo '<ul class="list-unstyled">';
                echo '<li><span class="primary-text">Status</span> '. $filteredFutureAuction[$value]['SoldStatus'] . '</li>';
                echo '<li><span class="primary-text">Auction</span> '.date('d/m/Y H:i', strtotime($start_date)). '</li>';
                echo '<li><span class="primary-text">Lot</span> </li>';
                echo '<li><span class="primary-text">Sector</span> </li>';
                if ($filteredFutureAuction[$value]['SoldStatus'] == 1) {
                  echo '<li><span class="primary-text">Guide Price*:</span>&nbsp;&nbsp;<strong>Sold Prior</strong></li>';
                } else {
                  echo '<li><span class="primary-text">Guide Price*:</span>&nbsp;&nbsp;<strong>&pound;'. $filteredFutureAuction[$value]['GuidePrice']. '</strong></li>';
                }
                echo '<li><span class="primary-text">Yield</span> </li>';
              echo '</ul>';
            echo '</div>';
          echo '</div>';
        echo '</div>';
        echo '</a>';

        // if ($i++ == 12) break;
      }
    ?>
    </div>

    <div class="container">
      <p class="search-page-disclaimer">* Generally speaking Guide Prices are provided as an indication of each seller's minimum expectation, i.e. 'The Reserve'. They are not necessarily figures which a property will sell for and may change at any time prior to the auction. Virtually every property will be offered subject to a Reserve (a figure below which the Auctioneer cannot sell the property during the auction) which we expect will be set within the Guide Range or no more than 10% above a single figure Guide.</p>
    </div>
    <!-- <?php esc_html_e( $propteries[1]->Reference); ?> -->
    <!-- <?php esc_html_e( $filteredFutureAuction[0]['FullAddress']); ?> -->
  </article>
</main>

<?php get_footer();
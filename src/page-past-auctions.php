<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Template Name: Past Auctions
 */

get_header();

$auctions = wpgetapi_endpoint( 'ams1', 'auctions', array('debug' => false) );
// $propteries = json_decode($auctions);
// var_dump($auctions);
$i = 1;

$filteredFutureAuction = array_filter(
  $auctions,
  function($obj) {
    $EndDate = $obj['EndDate'];
    $futureDate = strtotime($EndDate) - time();
    return  $futureDate < 0;
  }
);

asort($filteredFutureAuction);
?>

<main id="primary" class="site-main">
  <article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?> itemtype="https://schema.org/WebPage" itemscope="itemscope">
    <header>
      <h1>Past Auctions</h1>
    </header>
    <hr>
    <ul>
      <?php foreach ($filteredFutureAuction as $value => $val) {
        echo '<li><a href="/property-details?lotId='. $filteredFutureAuction[$value]['LotID'] .'">'. $filteredFutureAuction[$value]['Tagline'] .'</a></li>';
      }; ?>
    </ul>
  </article>
</main>

<?php get_footer(); ?>
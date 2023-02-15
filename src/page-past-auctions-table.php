<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Template Name: Table Page
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
      <h1><?php the_title(); ?></h1>
    </header>
    <hr>
    <table>
      <tr>
        <th>Auction Date</th>
        <th>Lots Offered</th>
        <th>Sale Rate</th>
        <th>Total Raised</th>
        <th>Header Label</th>
      </tr>
    </table>
  </article>
</main>

<?php get_footer(); ?>
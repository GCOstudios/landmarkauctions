<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Template Name: Property Details
 */

get_header(); ?>

<main id="primary" class="site-main">
  <div class="container-area">
    <article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?> itemtype="https://schema.org/WebPage" itemscope="itemscope">
      <?php
        // $auction_root = wpgetapi_endpoint( 'ams1', 'auction_root', array('debug' => false) );
        // $property_id = $_GET['propertyId'];
        // echo print_r($auction_root);

        //      https://ams-services.eigroup.co.uk/data/lot/getlot/{id}
        $url = 'https://ams-services.eigroup.co.uk/data/lot/getlot';
        $lot_id = $_GET['lotId'];
        $request_url = $url . '/' . $lot_id;
        $curl = curl_init($request_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
          'Authorization: Basic am9ubnlfZGlnaXRhbEBob3RtYWlsLmNvLnVrOlN1bnNoMW5lIQ==',
          'Content-Type: application/json'
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        echo "<br><br>" . $request_url . "<br><br>";
        // echo $response . PHP_EOL;
        // echo "<pre><code>"; var_dump($response);
        $data = json_decode($response, true);

        echo $data["AssignedUserID"];
        echo '<p>';
        // echo $data["LotData"][1]["Value"];
        echo var_dump($data);

      ?>
      <header>
        <h1><?php // echo $_GET['propertyId']; ?>Page Title</h1>
        <h2>Meta Data | Guide Price*: </h2>
      </header>
      <div class="auction-article">
        <div class="featured image">
          <p>Featured Image or Slideshow</p>
        </div>
        <div class="entry">
          <h3>Description</h3>
          <h4>Description</h4>
          <p>Lorem ipsum</p>
          <h4>Tenure</h4>
          <p>Lorem ipsum</p>
          <h4>Accommodation</h4>
          <p>Lorem ipsum</p>
          <h4>Location</h4>
          <p>Lorem ipsum</p>
          <h4>Tenancy</h4>
          <p>Lorem ipsum</p>
          <h4>Yield</h4>
          <p>Lorem ipsum</p>
        </div>
        <div>
          <p>* Generally speaking Guide Prices are provided as an indication of each seller's minimum expectation, i.e. 'The Reserve'. They are not necessarily figures which a property will sell for and may change at any time prior to the auction. Virtually every property will be offered subject to a Reserve (a figure below which the Auctioneer cannot sell the property during the auction) which we expect will be set within the Guide Range or no more than 10% above a single figure Guide.</p>
        </div>
        <?php // print_r($_GET); ?>
        <?php // print_r($auction_root.'"/getauctiondetails/"'.$property_id); ?>
      </div>
    </article>
    <div class="sidebar">
      <p>box</p>
    </div>
  </div>
</main>

<?php get_footer();
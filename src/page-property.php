<?php if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Template Name: Property Details
 */

get_header();

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
// echo "<br><br>" . $request_url . "<br><br>";
// echo $response . PHP_EOL;
// echo "<pre><code>"; var_dump($response);
$data = json_decode($response, true);

// echo $data["AssignedUserID"];
// echo '<p>';
// echo $data["LotData"][1]["Value"];
// echo var_dump($data);
?>

<main id="primary" class="site-main single-property">
  <div class="container-area">
    <div class="property-title">
      <h1><?php echo $data['FullAddress']; ?></h1>
      <h2>Online Auction | Guide Price*: <?php echo $data['GuidePrice'] ?></h2>
    </div>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemtype="https://schema.org/WebPage" itemscope="itemscope">
      <div style="display: none">
        <?php echo do_shortcode('[slick-slider]'); ?>
      </div>
        <div class="featured image">
          <?php for ($i = 0; $i < count($data['LotImages']); $i++) { ?>
            <img src="<?php echo $data['LotImages'][$i]['HighResUrl'] ?>" alt="" />
          <?php } ?>
        </div>
        <div class="entry">
          <h3 class="lot-tagline"><?php echo $data['Tagline'] ?></h3>
          <h3>Description</h3>
          <p><?php echo $data['Description'] ?></p>
          <?php for ($i = 0; $i < count($data['LotData']); $i++) { ?>
            <?php if ($data['LotData'][$i]['Value'] != '') { ?>
              <h3><?php echo $data['LotData'][$i]['Name'] ?></h3>
              <p><?php echo $data['LotData'][$i]['Value'] ?></p>
            <?php } ?>
          <?php } ?>
        </div>
        <div class="disclaimer">
          <p>* Generally speaking Guide Prices are provided as an indication of each seller's minimum expectation, i.e. 'The Reserve'. They are not necessarily figures which a property will sell for and may change at any time prior to the auction. Virtually every property will be offered subject to a Reserve (a figure below which the Auctioneer cannot sell the property during the auction) which we expect will be set within the Guide Range or no more than 10% above a single figure Guide.</p>
        </div>
        <?php // print_r($_GET); ?>
        <?php // print_r($auction_root.'"/getauctiondetails/"'.$property_id); ?>
      </di>
    </article>
    <div class="sidebar">
      <div class="login-box">
        <h3>Auction Box coming soon!</h3>
      </div>
      <div class="documents">
        <h4>Agreement Documents</h4>
        <a href="#">Terms & Conditions</a>
      </div>
      <div class="documents">
        <h4>Legal Documents</h4>
        <a href="<?php echo $data['LegalDocumentUrl'] ?>">Login to view legal documents</a>
      </div>
    </div>
  </div>
</main>

<?php get_footer();
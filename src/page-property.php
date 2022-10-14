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

$isEmpty = empty($data);
$address = $data['FullAddress'];
$map = '[vsgmap address="'. $address .'"]';

// echo $data["AssignedUserID"];
// echo '<p>';
// echo $data["LotData"][1]["Value"];
// echo var_dump($data);

$auctionStartDate = strtotime($data['TimedAuction']['StartDate']);
$auctionEndDate = strtotime($data['TimedAuction']['EndDate']);
?>

<main id="primary" class="site-main single-property">
  <div class="property-nav">
    <div class="container">
      <a href="/auctions-template/">Lot List</a>
    </div>
  </div>
  <div class="container-area">
    <div class="property-title">
      <h1><?php if ($isEmpty) {
        echo "Page is Empty";
      } else {
        echo $data['FullAddress'];
      } ?></h1>
      <h2>Online Auction | Guide Price*: <?php if ($isEmpty) {
        echo "£0";
      } else {
        echo $data['GuidePrice'];
      } ?></h2>
    </div>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemtype="https://schema.org/WebPage" itemscope="itemscope">
      <div style="display: none">
        <?php echo do_shortcode('[slick-slider]'); ?>
      </div>
        <div class="property-main image">
          <?php for ($i = 0; $i < count($data['LotImages']); $i++) { ?>
            <img src="<?php echo $data['LotImages'][$i]['HighResUrl'] ?>" alt="" />
          <?php } ?>
        </div>
        <div class="property-thumb image">
          <?php for ($i = 0; $i < count($data['LotImages']); $i++) { ?>
            <img src="<?php echo $data['LotImages'][$i]['HighResUrl'] ?>" alt="" width="165" height="100" />
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
        <span class="lead-text">Minimum Opening Bid</span>
        <h2 class="guide-price"><?php echo $data['GuidePrice'] ?></h2>
        <div class="bid-section">
          <a href="https://passport.eigroup.co.uk/account/login">Log in/register to bid</a>
        </div>
        <hr class="sep" >
        <div class="row">
          <div class="bid-schedule">
            <p class="bid-heading">Bigging Opens On</p>
            <p class="bid-time"><?php echo date('jS M Y h:i',$auctionStartDate); ?></p>
            <a class="auction-cta" href="https://passport.eigroup.co.uk/account/login">Watch</a>
          </div>
          <div class="bid-schedule">
            <p class="bid-heading">Scheduled End Date</p>
            <p class="bid-time"><?php echo date('jS M Y h:i',$auctionEndDate); ?></p>
            <a class="auction-cta" href="https://passport.eigroup.co.uk/account/login">Help on Bidding</a>
          </div>
        </div>
      </div>
      <div class="documents">
        <h4>Agreement Documents</h4>
        <a href="#">Terms & Conditions</a>
      </div>
      <div class="documents">
        <h4>Legal Documents</h4>
        <a href="<?php echo $data['LegalDocumentUrl'] ?>">Login to view legal documents</a>
      </div>
      <div style="margin-bottom: 80px;" class="documents">
        <h4>Share</h4>
        <?php echo do_shortcode("[TheChamp-Sharing]"); ?>
      </div>
      <div class="documents">
        <h4>Map</h4>
        <?php echo do_shortcode($map); ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer();
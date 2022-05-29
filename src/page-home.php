<?php
/**
 * Template Name: Homepage
 * description: Custom Homepage Layout
 */
get_header(); ?>
  <main>
    <div class="hero">
      <?php echo do_shortcode('[slick-slider arrows="false"]'); ?>
      <div class="hero-info">
        <h2>Sell or Buy a property</h2>
        <p>For more information and enquiries, contact<br>us for some friendly no fee advice.</p>
        <p>07974 179 607</p>
      </div>
    </div>
    
    <div class="section-one">
      <div class="container">
        <?php
        $secitonOne = get_field('section_one');
        if($secitonOne):?>
          <div class="card">
            <?php echo $secitonOne['auction_guide'] ?>
          </div>
          <div class="card">
            <?php echo $secitonOne['sell_now'] ?>
          </div>
          <div class="card">
            <?php echo $secitonOne['valuations'] ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div>
      <p>Section with image and CTA</p>
    </div>
    <div>
      <p>Landmark Auctions - are focused<br>on selling property nationwide.</p>
    </div>
    <div>
      <p>Image section</p>
    </div>
    <div>
      <p>Four cards: Register with us, FAQ's, Meet the team, Contact us</p>
    </div>
    <div>
      <p>Carousel with quotes</p>
    </div>
  </main>
<?php
get_footer();
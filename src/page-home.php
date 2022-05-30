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
            <?php echo $secitonOne['auction_guide']; ?>
          </div>
          <div class="card">
            <?php echo $secitonOne['sell_now']; ?>
          </div>
          <div class="card">
            <?php echo $secitonOne['valuations']; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="section-two">
      <?php
        $secitonTwo = get_field('section_two');
        if($secitonTwo):?>
          <div class="section-image">
            <img src="<?php echo esc_url( $secitonTwo['image']['url'] ); ?>" alt="<?php echo esc_attr( $secitonTwo['image']['alt'] ); ?>" />
          </div>
          <div class="seciton-info">
            <div class="section-container">
              <?php echo $secitonTwo['online_auctions']; ?>
            </div>
          </div>
        <?php endif; ?>
    </div>
    <div class="section-three">
      <?php if( get_field('section_three') ): ?>
        <div class="section-quote">
          <?php the_field('section_three'); ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="section-four">
      <?php
        $secitonFour = get_field('section_four');
        if($secitonFour):?>
          <div style="background-image: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('<?php echo esc_url( $secitonFour['background_image']['url'] ); ?>');" class="section-info">
            <div class="section-container">
              <div class="section-entry">
                <?php echo $secitonFour['why_landmark']; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
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
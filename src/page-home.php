<?php
/**
 * Template Name: Homepage
 * description: Custom Homepage Layout
 */
get_header(); ?>
  <main>
    <div class="hero">
      <?php echo do_shortcode('[slick-slider category="3" arrows="false"]'); ?>
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
          <div class="card box-item">
            <?php echo $secitonOne['auction_guide']; ?>
          </div>
          <div class="card box-item">
            <?php echo $secitonOne['sell_now']; ?>
          </div>
          <div class="card box-item">
            <?php echo $secitonOne['valuations']; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="section-two">
      <?php
        $secitonTwo = get_field('section_two');
        if($secitonTwo):?>
          <div style="background-image: url(<?php echo esc_url( $secitonTwo['image']['url'] ); ?>)" class="section-image fade-right">
            <img src="<?php echo esc_url( $secitonTwo['image']['url'] ); ?>" alt="<?php echo esc_attr( $secitonTwo['image']['alt'] ); ?>" />
          </div>
          <div class="seciton-info">
            <div class="section-container fade-left">
              <?php echo $secitonTwo['online_auctions']; ?>
            </div>
          </div>
        <?php endif; ?>
    </div>
    <div class="section-three">
      <?php if( get_field('section_three') ): ?>
        <div class="section-quote fade-in">
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
              <div class="section-entry fade-right">
                <?php echo $secitonFour['why_landmark']; ?>
              </div>
            </div>
          </div>
        <?php endif; ?>
    </div>
    <div class="section-five">
    <?php
        $secitonFive = get_field('section_five');
        if($secitonFive):?>
          <div class="card box-item-up">
            <?php echo $secitonFive['register_with_us']; ?>
          </div>
          <div class="card box-item-up">
            <?php echo $secitonFive['faq']; ?>
          </div>
          <div class="card box-item-up">
            <?php echo $secitonFive['meet_the_team']; ?>
          </div>
          <div class="card box-item-up">
            <?php echo $secitonFive['contact_us']; ?>
          </div>
        <?php endif; ?>
    </div>
    <div class="section-six">
    <?php echo do_shortcode('[slick-slider design="design-5" category="4" arrows="false"]'); ?>
    </div>
  </main>
<?php
get_footer();
<?php
/*Template Name: Contact*/
get_header();
$thisID = get_the_ID();
$telephone = get_field('telephone', 'options');
$address = get_field('address', 'options');
$gurl = get_field('gurl', 'options');
$gmaplink = !empty($gurl)?$gurl: 'javascript:void()';
$mapcode = get_field('gmap_code', $thisID);
?>
<section class="page-banner">
	<div class="page-banner-bg-black"></div>
	<div class="page-bnr-bg inline-bg" style="background-image: url('<?php echo THEME_URI; ?>/assets/images/contact-bnr.jpg');"></div>
	<div class="container">
	  <div class="row">
	    <div class="col-md-12">
	      <div class="page-bnr-cntlr">
	        <div class="page-bnr-desc">
	          <h1 class="fl-h1 page-bnr-title">Contact</h1>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
</section>

<section class="breadcrumb-sec">
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="breadcrumb-sec-inr">
        <ul class="reset-list clearfix">
          <li class="home"><a href="#"><span>Home</span></a></li>
          <li class="active"><span>Contact</span></li>
        </ul>
      </div>
    </div>
  </div>
</div>
</section>

<section class="contact-form-sec-wrp">
<div class="contact-form-rgt-bg"></div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="contact-form-block clearfix">
        <div class="contact-form-lft mHc">
          <div class="contact-form-info-cntlr">
          	<?php 
              $intro = get_field('introsec', $thisID);
              if($intro):
            ?>
            <div class="contact-form-info">
              <?php if( !empty($intro['title']) ) printf( '<h2 class="contact-form-info-title fl-h4">%s</h2>', $intro['title'] ); ?>
              <div class="contact-form-info-des">
              	<?php if( !empty($intro['description']) ) echo wpautop( $intro['description'] ); ?>
              </div>
              <div class="contact-form-dtails">
                <div class="cnt-addres">
                  <a href="#"><span>M&B Civil - Adelaide</span><span>15 Paula Avenue</span><span>Windsor Gardens SA 5087</span></a>
                </div>
                <div class="cnt-tel">
                  <span>Phone </span>
                  <a href="tel:+61882666650">+61 8 8266 6650</a>
                </div>
              </div>
              <blockquote>
                <h2 class="contact-form-info-mgs-title fl-h2">“Committed to providing clients with value, quality and a safe work place.”</h2>
              </blockquote>
            </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="contact-form-rgt mHc">
          <div class="contact-form-dsc-wrp">
            <div class="contact-form-title-cntlr">
              <h4 class="contact-form-sub-title fl-h4">contact</h4>
              <h3 class="contact-form-title fl-h3">Get in touch</h3>
            </div>
            <div class="contact-form-wrp clearfix">
              <div class="wpforms-container">
                <div class="wpforms-form needs-validation novalidate">
                  <div class="wpforms-field-container">
                    <div class="wpforms-field">
                      <input type="text" name="name" placeholder="Name" required="">
                      <label id="wpforms-222-field_1-error" class="wpforms-error" for="wpforms-222-field_1">Check this field!</label>
                    </div>
                    <div class="wpforms-field">
                      <input type="email" name="email" placeholder="Your Email" required="">
                      <label id="wpforms-222-field_1-error" class="wpforms-error" for="wpforms-222-field_1">Check this field!</label>
                    </div>
                    <div class="wpforms-field">
                      <input type="text" name="text" placeholder="Contact Number" required="">
                      <label id="wpforms-222-field_1-error" class="wpforms-error" for="wpforms-222-field_1">Check this field!</label>
                    </div>
                    <div class="wpforms-field wpforms-field-textarea">
                      <textarea name="message" placeholder="Write your message here"></textarea>
                    </div>
                  </div>
                  <div class="wpforms-submit-container">
                    <button type="submit" name="submit" class="wpforms-submit">submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>


<section class="contact-google-map-sec-wrp">
	<div class="contact-google-map-wrp">
		<div class="contact-google-map">
		    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d818.4276633048174!2d138.64988033210548!3d-34.86349704945986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ab0b5f79609d1c7%3A0x859e54c1dba31b8!2sPaula%20Ave%2C%20Windsor%20Gardens%20SA%205087%2C%20Australia!5e0!3m2!1sen!2sbd!4v1632836475479!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		</div>
	</div>
</section>
<?php get_template_part('templates/contact', 'sec'); ?>
<?php get_footer(); ?>
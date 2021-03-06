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

<?php get_template_part('templates/page', 'banner'); ?>
<?php get_template_part('templates/breadcrumbs'); ?>

<section class="contact-form-sec-wrp">
<div class="contact-form-rgt-bg"></div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="contact-form-block clearfix">
        <div class="contact-form-lft mHc">
          <div class="contact-form-info-cntlr">
            <div class="contact-form-info">
	    			    <?php $intro = get_field('introsec', $thisID); ?>
              	<div>
              	<?php if( !empty($intro['title']) ) printf( '<h2 class="contact-form-info-title fl-h4">%s</h2>', $intro['title'] ); ?>
	              <div class="contact-form-info-des">
	              	<?php if( !empty($intro['description']) ) echo wpautop( $intro['description'] ); ?>
	              </div>
	              <div class="contact-form-dtails">
	                <div class="cnt-addres">
	                  <span>M&B Civil - Adelaide</span>
	                  <?php 
	                    if( !empty($address) ) printf('<a href="%s" target="_blank">%s</a>', $gmaplink, $address); 
	                  ?>
	                </div>
	                <div class="cnt-tel">
	                  <span>Phone </span>
	                  <?php 
	                   if( !empty($telephone) ) printf('<a href="tel:%s">%s</a>', phone_preg($telephone), $telephone);  
	                  ?>
	                </div>
	              </div>
              	</div>

	            <?php if($intro['quote_text']): ?>
	            <blockquote>
	              <?php printf( '<h2 class="contact-form-info-mgs-title fl-h2">ā%sā</h2>', $intro['quote_text'] ); ?>
	            </blockquote>
	            <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="contact-form-rgt mHc">
          	<?php 
              $form = get_field('form', $thisID);
              if($form):
                $shortcode = $form['shortcode'];
            ?>
	      	<div class="contact-form-dsc-wrp">
		        <div class="contact-form-title-cntlr">
		        	<?php 
		        		if( !empty($form['title']) ) printf( '<h2 class="contact-form-sub-title fl-h4">%s</h2>', $form['title'] ); 
		        		if( !empty($form['subtitle']) ) printf( '<h3 class="contact-form-title fl-h3">%s</h3>', $form['subtitle'] ); 
		        	?>
		        </div>
		        <div class="contact-form-wrp clearfix">
		          <div class="wpforms-container">
		            <?php if( !empty($shortcode) ) echo do_shortcode($shortcode); ?>
		          </div>
		        </div>
	      	</div>
	      	<?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</div>
</section>


<?php if( $mapcode ): ?>
<section class="contact-google-map-sec-wrp">
  <div class="contact-google-map-wrp">
    <div class="contact-google-map">
      <?php echo $mapcode; ?>
  </div>
</section>
<?php endif; ?>
<?php get_template_part('templates/contact', 'sec'); ?>
<?php get_footer(); ?>
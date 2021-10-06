<?php get_header(); ?>
<?php get_template_part('templates/page', 'banner'); ?>
<?php get_template_part('templates/breadcrumbs'); ?>
<div class="gap-100 hide-sm"></div>
 <div class="general-content-ctr">
<?php while ( have_rows('contents') ) : the_row();  ?>
<?php 
  if( get_row_layout() == 'full_width' ){ 
  $fctitle = get_sub_field('fc_title');
  $heading_color = get_sub_field('heading_color');
  $fc_text = get_sub_field('fc_text');
  $body_color = get_sub_field('body_color');
  $bg_color = get_sub_field('bg_color');
?>
<section class="mbc-fullwidth-txt-module"<?php echo !empty($bg_color)?' style="background:'.$bg_color.'"':''; ?> >
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div>
            <?php if( !empty($fctitle) ): ?>
            <h4<?php echo !empty($heading_color)?' style="color:'.$heading_color.'"':''; ?>>
              <?php printf('%s', $fctitle)?>
            </h4>
            <?php endif; ?>
            <?php if( !empty($fc_text) ): ?>
            <div class="text-body"<?php echo !empty($body_color)?' style="color:'.$body_color.'!important"':''; ?>>
              <?php echo wpautop($fc_text); ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
  </div>    
</section>
<?php 
}elseif( get_row_layout() == 'two_columns' ){
$fc_title = get_sub_field('fc_title');
$fc_text1 = get_sub_field('fc_text1');
$fc_text2 = get_sub_field('fc_text2');
$bg_color = get_sub_field('bg_color');
$txt_color = get_sub_field('txt_color');
$hd_color = get_sub_field('hd_color');
$txt_color = !empty($txt_color)?' style="color:'.$txt_color.'!important"':''; 
$string = '';
if( !empty($hd_color) ){
  $string = str_replace(' ', '', strip_tags($fc_text1));
  $string = strip_tags(substr($string,2, 8)); 
}elseif(!empty($txt_color)){
  $string = str_replace(' ', '', strip_tags($fc_text1));
  $string = strip_tags(substr($string,2, 8)); 
  $hd_color = $txt_color;
}

?>
<section class="mbc-grids-sec-cntlr"<?php echo !empty($bg_color)?' style="background:'.$bg_color.'"':''; ?>>
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mbc-grd-sec-inr">
            <div class="mbc-grids-sec-entry-hdr">
              <?php if( !empty($fc_title) ) printf('<h2 class="fl-h4 mbc-grids-sec-entry-hdr-title"%s>%s</h2>', $txt_color, $fc_title); ?>
            </div>
            <div class="mbc-columns mbc-columns-2"<?php echo $txt_color; ?>>
              <?php if( !empty($string) ): ?>
              <style type="text/css">
                .<?php echo $string; ?> h4{
                  color: <?php echo $hd_color; ?>;
                }
              </style>
              <?php endif; ?>
              <div class="mbc-grid-item<?php echo !empty($string)?' '.$string:''; ?>">
                <div class="mbc-grid-item-inr">
                  <?php if( !empty($fc_text1) ) echo wpautop($fc_text1); ?>
                </div>
              </div>
              <div class="mbc-grid-item<?php echo !empty($string)?' '.$string:''; ?>">
                <div class="mbc-grid-item-inr">
                  <?php if( !empty($fc_text2) ) echo wpautop($fc_text2); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>    
</section>
<?php 
}elseif( get_row_layout() == 'three_columns' ){ 
$fc_title = get_sub_field('fc_title');
$fc_text1 = get_sub_field('fc_text1');
$fc_text2 = get_sub_field('fc_text2');
$fc_text3 = get_sub_field('fc_text3');
?>
<section class="mbc-grids-sec-cntlr">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mbc-grd-sec-inr">
            <div class="mbc-grids-sec-entry-hdr">
            <?php if( !empty($fc_title) ) printf('<h2 class="fl-h4 mbc-grids-sec-entry-hdr-title">%s</h2>', $fc_title); ?>
            </div>
            <div class="mbc-columns mbc-columns-3">
              <div class="mbc-grid-item">
                <div class="mbc-grid-item-inr">
                  <?php if( !empty($fc_text1) ) echo wpautop($fc_text1); ?>
                </div>
              </div>
              <div class="mbc-grid-item">
                <div class="mbc-grid-item-inr">
                  <?php if( !empty($fc_text2) ) echo wpautop($fc_text2); ?>
                </div>
              </div>
              <div class="mbc-grid-item">
                <div class="mbc-grid-item-inr">
                  <?php if( !empty($fc_text3) ) echo wpautop($fc_text3); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>    
</section>
<?php 
}elseif( get_row_layout() == 'columns1_2' ){ 
$fc_title = get_sub_field('fc_title');
$fc_text1 = get_sub_field('fc_text1');
$fc_text2 = get_sub_field('fc_text2');
?>
<section class="mbc-grids-sec-cntlr">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mbc-grd-sec-inr">
            <div class="mbc-grids-sec-entry-hdr">
              <?php if( !empty($fc_title) ) printf('<h2 class="fl-h4 mbc-grids-sec-entry-hdr-title">%s</h2>', $fc_title); ?>
            </div>
            <div class="mbc-columns mbc-columns-2L">
              <div class="mbc-grid-item">
                <div class="mbc-grid-item-inr">
                  <?php if( !empty($fc_text1) ) echo wpautop($fc_text1); ?>
                </div>
              </div>
              <div class="mbc-grid-item">
                <div class="mbc-grid-item-inr">
                  <?php if( !empty($fc_text2) ) echo wpautop($fc_text2); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>    
</section>
<?php 
}elseif( get_row_layout() == 'columns_2_1' ){ 
$fc_title = get_sub_field('fc_title');
$fc_text1 = get_sub_field('fc_text1');
$fc_text2 = get_sub_field('fc_text2');
?>
<section class="mbc-grids-sec-cntlr">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mbc-grd-sec-inr">
            <div class="mbc-grids-sec-entry-hdr">
              <?php if( !empty($fc_title) ) printf('<h2 class="fl-h4 mbc-grids-sec-entry-hdr-title">%s</h2>', $fc_title); ?>
            </div>
            <div class="mbc-columns mbc-columns-2R">
              <div class="mbc-grid-item">
                <div class="mbc-grid-item-inr">
                  <?php if( !empty($fc_text1) ) echo wpautop($fc_text1); ?>
                </div>
              </div>
              <div class="mbc-grid-item">
                <div class="mbc-grid-item-inr">
                  <?php if( !empty($fc_text2) ) echo wpautop($fc_text2); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>    
</section>
<?php 
}elseif( get_row_layout() == 'four_columns' ){ 
$fc_title = get_sub_field('fc_title');
$fc_text1 = get_sub_field('fc_text1');
$fc_text2 = get_sub_field('fc_text2');
$fc_text3 = get_sub_field('fc_text3');
$fc_text4 = get_sub_field('fc_text4');
?>
<section class="mbc-grids-sec-cntlr">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mbc-grd-sec-inr">
            <div class="mbc-grids-sec-entry-hdr">
              <?php if( !empty($fc_title) ) printf('<h2 class="fl-h4 mbc-grids-sec-entry-hdr-title">%s</h2>', $fc_title); ?>
            </div>
            <div class="mbc-columns mbc-columns-4">
              <div class="mbc-grid-item">
                <div class="mbc-grid-item-inr">
                  <?php if( !empty($fc_text1) ) echo wpautop($fc_text1); ?>
                </div>
              </div>
              <div class="mbc-grid-item">
                <div class="mbc-grid-item-inr">
                 <?php if( !empty($fc_text2) ) echo wpautop($fc_text2); ?>
                </div>
              </div>
              <div class="mbc-grid-item">
                <div class="mbc-grid-item-inr">
                  <?php if( !empty($fc_text3) ) echo wpautop($fc_text3); ?>
                </div>
              </div>
              <div class="mbc-grid-item">
                <div class="mbc-grid-item-inr">
                  <?php if( !empty($fc_text4) ) echo wpautop($fc_text4); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>    
</section>
<?php 
}elseif( get_row_layout() == 'texteditor' ){ 
$fc_text = get_sub_field('fc_text');
$bg_color = get_sub_field('bg_color');
?>

<?php 
}elseif( get_row_layout() == 'testimonials' ){ 
$testiobj = get_sub_field('select_testimonial');
if( empty($testiobj) ){
    $testiobj = get_posts( array(
      'post_type' => 'testimonials',
      'posts_per_page'=> -1,
      'orderby' => 'date',
      'order'=> 'asc',

    ) );  
}
if($testiobj){
?>
<section class="mbc-text-slider-ctlr">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mbc-text-slider-wrap">
           <div class="mbc-text-slider">
            <div class="mbc-slider-prev-nxt">
              <span class="mbc-prev"></span>
              <span class="mbc-nxt"></span>
            </div>
            <div class="mbc-text-slider-inr mbcTextSlider">
              <?php foreach( $testiobj as $testi ) : ?>
              <div class="mbc-text-slider-item">
                <h2 class="mbc-text-slider-title fl-h2">“<?php echo $testi->post_content; ?>”</h2>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
}
}elseif( get_row_layout() == 'bleed_image' ){ 
$bleed_images = get_sub_field('fc_bleed_image');
if($bleed_images){
?>
<section class="full-width-img-bleed-sec">
  <div class="full-width-img-bleed-sec-rows-cntlr">
    <ul class="reset-list clearfix">
      <?php 
        $i = 1;
        foreach( $bleed_images as $bleed_image ): 
      ?>
      <li>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="full-width-img-des-cntlr<?php echo ($i%2 == 0)?' left-des-rgt-img':''; ?>">
                <div class="full-width-img-des-lft mHc">
                  <div class="full-width-img-cntlr">
                    <div class="inline-bg" style="background-image: url(<?php echo !empty($bleed_image['image'])?cbv_get_image_src($bleed_image['image']):'';?>);"></div>
                    <?php echo !empty($bleed_image['image'])?cbv_get_image_tag($bleed_image['image']):'';?>
                  </div>
                </div>
                <div class="full-width-img-des-rgt mHc">
                  <div class="full-width-des-innr">
                    <?php 
                    if( !empty($bleed_image['fc_title']) ) printf('<h4 class="full-width-des-subtitle fl-h4">%s</h4>', $bleed_image['fc_title']);
                    if( !empty($bleed_image['fc_subtitle']) ) printf('<h3 class="full-width-des-title fl-h3">%s</h3>', $bleed_image['fc_subtitle']);
                    if( !empty($bleed_image['fc_text']) ) echo wpautop($bleed_image['fc_text']);
                    ?>
                  </div>
                </div>            
              </div>
            </div>
          </div>
        </div>
      </li>
      <?php $i++; endforeach; ?>
    </ul>
  </div>
</section>
<?php 
}
}elseif( get_row_layout() == 'accordion_design_1' ){ 
$fc_title = get_sub_field('fc_title');
$fc_text = get_sub_field('fc_text');
$accordions = get_sub_field('accordions');
?>
<section class="mbc-des-accordion-sec mbc-grids-sec-cntlr">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mbc-des-accordion-sec-inr">
          <div class="mbc-columns mbc-columns-2L">
            <div class="mbc-grid-item">
              <div class="mbc-grid-item-inr">
                <div class="mbc-grids-col-entry-hdr">
                  <?php if( !empty($fc_title) ) printf('<h2 class="fl-h2 mbc-grids-col-entry-hdr-title">%s</h2>', $fc_title); ?>
                </div>
                <?php if( !empty($fc_text) ) echo wpautop($fc_text);?>
              </div>
            </div>
            <?php if( $accordions ): ?>
            <div class="mbc-grid-item">
              <div class="mbc-grid-item-inr">
                <?php foreach( $accordions as $accordion ): ?>
                <div class="mbc-accordion-menu">
                  <div class="mbc-accordion-hdr">
                  <?php if( !empty($accordion['title']) ) printf('<h3 class="mbc-accordion-title fl-h6">%s</h3>', $accordion['title']); ?>
                  </div>
                  <div class="mbc-accordion-des">
                    <?php if( !empty($accordion['description']) ) echo wpautop($accordion['description']);?>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
}elseif( get_row_layout() == 'accordion_design_2' ){ 
$fc_title = get_sub_field('fc_title');
$fc_text = get_sub_field('fc_text');
$accordions = get_sub_field('accordions');
?>
<section class="mbc-des-accordion-sec mbc-grids-sec-cntlr mbc-des-accordion-gray-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mbc-des-accordion-sec-inr">
          <div class="mbc-columns mbc-columns-2L">
            <div class="mbc-grid-item">
              <div class="mbc-grid-item-inr">
                <div class="mbc-grids-col-entry-hdr">
                  <?php if( !empty($fc_title) ) printf('<h2 class="fl-h2 mbc-grids-col-entry-hdr-title">%s</h2>', $fc_title); ?>
                </div>
                <?php if( !empty($fc_text) ) echo wpautop($fc_text);?>
              </div>
            </div>
            <?php if( $accordions ): ?>
            <div class="mbc-grid-item">
              <div class="mbc-grid-item-inr">
                <?php foreach( $accordions as $accordion ): ?>
                <div class="mbc-accordion-menu">
                  <div class="mbc-accordion-hdr">
                    <?php if( !empty($accordion['title']) ) printf('<h3 class="mbc-accordion-title fl-h6">%s</h3>', $accordion['title']); ?>
                  </div>
                  <div class="mbc-accordion-des">
                    <?php if( !empty($accordion['description']) ) echo wpautop($accordion['description']);?>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
}elseif( get_row_layout() == 'text_image' ){ 
$fc_title = get_sub_field('fc_title');
$fc_text = get_sub_field('fc_text');
$fc_image = get_sub_field('image');
$image_position = get_sub_field('image_position');
$class_position = $image_position == 'right'?' mbc-columns-2R lftimg-rgtdes':' mbc-columns-2L';
?>
<section class="mbc-grids-sec-cntlr">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mbc-grd-sec-inr">
            <div class="mbc-columns<?php echo $class_position; ?>">
              <div class="mbc-grid-item">
                <div class="mbc-grid-item-inr">
                  <div class="mbc-grid-item-img inline-bg" style="background:url(<?php echo !empty($fc_image)?cbv_get_image_src($fc_image):''; ?>);">
                    <?php echo !empty($fc_image)?cbv_get_image_tag($fc_image):''; ?>
                  </div>
                </div>
              </div>
              <div class="mbc-grid-item">
                <div class="mbc-grid-item-inr">
                  <div class="mbc-grids-col-entry-hdr">
                  <?php if( !empty($fc_title) ) printf('<h2 class="fl-h2 mbc-grids-col-entry-hdr-title">%s</h2>', $fc_title); ?>
                  </div>
                  <?php if( !empty($fc_text) ) echo wpautop($fc_text);?>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
  </div>    
</section>
<?php 
}elseif( get_row_layout() == 'text_image2' ){ 
$fc_title = get_sub_field('fc_title');
$fc_text = get_sub_field('fc_text');
$fc_image = get_sub_field('image');
$image_position = get_sub_field('image_position');
$class_position = $image_position == 'right'?' lftimg-rgtdes':'';
?>
<section class="mbc-grids-sec-cntlr">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mbc-grd-sec-inr">
            <div class="mbc-columns mbc-columns-2<?php echo $class_position; ?>">
              <div class="mbc-grid-item">
                <div class="mbc-grid-item-inr">
                <div class="mbc-grid-item-img mbc-grd-item-img-columns2 inline-bg" style="background:url(<?php echo !empty($fc_image)?cbv_get_image_src($fc_image):''; ?>)">
                    <?php echo !empty($fc_image)?cbv_get_image_tag($fc_image):''; ?>
                  </div>
                </div>
              </div>
              <div class="mbc-grid-item">
                <div class="mbc-grid-item-inr">
                  <div class="mbc-grids-col-entry-hdr">
                    <?php if( !empty($fc_title) ) printf('<h2 class="fl-h2 mbc-grids-col-entry-hdr-title">%s</h2>', $fc_title); ?>
                  </div>
                  <?php if( !empty($fc_text) ) echo wpautop($fc_text);?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>    
</section>
<?php 
}elseif( get_row_layout() == 'slider' ){ 
$fc_image = get_sub_field('fc_image');
$slides = get_sub_field('slide');
?>
<section class="mbc-option-break-slider-sec inline-bg" style="background:url(<?php echo !empty($fc_image)?cbv_get_image_src($fc_image):THEME_URI.'/assets/images/mbc-opb-slider-bg.jpg'; ?>);">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php if( $slides ): ?>
        <div class="mbc-option-break-slider-sec-inr">
          <div class="mbc-option-break-option-break-slider-ctlr">
            <div class="mbc-slider-prev-nxt">
              <span class="mbc-prev"><i></i></span>
              <span class="mbc-nxt"><i></i></span>
            </div>
            <div class="mbc-opb-slider-grds mbcOpbSlider clearfix">
              <?php foreach( $slides as $slide ): ?>
              <div class="mbc-opb-slider-grd-item">
                <div class="mbc-opb-slider-grd-item-des">
                  <?php if( !empty($slide['text']) ) printf('<h2 class="mbc-opb-slider-title fl-h2">%s</h2>', $slide['text']); ?>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php 
}elseif( get_row_layout() == 'partners' ){ 
$fc_title = get_sub_field('fc_title');
$subtitle = get_sub_field('subtitle');
$logos = get_sub_field('logos');
?>
<section class="mbc-client-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mbc-client-sec-inr">
          <div class="mbc-client-hdr">
            <?php 
              if( !empty($fc_title) ) printf('<h3 class="mbc-client-subtitle fl-h4">%s</h3>', $fc_title); 
              if( !empty($subtitle) ) printf('<h2 class="mbc-client-title fl-h3">%s</h2>', $subtitle); 
            ?>
          </div>
          <?php if( $logos ): ?>
          <div class="mbc-client-grds">
            <?php foreach( $logos as $logo ): ?>
            <div class="mbc-client-grd-item">
              <div class="mbc-client-grd-item-img">
                <?php 
                  if( !empty($logo['link']) ) printf('<a href="%s">', $logo['link']);
                  if( !empty($logo['logo']) ) echo cbv_get_image_tag($logo['logo']); 
                  if( !empty($logo['link']) ) printf('</a>');
                ?>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
}elseif( get_row_layout() == 'team_members' ){ 
$fc_title = get_sub_field('fc_title');
$subtitle = get_sub_field('subtitle');
$memberobj = get_sub_field('select_members');
if( empty($memberobj) ){
    $memberobj = get_posts( array(
      'post_type' => 'team-members',
      'posts_per_page'=> -1,
      'orderby' => 'date',
      'order'=> 'asc',

    ) );  
}
?>
<section class="mbc-team-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mbc-team-sec-inr">
          <div class="mbc-grids-sec-entry-hdr">
            <?php 
              if( !empty($fc_title) ) printf('<h4 class="fl-h4 mbc-team-subtitle">%s</h4>', $fc_title); 
              if( !empty($subtitle) ) printf('<h2 class="fl-h3 mbc-grids-sec-entry-hdr-title">%s</h2>', $subtitle); 
            ?>
          </div>
          <div class="mbc-team-slider-ctlr">
            <div class="mbc-slider-prev-nxt">
              <span class="mbc-prev">
                
              </span>
              <span class="mbc-nxt"></span>
            </div>
            <?php if($memberobj): ?>
            <div class="mbc-team-grds mbcTeamSlider">
            <?php 
                foreach( $memberobj as $member ) :
                $imgID = get_post_thumbnail_id($member->ID);
                $imgtag = !empty($imgID)? cbv_get_image_tag($imgID): ''; 
                $position = get_field('position', $member->ID);
                $link = get_field('link', $member->ID);
            ?>
              <div class="mbc-team-grd-item-ctlr">
                <div class="mbc-team-grd-item">
                  <?php if( !empty($link) ) printf('<a href="%s" class="overlay-link"></a>', $link); ?>
                  <div class="mbc-team-grd-item-img-ctlr">
                    <div class="mbc-team-grd-item-img">
                      <?php echo $imgtag; ?>
                    </div>
                  </div>
                  <div class="mbc-team-grd-item-des">
                    <h3 class="mbc-team-grd-des-title fl-h6">
                        <?php if( !empty($link) ) printf('<a href="%s">', $link); ?>
                        <?php echo get_the_title($member->ID); ?>,
                      <?php if( !empty($link) ) printf('</a>'); ?>
                    </h3>
                    <?php if( !empty($position) ) printf('<strong>%s</strong>', $position); ?>
                    <p><?php echo get_the_excerpt($member->ID); ?></p>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
}elseif( get_row_layout() == 'featured_images' ){ 
$fc_title = get_sub_field('fc_title');
$fc_images = get_sub_field('fc_images');
?>
<section class="mbc-fea-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mbc-fea-sec-inr">
          <div class="mbc-grids-sec-entry-hdr">
            <?php if( !empty($fc_title) ) printf('<h2 class="fl-h2 mbc-grids-sec-entry-hdr-title">%s</h2>', $fc_title); ?>
          </div>
          <?php if($fc_images): ?>
          <div class="mbc-fea-slider-ctlr">
            <div class="mbc-fea-slider-grds">
              <?php foreach( $fc_images as $image ): ?>
              <div class="mbc-fea-slider-grd-item">
                <div class="mbc-fea-slider-grd-item-img">
                  <?php echo !empty($image)?cbv_get_image_tag( $image ):''; ?>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
}elseif( get_row_layout() == 'gallery' ){ 
$fc_title = get_sub_field('fc_title');
$gallery = get_sub_field('fc_gallery');
$lightbox = get_sub_field('display_lightbox');
?>
<section class="mbc-gallery-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mbc-gallery-sec-inr">
          <div class="mbc-grids-sec-entry-hdr">
            <?php if( !empty($fc_title) ) printf('<h2 class="fl-h2 mbc-grids-sec-entry-hdr-title">%s</h2>', $fc_title); ?>
          </div>
          <?php if( $gallery ): ?>
          <div class="gallery-wrap clearfix">
            <div class="gallery gallery-columns-4">
              <?php 
                foreach( $gallery as $image ): 
                $lightboxImg = !empty($image)?cbv_get_image_src( $image ):'';
              ?>
              <figure class="gallery-item">
                <div class="gallery-icon portrait">
                  <?php if( isset($lightbox[0]) && $lightbox[0] == '1' ) echo "<a data-fancybox='gallery' href='{$lightboxImg}' class='overlay-link'></a>"; ?>
                  <div class="gallery-icon-img inline-bg" style="background: url('<?php echo !empty($image)?cbv_get_image_src( $image ):''; ?>');"></div>
                  <?php echo !empty($image)?cbv_get_image_tag( $image ):''; ?>
                </div>
              </figure>
              <?php endforeach; ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php }elseif( get_row_layout() == 'horizontal_line' ){ ?>
<hr>
<?php }elseif( get_row_layout() == 'gap' ){ 
  $fc_gap = get_sub_field('fc_gap');
?>
<div class="gap-<?php echo $fc_gap; ?>"></div>
<?php } ?>
<?php endwhile; ?>
</div>
<?php get_template_part('templates/contact', 'sec'); ?>
<?php get_footer(); ?>
<?php 
/*Template Name: Services*/
get_header(); 
$thisID = get_the_ID();
$customtitle = get_field('custom_title', $thisID);
$page_title = !empty($customtitle)? $customtitle: get_the_title($thisID);
$intro = get_field('intro', $thisID);
$introtitle = !empty($intro['title'])?$intro['title']:$page_title;
?>
<?php get_template_part('templates/page', 'banner'); ?>
  <section class="breadcrumb-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-sec-inr">
            <ul class="reset-list clearfix">
              <li class="home"><a href="<?php echo esc_url(home_url('/')); ?>"><span>Home</span></a></li>
              <li class="active"><span><?php echo $page_title; ?></span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
<section class="mbc-service-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mbc-service-sec-inr">
          <div class="sec-entry-hdr">
            <h2 class="mbc-sec-entry-hdr-title fl-h4"><?php echo $introtitle; ?></h2>
          </div>
          <?php echo do_shortcode('[ajax_services]'); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
$showhide_pstatus = get_field('showhide_pstatus', HOMEID);
if($showhide_pstatus): 
$projects = get_field('projectstatus', HOMEID);
if($projects):
?>
<section class="mbc-project-count-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mbc-project-count-sec-inr">
          <div class="mbc-project-count-grds">
            <?php foreach( $projects as $project ): ?>
            <div class="mbc-project-count-grd-item">
              <div class="mbc-project-count-grd-item-inr">
                <div class="mbc-project-count-number">
                  <i><?php if( !empty($project['icon']) ) echo cbv_get_image_tag($project['icon']); ?></i>
                  <?php if( !empty($project['Total_projects']) ) printf('<span class="counter">%s</span>', $project['Total_projects']); ?>
                </div>
                <div class="mbc-project-count-des">
                  <?php 
                    if( !empty($project['title']) ) printf('<h2 class="mbc-project-count-des-title fl-h5">%s</h2>', $project['title']);
                    if( !empty($project['description']) ) echo wpautop( $project['description'] ); 
                  ?>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endif; ?>
<?php
$showhide_slide = get_field('showhide_slide', $thisID);
if($showhide_slide): 
$slides = get_field('slides', $thisID);
$slidebg = get_field('slide_bg_image', $thisID);
if($slides):
?>
<section class="mbc-option-break-slider-sec inline-bg" style="background:url(<?php echo !empty($slidebg)?cbv_get_image_src($slidebg):''; ?>);">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
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
                <?php if( !empty($slide['description']) ) printf('<h2 class="mbc-opb-slider-title fl-h2">%s</h2>', $slide['description']); ?>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endif; ?>
<?php get_template_part('templates/contact', 'sec'); ?>
<?php get_footer(); ?>
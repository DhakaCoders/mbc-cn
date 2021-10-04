<?php
  $thisID = get_the_ID();
  $bannerID = get_field('banner', $thisID);
  $banner = !empty($bannerID)? cbv_get_image_src($bannerID): banner_placeholder();
?>
<section class="page-banner">
  <div class="page-banner-bg-black"></div>
  <div class="page-bnr-bg inline-bg" style="background-image: url('<?php echo $banner; ?>');"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-bnr-cntlr">
          <div class="page-bnr-desc">
            <h1 class="fl-h1 page-bnr-title"><?php echo get_the_title($thisID); ?></h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
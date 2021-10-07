 <?php 
get_header(); 
$banner = banner_placeholder();
?>
  <section class="page-banner">
    <div class="page-banner-bg-black"></div>
    <div class="page-bnr-bg inline-bg" style="background-image: url('<?php echo $banner; ?>');"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="page-bnr-cntlr">
            <div class="page-bnr-desc">
              <h1 class="fl-h1 page-bnr-title">Error</h1>
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
              <li class="home"><a href="<?php echo esc_url(home_url('/')); ?>"><span>Home</span></a></li>
              <li class="active"><span>error</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="page-404-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-404-dsc-wrp">
          <h2 class="title-404">404!</h2>
          <span>We keep focus on details.</span>
          <p>It looks like nothing was found at this location.</p>
          <div class="page-404-btn clearfix">
            <a class="mbc-transparent-btn" href="<?php echo esc_url(home_url('/')); ?>">HOME</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_template_part('templates/contact', 'sec'); ?>
<?php get_footer(); ?>
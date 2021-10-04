<?php get_header(); ?>
<div class="home-body-cntlr">
<?php  
  $hbanner = get_field('banner', HOMEID);
  if($hbanner):
  $banner = !empty($hbanner['image'])? cbv_get_image_src( $hbanner['image'] ): '';
?>
<section class="hm-banner hm-banner-v2">
  <?php if( !empty($hbanner['upload_video']) ): ?>
  <div class="hm-banner-play-btn">
    <div class="hm-banner-play-icon">
      <a class="" href="#">
        <i id="play-icon" class="fas fa-play-circle"></i>
        <!-- <i>
          <svg class="play-btn-icon" width="88" height="88" viewBox="0 0 88 88" fill="#fff">
            <use xlink:href="#play-btn-icon"></use>
          </svg> 
        </i> -->
        <i id="pause-icon" class="fas fa-pause-circle"></i>
      </a>
    </div>
    <h4 class="fl-h4 hm-banner-play-title">play promotional video</h4>
  </div>

  <div class="bnr-vdo">
    <video id="bt-vdo" autoplay="" muted="">
      <source src="<?php echo $hbanner['upload_video']; ?>" type="video/mp4">
          Your browser does not support HTML5 video.
    </video>
  </div> 
  <?php endif; ?>

  <div class="hm-banner-bg-black"></div>
  <div class="hm-bnr-bg inline-bg" style="background-image: url('<?php echo $banner; ?>');"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="hm-bnr-cntlr">
          <div class="hm-bnr-desc">
            <?php 
              if( !empty($hbanner['title']) ) printf('<h1 class="fl-h1 hm-bnr-title">%s</h1>', $hbanner['title']);
              $hbannerlink = $hbanner['link'];
              if( is_array( $hbannerlink ) &&  !empty( $hbannerlink['url'] ) ){
                  printf('<div class="hm-bnr-btn"><a class="mbc-white-btn" href="%s" target="%s">%s</a></div>', $hbannerlink['url'], $hbannerlink['target'], $hbannerlink['title']); 
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php
$showhide = get_field('showhide', HOMEID);
if($showhide): 
$intro = get_field('introsec', HOMEID);
if($intro):
?>
<section class="hm-about-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="about-con-cntlr">
          <div class="about-lft-des">
            <div class="about-sec-entry-hdr">
              <?php  if( !empty($intro['title']) ) printf('<h2 class="about-sec-entry-hdr-ttitle fl-h4">%s</h2>', $intro['title']); ?>
            </div>
            <?php if( !empty($intro['description']) ) echo wpautop( $intro['description'] ); ?>
            <?php if( !empty($intro['quote_text']) ): ?>
            <blockquote>
              <h3 class="about-sec-mgs-title fl-h2"><?php printf('“%s”', $intro['quote_text']); ?></h3>
            </blockquote>
            <?php endif; ?>
            <?php 
            $introlink = $intro['link'];
            if( is_array( $introlink ) &&  !empty( $introlink['url'] ) ){
                printf('<div class="about-sec-btn"><a class="mbc-transparent-btn" href="%s" target="%s">%s</a></div>', $introlink['url'], $introlink['target'], $introlink['title']); 
            }
            ?>
          </div>
          <div class="about-rgt-img">
            <div class="about-img-cntlr">
              <?php if( !empty($intro['image']) ) echo cbv_get_image_tag($intro['image']); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endif; ?>
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
<section class="mbc-service-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mbc-service-sec-inr">
          <div class="sec-entry-hdr">
            <h2 class="mbc-sec-entry-hdr-title fl-h4">our services</h2>
          </div>
          <div class="mbc-service-grds">
            <ul class="reset-list clearfix">
              <li>
                <div class="mbc-service-grd-item">
                  <a href="#" class="overlay-link"></a>
                  <div class="mbc-service-grd-item-img-ctlr mHc">
                    <div class="mbc-service-grd-item-img inline-bg" style="background:url(<?php echo THEME_URI; ?>/assets/images/mbc-service-landing-img-01.jpg)">
                      <img src="<?php echo THEME_URI; ?>/assets/images/mbc-service-landing-img-01.jpg">
                    </div>
                  </div>
                  <div class="mbc-service-grd-item-des mHc1">
                    <h3 class="mbc-service-grd-des-title fl-h5"><a href="#">1. Civil Construction & Maintenance</a></h3>
                  </div>
                </div>
              </li>
              <li>
                <div class="mbc-service-grd-item">
                  <a href="#" class="overlay-link"></a>
                  <div class="mbc-service-grd-item-img-ctlr mHc">
                    <div class="mbc-service-grd-item-img inline-bg" style="background:url(<?php echo THEME_URI; ?>/assets/images/mbc-service-landing-img-02.jpg)">
                      <img src="<?php echo THEME_URI; ?>/assets/images/mbc-service-landing-img-02.jpg">
                    </div>
                  </div>
                  <div class="mbc-service-grd-item-des mHc1">
                    <h3 class="mbc-service-grd-des-title fl-h5"><a href="#">2. Concrete</a></h3>
                  </div>
                </div>
              </li>
              <li>
                <div class="mbc-service-grd-item">
                  <a href="#" class="overlay-link"></a>
                  <div class="mbc-service-grd-item-img-ctlr mHc">
                    <div class="mbc-service-grd-item-img inline-bg" style="background:url(<?php echo THEME_URI; ?>/assets/images/mbc-service-landing-img-03.jpg)">
                      <img src="<?php echo THEME_URI; ?>/assets/images/mbc-service-landing-img-03.jpg">
                    </div>
                  </div>
                  <div class="mbc-service-grd-item-des mHc1">
                    <h3 class="mbc-service-grd-des-title fl-h5"><a href="#">3. Infrastructure services</a></h3>
                  </div>
                </div>
              </li>
              <li>
                <div class="mbc-service-grd-item">
                  <a href="#" class="overlay-link"></a>
                  <div class="mbc-service-grd-item-img-ctlr mHc">
                    <div class="mbc-service-grd-item-img inline-bg" style="background:url(<?php echo THEME_URI; ?>/assets/images/mbc-service-landing-img-04.jpg)">
                      <img src="<?php echo THEME_URI; ?>/assets/images/mbc-service-landing-img-04.jpg">
                    </div>
                  </div>
                  <div class="mbc-service-grd-item-des mHc1">
                    <h3 class="mbc-service-grd-des-title fl-h5"><a href="#">4. Vacuum Excavation </a></h3>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="mbc-service-btn">
            <a class="mbc-transparent-btn" href="#">find out more</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="mbc-team-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mbc-team-sec-inr">
          <div class="mbc-grids-sec-entry-hdr">
            <h4 class="fl-h4 mbc-team-subtitle">leading the way</h4>
            <h2 class="fl-h3 mbc-grids-sec-entry-hdr-title">Meet the team</h2>
          </div>
          <div class="mbc-team-slider-ctlr">
            <div class="mbc-slider-prev-nxt">
              <span class="mbc-prev">
                
              </span>
              <span class="mbc-nxt"></span>
            </div>
            <div class="mbc-team-grds mbcTeamSlider">
              <div class="mbc-team-grd-item-ctlr">
                <div class="mbc-team-grd-item">
                  <a href="#" class="overlay-link"></a>
                  <div class="mbc-team-grd-item-img-ctlr">
                    <div class="mbc-team-grd-item-img">
                      <img src="<?php echo THEME_URI; ?>/assets/images/mbc-team-grd-item-img-01.png">
                    </div>
                  </div>
                  <div class="mbc-team-grd-item-des">
                    <h3 class="mbc-team-grd-des-title fl-h4"><a href="#">George Harrison,</a></h3>
                    <strong>CEO</strong>
                    <p>George has over 25 years experience in the mining industry and has filled a variety of technical and management roles covering Maintenance Coordinator, Sales Manager, Technical Support Manager and Product Development Manager.</p>
                  </div>
                </div>
              </div>
              <div class="mbc-team-grd-item-ctlr">
                <div class="mbc-team-grd-item">
                  <a href="#" class="overlay-link"></a>
                  <div class="mbc-team-grd-item-img-ctlr">
                    <div class="mbc-team-grd-item-img">
                      <img src="<?php echo THEME_URI; ?>/assets/images/mbc-team-grd-item-img-02.png">
                    </div>
                  </div>
                  <div class="mbc-team-grd-item-des">
                    <h3 class="mbc-team-grd-des-title fl-h4"><a href="#">Leo Matthews,</a></h3>
                    <strong>Lead Engineer</strong>
                    <p>Leo has over 25 years experience in the mining industry and has filled a variety of technical and management roles covering Maintenance Coordinator, Sales Manager, Technical Support Manager and Product Development Manager. </p>
                  </div>
                </div>
              </div>
              <div class="mbc-team-grd-item-ctlr">
                <div class="mbc-team-grd-item">
                  <a href="#" class="overlay-link"></a>
                  <div class="mbc-team-grd-item-img-ctlr">
                    <div class="mbc-team-grd-item-img">
                      <img src="<?php echo THEME_URI; ?>/assets/images/mbc-team-grd-item-img-03.png">
                    </div>
                  </div>
                  <div class="mbc-team-grd-item-des">
                    <h3 class="mbc-team-grd-des-title fl-h4"><a href="#">Michelle Fellows,</a></h3>
                    <strong>Stategist</strong>
                    <p>Michelle has over 25 years experience in the mining industry and has filled a variety of technical and management roles covering Maintenance Coordinator, Sales Manager, Technical Support Manager and Product Development Manager.</p>
                  </div>
                </div>
              </div>
              <div class="mbc-team-grd-item-ctlr">
                <div class="mbc-team-grd-item">
                  <a href="#" class="overlay-link"></a>
                  <div class="mbc-team-grd-item-img-ctlr">
                    <div class="mbc-team-grd-item-img">
                      <img src="<?php echo THEME_URI; ?>/assets/images/mbc-team-grd-item-img-04.png">
                    </div>
                  </div>
                  <div class="mbc-team-grd-item-des">
                    <h3 class="mbc-team-grd-des-title fl-h4"><a href="#">Matt Lindburg,</a></h3>
                    <strong>Engineering Technologist</strong>
                    <p>Matt has over 25 years experience in the mining industry and has filled a variety of technical and management roles covering Maintenance Coordinator, Sales Manager, Technical Support Manager and Product Development Manager.</p>
                  </div>
                </div>
              </div>
              <div class="mbc-team-grd-item-ctlr">
                <div class="mbc-team-grd-item">
                  <a href="#" class="overlay-link"></a>
                  <div class="mbc-team-grd-item-img-ctlr">
                    <div class="mbc-team-grd-item-img">
                      <img src="<?php echo THEME_URI; ?>/assets/images/mbc-team-grd-item-img-01.png">
                    </div>
                  </div>
                  <div class="mbc-team-grd-item-des">
                    <h3 class="mbc-team-grd-des-title fl-h4"><a href="#">George Harrison,</a></h3>
                    <strong>CEO</strong>
                    <p>George has over 25 years experience in the mining industry and has filled a variety of technical and management roles covering Maintenance Coordinator, Sales Manager, Technical Support Manager and Product Development Manager.</p>
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

<section class="careers-grid-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="sec-entry-hdr">
          <h2 class="mbc-sec-entry-hdr-sub-title fl-h4">industry news</h2>
          <h3 class="mbc-sec-entry-hdr-title fl-h3">Nulla vel elit nec diam pretium</h3>
        </div>
        <div class="news-grids-cntlr">
          <ul class="reset-list">
            <li>
              <div class="news-grid-item">
                <div class="news-grid-img-cntlr has-inline-bg">
                  <a class="overlay-link" href="#"></a>
                  <div class="inline-bg" style="background-image: url(<?php echo THEME_URI; ?>/assets/images/news-grid-1.jpg);"></div>
                  <img src="<?php echo THEME_URI; ?>/assets/images/news-grid-1.jpg" alt="">
                </div>
                <div class="news-grid-des">
                  <div class="news-grid-des-title">
                    <h5 class="news-grid-title fl-h5 mHc"><a href="#">Name of News Article, July 2021</a></h5>
                  </div>
                  <div class="news-grid-btn">
                    <a href="#">Read more</a>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="news-grid-item">
                <div class="news-grid-img-cntlr has-inline-bg">
                  <a class="overlay-link" href="#"></a>
                  <div class="inline-bg" style="background-image: url(<?php echo THEME_URI; ?>/assets/images/news-grid-2.jpg);"></div>
                  <img src="<?php echo THEME_URI; ?>/assets/images/news-grid-2.jpg" alt="">
                </div>
                <div class="news-grid-des">
                  <div class="news-grid-des-title">
                    <h5 class="news-grid-title fl-h5 mHc"><a href="#">Name of News Article, July 2021</a></h5>
                  </div>
                  <div class="news-grid-btn">
                    <a href="#">Read more</a>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <div class="news-grid-item">
                <div class="news-grid-img-cntlr has-inline-bg">
                  <a class="overlay-link" href="#"></a>
                  <div class="inline-bg" style="background-image: url(<?php echo THEME_URI; ?>/assets/images/news-grid-3.jpg);"></div>
                  <img src="<?php echo THEME_URI; ?>/assets/images/news-grid-3.jpg" alt="">
                </div>
                <div class="news-grid-des">
                  <div class="news-grid-des-title">
                    <h5 class="news-grid-title fl-h5 mHc"><a href="#">Name of News Article, July 2021</a></h5>
                  </div>
                  <div class="news-grid-btn">
                    <a href="#">Read more</a>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="news-grids-btn">
          <a class="mbc-transparent-btn" href="#">FIND OUT MORE</a>
        </div>
      </div>
    </div>
  </div>
</section>
</div>



<div class="modal fade show" id="mbc-mdl-btn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-right:0;">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-body">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <i></i>
      </button>
      <div class="modal-form-cntlr">
        <div class="contact-form-title-cntlr">
          <h4 class="contact-form-sub-title fl-h4">contact</h4>
          <h3 class="contact-form-title fl-h3">Get in touch</h3>
        </div> 
        <div class="contact-form-wrp clearfix">
          <div class="wpforms-container">
            <div class="wpforms-form needs-validation novalidate">
              <div class="wpforms-field-container">
                <div class="wpforms-field XsNameField">
                  <input type="text" name="name" placeholder="First Name" required="">
                  <label id="wpforms-222-field_1-error" class="wpforms-error" for="wpforms-222-field_1">Check this field!</label>
                </div>
                <div class="wpforms-field NameField">
                  <input type="text" name="text" placeholder="Last Name" required="">
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
                <div class="wpforms-field FullWidthField">
                  <input type="text" name="text" placeholder="Position applying for" required="">
                  <label id="wpforms-222-field_1-error" class="wpforms-error" for="wpforms-222-field_1">Check this field!</label>
                </div>
                <div class="wpforms-field wpforms-field-textarea">
                  <textarea name="message" placeholder="Write your message here"></textarea>
                </div>
              </div>
              <div class="wpforms-submit-container">
                <button type="submit" name="submit" class="wpforms-submit">contact us</button>
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
<?php get_template_part('templates/contact', 'sec'); ?>
<?php get_footer(); ?>
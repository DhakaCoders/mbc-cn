<?php 
/*Template Name: Position Available*/
get_header(); 
$thisID = get_the_ID();
?>
<?php get_template_part('templates/page', 'banner'); ?>
<?php get_template_part('templates/breadcrumbs'); ?>
<?php
$intro = get_field('intro', $thisID);
if($intro):
?>
<section class="mbc-position-available-con-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mbc-position-available-con-sec-inr">
          <div class="mbc-position-available-des">
            <?php 
              if( !empty($intro['title']) ) printf('<h2 class="fl-h4 pa-des-title">%s</h2>', $intro['title']); 
              if( !empty($intro['description']) ) echo wpautop( $intro['description'] ); 
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php
$showhide_form = get_field('showhide_form', $thisID);
if($showhide_form): 
$form = get_field('formsec', $thisID);
if($form):
?>
<section class="mbc-position-available-form-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mbc-position-available-form-sec-inr">
          <div class="mbc-pa-form-hdr">
            <?php if( !empty($form['title']) ) printf('<h2 class="mbc-pa-form-hdr-title fl-h4">%s</h2>', $form['title']); ?>
          </div>
          <div class="mbc-pa-form">
            <form>
              <h3 class="fl-h5">Step 1: get in touch</h3>
              <p>We welcome you to send through your CV referencing your past experience and credentials as we are always on the hunt for great staff.</p>
              <div class="input-field-row">
                <input type="text" name="subject" placeholder="Subject">
              </div>
              <div class="input-field-row">
                <input type="text" name="name" placeholder="Name">
              </div>
              <div class="input-field-row">
                <input type="email" name="email" placeholder="Email">
              </div>
              <div class="input-field-row">
                <input type="telephone" name="phone" placeholder="Phone">
              </div>
              <div class="gap-30"></div>
              <h3 class="fl-h5">Step 2: upload your cv</h3>
              <p>Upload CV</p>
              <div class="input-field-row">
                <input type="file" name="">
              </div>
              <div class="gap-30"></div>
              <h3 class="fl-h5">Step 3: submit</h3>
              <div class="input-field-row">
                <input type="submit" name="submit" value="apply ">
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endif; ?>
<?php
$showhide_news = get_field('showhide_news', $thisID);
if($showhide_news): 
$news = get_field('newssec', $thisID);
if($news):
?>
<div class="postion-available-ctlr">
  <section class="news-grid-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="sec-entry-hdr">
            <?php 
              if( !empty($news['title']) ) printf('<h2 class="mbc-sec-entry-hdr-sub-title fl-h4">%s</h2>', $news['title']); 
              if( !empty($news['subtitle']) ) printf('<h3 class="mbc-sec-entry-hdr-title fl-h3">%s</h3>', $news['subtitle']); 
            ?>
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
                      <h3 class="news-grid-title fl-h5 mHc"><a href="#">Name of News Article, July 2021</a></h3>
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
                      <h3 class="news-grid-title fl-h5 mHc"><a href="#">Name of News Article, July 2021</a></h3>
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
                      <h3 class="news-grid-title fl-h5 mHc"><a href="#">Name of News Article, July 2021</a></h3>
                    </div>
                    <div class="news-grid-btn">
                      <a href="#">Read more</a>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="pa-news-grd-btn">
            <a class="mbc-transparent-btn" href="#">find out more</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php endif; ?>
<?php endif; ?>
<?php get_template_part('templates/contact', 'sec'); ?>
<?php get_footer(); ?>
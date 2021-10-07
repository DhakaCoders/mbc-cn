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
<?php
$showhide_services = get_field('showhide_services', HOMEID);
if($showhide_services): 
$service = get_field('servicesec', HOMEID);
if($service):
?>
<section class="mbc-service-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mbc-service-sec-inr">
          <div class="sec-entry-hdr">
            <?php if( !empty($service['title']) ) printf('<h2 class="mbc-sec-entry-hdr-title fl-h4">%s</h2>', $service['title']); ?>
          </div>
          <?php 
          $servobj = $service['select_service'];
          if( empty($servobj) ){
              $servobj = get_posts( array(
                'post_type' => 'service',
                'posts_per_page'=> 4,
                'orderby' => 'rand'

              ) );  
          }
          if($servobj){ 
          ?>
          <div class="mbc-service-grds">
            <ul class="reset-list clearfix">
              <?php 
                $i = 1; 
                foreach( $servobj as $serv ) :
                $servimgID = get_post_thumbnail_id($serv->ID);
                $servimgtag = !empty($servimgID)? cbv_get_image_tag($servimgID): services_placeholder('tag'); 
                $servimgURL = !empty($servimgID)? cbv_get_image_src($servimgID): services_placeholder(); 
              ?> 
              <li>
                <div class="mbc-service-grd-item">
                  <a href="<?php echo get_the_permalink($serv->ID); ?>" class="overlay-link"></a>
                  <div class="mbc-service-grd-item-img-ctlr mHc">
                    <div class="mbc-service-grd-item-img inline-bg" style="background:url(<?php echo $servimgURL; ?>)">
                      <?php echo $servimgtag; ?>
                    </div>
                  </div>
                  <div class="mbc-service-grd-item-des mHc1">
                    <h3 class="mbc-service-grd-des-title fl-h5"><a href="<?php echo get_the_permalink($serv->ID); ?>"><?php echo $i; ?>. <?php echo get_the_title($serv->ID); ?></a></h3>
                  </div>
                </div>
              </li>
              <?php $i++; endforeach; ?>
            </ul>
          </div>
          <div class="mbc-service-btn">
            <a class="mbc-transparent-btn" href="<?php echo esc_url(get_link_by_page_template('page-service-landing.php')); ?>">find out more</a>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endif; ?>
<?php
$showhide_team = get_field('showhide_team', HOMEID);
if($showhide_team): 
$teams = get_field('teamsec', HOMEID);
if($teams):
?>
<section class="mbc-team-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mbc-team-sec-inr">
          <div class="mbc-grids-sec-entry-hdr">
            <?php
              if( !empty($teams['title']) ) printf('<h4 class="fl-h4 mbc-team-subtitle">%s</h4>', $teams['title']);
              if( !empty($teams['title']) ) printf('<h2 class="fl-h3 mbc-grids-sec-entry-hdr-title">%s</h2>', $teams['title']);
            ?>
          </div>
          <?php 
          $memberobj = $teams['select_teams'];
          if( empty($memberobj) ){
              $memberobj = get_posts( array(
                'post_type' => 'team-members',
                'posts_per_page'=> -1,
                'orderby' => 'rand'

              ) );  
          }
          if($memberobj){ 
          ?>
          <div class="mbc-team-slider-ctlr">
            <div class="mbc-slider-prev-nxt">
              <span class="mbc-prev">
                
              </span>
              <span class="mbc-nxt"></span>
            </div>
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
                    <h3 class="mbc-team-grd-des-title fl-h4">
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
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endif; ?>
<?php
$showhide_news = get_field('showhide_news', HOMEID);
if($showhide_news): 
$news = get_field('newssec', HOMEID);
if($news):
?>
<section class="careers-grid-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="sec-entry-hdr">
          <?php
            if( !empty($news['title']) ) printf('<h2 class="mbc-sec-entry-hdr-sub-title fl-h4">%s</h2>', $news['title']);
            if( !empty($news['title']) ) printf('<h3 class="mbc-sec-entry-hdr-title fl-h3">%s</h3>', $news['title']);
          ?>
        </div>
          <?php 
          $newsIDs = $news['select_news'];
          if( !empty($newsIDs) ){
            $query = new WP_Query(array(
              'post_type' => 'post',
              'posts_per_page'=> count($newsIDs),
              'post__in' => $newsIDs,
              'orderby' => 'rand'

            ));
          }else{
            $query = new WP_Query(array(
              'post_type' => 'post',
              'posts_per_page'=> 3,
              'orderby' => 'rand'

            ));
          }
          if($query->have_posts()){ 
          ?>
        <div class="news-grids-cntlr">
          <ul class="reset-list">
            <?php 
                while($query->have_posts()): $query->the_post(); 
                global $post;
                $imgID = get_post_thumbnail_id(get_the_ID());
                $imgsrc = !empty($imgID)? cbv_get_image_src($imgID): news_placeholder();
                $imgtag = !empty($imgID)? cbv_get_image_tag($imgID): news_placeholder('tag');
            ?>
            <li>
              <div class="news-grid-item">
                <div class="news-grid-img-cntlr has-inline-bg">
                  <a class="overlay-link" href="<?php the_permalink(); ?>"></a>
                    <div class="inline-bg" style="background-image: url(<?php echo $imgsrc; ?>);"></div>
                    <?php echo $imgtag; ?>
                </div>
                <div class="news-grid-des">
                  <div class="news-grid-des-title">
                    <h5 class="news-grid-title fl-h5 mHc"><a href="<?php the_permalink(); ?>"><?php the_title(); ?>, <?php echo get_the_date('F Y'); ?></a></h5>
                  </div>
                  <div class="news-grid-btn">
                    <a href="<?php the_permalink(); ?>">Read more</a>
                  </div>
                </div>
              </div>
            </li>
            <?php endwhile; ?>
          </ul>
        </div>
        <div class="news-grids-btn">
          <a class="mbc-transparent-btn" href="<?php echo get_the_permalink(get_option( 'page_for_posts' )); ?>">VIEW ALL</a>
        </div>
        <?php } wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
</section>
</div>
<?php endif; ?>
<?php endif; ?>
<?php get_template_part('templates/contact', 'sec'); ?>
<?php get_footer(); ?>
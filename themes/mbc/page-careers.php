<?php 
/*Template Name: Careers*/
get_header(); 
$thisID = get_the_ID();
?>
<?php get_template_part('templates/page', 'banner'); ?>
<?php get_template_part('templates/breadcrumbs'); ?>
<?php
$intro = get_field('intro', $thisID);
if($intro):
?>
<section class="careers-intro-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="sec-entry-hdr">
          <?php 
            if( !empty($intro['title']) ) printf('<h2 class="mbc-sec-entry-hdr-sub-title fl-h4">%s</h2>', $intro['title']); 
            if( !empty($intro['subtitle']) ) printf('<h3 class="mbc-sec-entry-hdr-title fl-h3">%s</h3>', $intro['subtitle']); 
          ?>
        </div>
        <div class="careers-intro-sec-inr">
          <div class="mbc-columns mbc-columns-2 only-text">
            <?php if( !empty($intro['text_1']) ): ?>
            <div class="mbc-grid-item">
              <div class="mbc-grid-item-inr">
                 <?php echo wpautop( $intro['text_1'] ); ?>
              </div>
            </div>
            <?php endif; ?>
            <?php if( !empty($intro['text_2']) ): ?>
            <div class="mbc-grid-item">
              <div class="mbc-grid-item-inr">
                <?php echo wpautop( $intro['text_2'] ); ?>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php
  $args = array( 
    'post_type' => 'career', 
    'posts_per_page' => 4, 
    'orderby' => 'title',
    'order' => 'desc'  
  );
  $query = new WP_Query( $args );  
?>
  <section class="full-width-img-bleed-sec">
    <div class="full-width-img-bleed-sec-rows-cntlr">
      <?php if ( $query->have_posts() ) : ?>
      <ul class="reset-list clearfix">
      <?php
        $i = 1;
        while ( $query->have_posts() ) : $query->the_post(); 
          $careerimgID = get_post_thumbnail_id(get_the_ID());
          $careertionsFeaImg = !empty($careerimgID)? cbv_get_image_src($careerimgID): career_placeholder();
          $careertionsFeatag = !empty($careerimgID)? cbv_get_image_tag($careerimgID): career_placeholder('tag');
      ?>
        <li>
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="full-width-img-des-cntlr<?php echo ($i%2 != 0)?' left-des-rgt-img':''; ?>">
                  <div class="full-width-img-des-lft mHc">
                    <div class="full-width-img-cntlr">
                      <div class="inline-bg" style="background-image: url(<?php echo $careertionsFeaImg; ?>);"></div>
                      <?php echo $careertionsFeatag; ?>
                    </div>
                  </div>
                  <div class="full-width-img-des-rgt mHc">
                    <div class="full-width-des-innr">
                      <h3 class="full-width-des-title fl-h4"><?php the_title(); ?></h3>
                      <?php the_excerpt(); ?>
                      <a class="mbc-white-transparent-btn" href="<?php echo get_link_by_page_template('page-position-available.php'); ?>">apply</a>
                    </div>
                  </div>            
                </div>
              </div>
            </div>
          </div>
        </li>
        <?php $i++; endwhile; ?>
      </ul>
      <?php endif; wp_reset_postdata(); ?> 
    </div>
  </section>
<?php
$showhide_news = get_field('showhide_news', $thisID);
if($showhide_news): 
$news = get_field('newssec', $thisID);
if($news):
?>
  <section class="careers-grid-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="sec-entry-hdr">
            <?php 
              if( !empty($news['title']) ) printf('<h2 class="mbc-sec-entry-hdr-sub-title fl-h4">%s</h2>', $news['title']); 
              if( !empty($news['subtitle']) ) printf('<h3 class="mbc-sec-entry-hdr-title fl-h3">%s</h3>', $news['subtitle']); 
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
<?php endif; ?>
<?php endif; ?>
<?php
$showhide_testimonial = get_field('showhide_testimonial', $thisID);
if($showhide_testimonial): 
$qouts_obj = get_field('select_testimonial', $thisID);
$testiobj = get_sub_field('select_testimonial');
if( empty($testiobj) ){
    $testiobj = get_posts( array(
      'post_type' => 'testimonials',
      'posts_per_page'=> -1,
      'orderby' => 'date',
      'order'=> 'asc',

    ) );  
}
if($testiobj):
?>
  <section class="careers-text-slider-ctlr">
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
                  <?php if( !empty($testi->post_content) ): ?>
                  <h2 class="mbc-text-slider-title fl-h2">“<?php echo $testi->post_content; ?>” </h2>
                  <?php endif; ?>
                  <h3 class="mbc-text-slider-sub-title fl-h4"><?php echo get_the_title($testi->ID); ?></h3>
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
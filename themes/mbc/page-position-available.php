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
          <?php if( !empty($form['title']) ): ?>
          <div class="mbc-pa-form"><?php echo do_shortcode($form['shortcode']); ?></div>
          <?php endif; ?>
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
                      <h3 class="news-grid-title fl-h5 mHc"><a href="<?php the_permalink(); ?>"><?php the_title(); ?>, <?php echo get_the_date('F Y'); ?></a></h3>
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
          <div class="pa-news-grd-btn">
            <a class="mbc-transparent-btn" href="<?php echo get_the_permalink(get_option( 'page_for_posts' )); ?>">find out more</a>
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
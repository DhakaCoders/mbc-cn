<?php 
get_header(); 
$thisID = get_option( 'page_for_posts' );
$customtitle = get_field('custom_title', $thisID);
$page_title = !empty($customtitle)? $customtitle: get_the_title($thisID);
$imgID = get_field('banner', $thisID);
$banner = !empty($imgID)?cbv_get_image_src($imgID):banner_placeholder();
?>
  <section class="page-banner">
    <div class="page-banner-bg-black"></div>
    <div class="page-bnr-bg inline-bg" style="background-image: url('<?php echo $banner; ?>');"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="page-bnr-cntlr">
            <div class="page-bnr-desc">
              <h1 class="fl-h1 page-bnr-title"><?php echo $page_title; ?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php get_template_part('templates/breadcrumbs'); ?>
<?php 
$intro = get_field('intro', $thisID);
$introtitle = !empty($intro['title'])?$intro['title']:$page_title;
?>
  <section class="news-grid-sec">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="sec-entry-hdr">
            <h2 class="mbc-sec-entry-hdr-sub-title fl-h4"><?php echo $introtitle; ?></h2>
            <?php if( !empty($intro['subtitle']) ) printf('<h3 class="mbc-sec-entry-hdr-title fl-h3">%s</h3>', $intro['subtitle']); ?>
          </div>
          <?php if(  have_posts() ): ?>
          <div class="news-grids-cntlr">
            <ul class="reset-list">
              <?php 
                  while(have_posts()): the_post(); 
                  global $post;
                  $imgID = get_post_thumbnail_id(get_the_ID());
                  $imgsrc = !empty($imgID)? cbv_get_image_src($imgID): news_placeholder('tag');
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
                      <h3 class="news-grid-title fl-h5 mHc"><a href="<?php the_permalink(); ?>"><?php the_title(); ?>,<?php echo get_the_date('F Y'); ?></a></h3>
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
          <?php else: ?>
              <div class="notfound">No Results.</div>
          <?php endif; ?>
          <?php 
          global $wp_query;
          if( $wp_query->max_num_pages > 1 ): 
          ?>
          <div class="fl-pagination-blog-cntrl">
            <div class="fl-pagination-ctlr">
                <?php
                  $big = 999999999; // need an unlikely integer
                  $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

                  echo paginate_links( array(
                    'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'type'      => 'list',
                    'prev_text' => __(''),
                    'next_text' => __(''),
                    'format'    => '?paged=%#%',
                    'current'   => $current,
                    'total'     => $wp_query->max_num_pages
                  ) );
                ?>
            </div>
          </div>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
<?php get_template_part('templates/contact', 'sec'); ?>
<?php get_footer(); ?>
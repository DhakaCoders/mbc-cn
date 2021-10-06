<?php 
/*Template Name: Case Studies*/
get_header(); 
$thisID = get_the_ID();
?>
<?php get_template_part('templates/page', 'banner'); ?>
<?php get_template_part('templates/breadcrumbs'); ?>
<?php 
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $query = new WP_Query(array(
    'post_type' => 'case-study',
    'posts_per_page'=> 9,
    'orderby' => 'date',
    'order'=> 'desc',
    'paged'=>$paged

  ));
?>
<section class="news-grid-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="sec-entry-hdr">
          <h2 class="mbc-sec-entry-hdr-sub-title fl-h4">CASE STUDIES</h2>
          <h3 class="mbc-sec-entry-hdr-title fl-h3">Take a look at some of our projects</h3>
        </div>
        <div class="news-grids-cntlr">
          <?php if( $query->have_posts() ): ?>
          <ul class="reset-list">
          <?php 
              while($query->have_posts()): $query->the_post(); 
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
          <?php else: ?>
              <div class="notfound">No Results.</div>
          <?php endif; wp_reset_postdata(); ?>
        </div>
        <?php if( $query->max_num_pages > 1 ): ?>
        <div class="fl-pagination-blog-cntrl">
          <div class="fl-pagination-ctlr">
          <?php
            $big = 999999999; // need an unlikely integer
            $query->query_vars['paged'] > 1 ? $current = $query->query_vars['paged'] : $current = 1;

            echo paginate_links( array(
              'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              'type'      => 'list',
              'prev_next' => false,
              'prev_text' => __(''),
              'next_text' => __(''),
              'format'    => '?paged=%#%',
              'current'   => $current,
              'total'     => $query->max_num_pages
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
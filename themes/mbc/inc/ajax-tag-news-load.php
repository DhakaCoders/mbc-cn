<?php
/*
 * initial posts dispaly
 */
function tag_script_load_more($args = array()) {
	$queried_object = get_queried_object();
	$results = tag_cbv_load_more_a($args, $queried_object->slug);
  $output = '';
	$output .='<div class="news-landing-grids-cntlr" id="tag_slug" data-slug="'.$queried_object->slug.'">';
  $output .='<ul class="reset-list clearfix" id="ajax-content">';
	$output .= $results['output'];
  $output .= '</ul>';
	$output .= '</div>';
	if( $results['btn'] ){
	  $output .= '<div class="news-landing-grid-sec-btn">';
	  $output .= '<div class="ajaxloading" id="ajxaloader1" style="display:none"><img src="'.get_template_directory_uri().'/assets/images/loading.gif" alt="loader"></div>';
	  $output .= '<a class="fl-transparent-btn" href="#" id="tag_loadMore"  data-page="1" data-url="'.admin_url("admin-ajax.php").'" >load more</a>';
	  $output .= '</div>';
	}
return $output;
}
/*
 * create short code.
 */
add_shortcode('ajax_tag_posts', 'tag_script_load_more');

function tag_cbv_load_more_a($args, $catslug = '') {
	
	//number of posts per page default
	$num = 1;
	//page number
	$query = new WP_Query(array( 
	    'post_type'=> 'post',
	    'post_status' => 'publish',
	    'posts_per_page' =>$num,
	    'order'=> 'DESC',
	    'tax_query' => array(
	    	array(
					'taxonomy' => 'post_tag',
	        'field'    => 'slug',
	        'terms'    => $catslug    	
	      )
	    )
	  ) 
	);

	$output = '';
	$totalpost = $query->found_posts;
	if($query->have_posts()): 

	    while($query->have_posts()): $query->the_post(); 
	      $thumbID = get_post_thumbnail_id(get_the_ID());
	      $thumb = !empty($thumbID)? cbv_get_image_src($thumbID): news_placeholder();
	      $thumbtag = !empty($thumbID)? cbv_get_image_tag($thumbID): news_placeholder('tag');
	      $tags = get_the_tags(get_the_ID());
	      $tagname = $taglink = '';
	      if( !empty($tags) ){
		      foreach($tags as $tag){
		      	$tagname = $tag->name;
		      	$taglink = get_tag_link( $tag );
		      }
	    	}
				$output .='<li>';
				$output .='<div class="news-landing-grid-item">';
				$output .='<div class="news-landing-grid-item-inr">';
				$output .='<div class="news-landing-grid-img-cntlr has-inline-bg">';
				$output .='<a class="overlay-link" href="'.get_the_permalink().'"></a>';
				$output .='<div class="inline-bg" style="background-image: url('.$thumb.');"></div>';
				$output .= $thumbtag;
				$output .='</div>';
				$output .='<div class="news-landing-grid-des">';
				$output .='<div class="news-lod-post-date">';
				$output .='<span>'.get_the_date('F Y').'</span>';
				$output .='</div>';
				$output .='<h2 class="news-landing-grid-title fl-h6"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';
				if( !empty($tagname) ) $output .='<strong><a href="'.$taglink.'">#'.$tagname.'</a></strong>';
				$output .='</div>';
				$output .='</div>';
				$output .='</div>';
				$output .='</li>';
	   endwhile; 
	  else:
	  	$output .='<div class="no-result">No Result.</div>';
	  endif; 
	wp_reset_postdata();
	if( $totalpost > $num ) 
		$show_btn = true;
	else
		$show_btn = false;
	return array('btn'=> $show_btn, 'output' => $output);
}

/*
 * load more script call back
 */
function tag_ajax_script_load_more($args, $catslug = '') {
	//init ajax
	$ajax = false;
	//check ajax call or not
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
	strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	$ajax = true;
	}
	
	//number of posts per page default
	$num = 1;
	//page number
	if( isset($_POST['page']) ){
		$paged = $_POST['page'] + 1;
	}else{
		$paged = 1;
	}
	if( isset($_POST['slug']) ){
		$catslug = $_POST['slug'];
	}
	$query = new WP_Query(array( 
	    'post_type'=> 'post',
	    'post_status' => 'publish',
	    'posts_per_page' =>$num,
	    'paged'=>$paged,
	    'order'=> 'DESC',
	    'tax_query' => array(
	    	array(
					'taxonomy' => 'post_tag',
	        'field'    => 'slug',
	        'terms'    => $catslug    	
	      )
	    )
	  ) 
	);
  if($query->have_posts()): 

      while($query->have_posts()): $query->the_post(); 
        $thumbID = get_post_thumbnail_id(get_the_ID());
        $thumb = !empty($thumbID)? cbv_get_image_src($thumbID): news_placeholder();
        $thumbtag = !empty($thumbID)? cbv_get_image_tag($thumbID): news_placeholder('tag');
        $tags = get_the_tags(get_the_ID());
	      $tagname = $taglink = '';
	      if( !empty($tags) ){
		      foreach($tags as $tag){
		      	$tagname = $tag->name;
		      	$taglink = get_tag_link( $tag );
		      }
	    	}
				echo '<li>';
				echo '<div class="news-landing-grid-item">';
				echo '<div class="news-landing-grid-item-inr">';
				echo '<div class="news-landing-grid-img-cntlr has-inline-bg">';
				echo '<a class="overlay-link" href="'.get_the_permalink().'"></a>';
				echo '<div class="inline-bg" style="background-image: url('.$thumb.');"></div>';
				echo $thumbtag;
				echo '</div>';
				echo '<div class="news-landing-grid-des">';
				echo '<div class="news-lod-post-date">';
				echo '<span>'.get_the_date('F Y').'</span>';
				echo '</div>';
				echo '<h2 class="news-landing-grid-title fl-h6"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h2>';
				if( !empty($tagname) ) echo '<strong><a href="'.$taglink.'">#'.$tagname.'</a></strong>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</li>';
     endwhile; 
    endif;  
wp_reset_postdata();
//check ajax call
if($ajax) wp_die();
}

/*
 * load more script ajax hooks
 */
add_action('wp_ajax_nopriv_tag_ajax_script_load_more', 'tag_ajax_script_load_more');
add_action('wp_ajax_tag_ajax_script_load_more', 'tag_ajax_script_load_more');
<?php 
  $contus = get_field('contus', 'options'); 
  if( $contus ):
?>
<section class="footer-top-sec inline-bg" style="background: url('<?php echo !empty($contus['image'])?cbv_get_image_src($contus['image']):''; ?>');">
<div class="container">
<div class="row">
  <div class="col-md-12">
    <div class="ftr-top-cntlr">
      <div class="ftr-top-desc">
        <?php if( !empty($contus['title']) ) printf('<h2 class="fl-h3 ftr-top-title">%s</h2>', $contus['title']); ?>
        <div class="ftr-top-btn">
          <?php 
            $contlink = $contus['link'];
            if( is_array( $contlink ) &&  !empty( $contlink['url'] ) ){
                printf('<a class="mbc-black-transparent-btn" href="%s" target="%s">%s</a>', $contlink['url'], $contlink['target'], $contlink['title']); 
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section>
<?php endif; ?>
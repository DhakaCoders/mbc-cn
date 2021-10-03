<?php 
  $logoObj = get_field('ftlogo', 'options');
  if( is_array($logoObj) ){
    $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
  }else{
    $logo_tag = '';
  }
  $telephone = get_field('telephone', 'options');
  $fax = get_field('fax', 'options');
  $email = get_field('emailaddres', 'options');
  $address = get_field('address', 'options');
  $gurl = get_field('gurl', 'options');
  $gmaplink = !empty($gurl)?$gurl: 'javascript:void()';
  $cooper = get_field('cooper_basin', 'options');
  $sinfo = get_field('social_media', 'options');
  $copyright_text = get_field('copyright_text', 'options');
?>
<footer class="footer-wrp">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="ftr-cntlr">
          <div class="ftr-topbar">
            <?php if( !empty($logo_tag) ): ?>
            <div class="ftr-logo">
              <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php echo $logo_tag; ?>
              </a>
            </div>
            <?php endif; ?>
            <?php if( $sinfo ): ?>
            <div class="ftr-socials-cntlr">
              <div class="ftr-socials">
                <ul class="reset-list">
                <?php 
                  if( !empty($sinfo['facebook_url']) ) printf('<li><a target="_blank" href="%s"><i class="fab fa-facebook-f"></i></a></li>', $sinfo['facebook_url']); 
                  if( !empty($sinfo['linkedin_url']) ) printf('<li><a target="_blank" href="%s"><i class="fab fa-linkedin-in"></i></a></li>', $sinfo['linkedin_url']);
                  if( !empty($sinfo['instagram_url']) ) printf('<li><a target="_blank" href="%s"><i class="fab fa-instagram"></i></a></li>', $sinfo['instagram_url']);  
                ?>
                </ul>
              </div>
            </div>
            <?php endif; ?>
          </div>
          <div class="ftr-col-cntlr clearfix">
            <div class="ftr-col ftr-col-01">
              <h6 class="fl-h6 ftr-col-title">adelaide</h6>
              <div class="ftr-details">
              <?php 
                if( !empty($address) ) printf('<div class="ftr-details-row ftr-addr"><a href="%s" target="_blank">%s</a></div>', $gmaplink, $address); 
                if( !empty($telephone) ) printf('<div class="ftr-details-row ftr-phone"><span>Phone: <a href="tel:%s">%s</a></span></div>', phone_preg($telephone), $telephone); 
                if( !empty($fax) ) printf('<div class="ftr-details-row ftr-fax"><span>Fax: <a href="tel:%s">%s</a></span></div>', phone_preg($fax), $fax); 
                if( !empty($email) ) printf('<div class="ftr-details-row ftr-mail"><span>Email: <a href="mailto:%s">%s</a></span></div>', $email, $email); 
                
              ?>
              </div>
            </div>
            <div class="ftr-col ftr-col-02">
              <h6 class="fl-h6 ftr-col-title">COOPER BASIN</h6>
              <div class="ftr-details">
                <?php
                  if( !empty($cooper['telephone']) ) printf('<div class="ftr-details-row ftr-phone"><span>Phone: <a href="tel:%s">%s</a></span></div>', phone_preg($cooper['telephone']), $cooper['telephone']); 
                  if( !empty($cooper['fax']) ) printf('<div class="ftr-details-row ftr-fax"><span>Fax: <a href="tel:%s">%s</a></span></div>', phone_preg($cooper['fax']), $cooper['fax']); 
                  if( !empty($cooper['emailaddres']) ) printf('<div class="ftr-details-row ftr-mail"><span>Email: <a href="mailto:%s">%s</a></span></div>', $cooper['emailaddres'], $cooper['emailaddres']); 
                ?>
              </div>
            </div>
            <div class="ftr-col ftr-col-03">
              <h6 class="fl-h6 ftr-col-title">quick links</h6>
              <div class="ftr-col-menu">
                <?php 
                  $ftmenuOptions1 = array( 
                      'theme_location' => 'cbv_footer_menu1', 
                      'menu_class' => 'reset-list',
                      'container' => '',
                      'container_class' => ''
                    );
                  wp_nav_menu( $ftmenuOptions1 ); 
                ?>
              </div>
            </div>
            <div class="ftr-col ftr-col-04">
              <h6 class="fl-h6 ftr-col-title">Lorem</h6>
              <div class="ftr-col-menu">
              <?php 
                $ftmenuOptions2 = array( 
                    'theme_location' => 'cbv_footer_menu2', 
                    'menu_class' => 'reset-list',
                    'container' => '',
                    'container_class' => ''
                  );
                wp_nav_menu( $ftmenuOptions2 ); 
              ?>
              </div>
            </div>
            <div class="ftr-col ftr-col-05">
              <h6 class="fl-h6 ftr-col-title">Ipsum</h6>
              <div class="ftr-col-menu">
               <?php 
                $ftmenuOptions3 = array( 
                    'theme_location' => 'cbv_footer_menu3', 
                    'menu_class' => 'reset-list',
                    'container' => '',
                    'container_class' => ''
                  );
                wp_nav_menu( $ftmenuOptions3 ); 
              ?>
              </div>
            </div>
            <div class="ftr-col ftr-col-06">
              <h6 class="fl-h6 ftr-col-title">Integer</h6>
              <div class="ftr-col-menu">
              <?php 
                $ftmenuOptions4 = array( 
                    'theme_location' => 'cbv_footer_menu4', 
                    'menu_class' => 'reset-list',
                    'container' => '',
                    'container_class' => ''
                  );
                wp_nav_menu( $ftmenuOptions4 ); 
              ?>
              </div>
            </div>
          </div>

          <div class="ftr-btm-cntlr">
            <div class="ftr-btm-lft">
              <div class="ftr-copyright">
              <?php if( !empty( $copyright_text ) ) printf( '%s', $copyright_text); ?>
              </div>
              <div class="ftr-btm-menu">
                <?php 
                  $copymenuOptions = array( 
                      'theme_location' => 'cbv_copyright_menu', 
                      'menu_class' => 'reset-list',
                      'container' => '',
                      'container_class' => ''
                    );
                  wp_nav_menu( $copymenuOptions ); 
                ?>
              </div>
            </div>
            <div class="ftr-developed-by">
              <p>Website by  <a target="_blank" href="#">BEVIN Creative</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
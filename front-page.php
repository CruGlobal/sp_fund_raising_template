<?php get_header() ?>


<div class="row">
  <div class="grid_12">
    <header class="pageheader">
      <h1 class="project_title">
        <?php //the_title(); ?>
        <span class="name"><?php echo of_get_option('spkick_person_name', 'Not Set'); ?></span><br/>
        <?php echo of_get_option('spkick_tripname', 'Not Set'); ?>
      </h1>
      <h6>
        <?php echo of_get_option('spkick_description', 'Not Set'); ?>
      </h6>
    </header>
  </div>
</div>
<div class="row">
  
  
  <!--
    spkick_goal
    spkick_current_amount
    spkick_deadline
    spkick_tripname
    spkick_description
    spkick_project_image
    spkick_video_url
    spkick_designation
    spkick_motivation
  -->
  
  
  <div class="grid_8">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <div class="hero">
      <?php if (of_get_option('spkick_video_url', 'Not Set')) : ?>
        <iframe width="608" height="342" src="<?php echo of_get_option('spkick_video_url', 'Not Set'); ?>" frameborder="0" allowfullscreen></iframe>
      <?php elseif (of_get_option('spkick_project_image', 'Not Set')) : ?>
        <?php 
          $img_url = of_get_option('spkick_project_image', 'Not Set');
          $img_id = get_image_id($img_url);
          echo wp_get_attachment_image( $img_id, 'project_image' )
        ?>
      <?php else: ?>
        <img src="" />
      <?php endif; ?>
        
        
      </div>
      <div class="social_bar">
        <div class="social_links">
          
          <!-- AddThis Button BEGIN -->
          <div class="addthis_toolbox addthis_default_style">
          <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
          <a class="addthis_button_tweet"></a>
          </div>
          <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-514fdf491f764030"></script>
          <!-- AddThis Button END -->
          
        </div>
        <div class="social_url">
          <?php echo get_site_url(); ?>
        </div>
      </div>
      <?php the_content(); ?>
    </article>
    <?php endwhile; else: endif; ?>
  </div>
  
  
  
  
  <div class="grid_4">
    <div class="box legend">
      <div class="box_interior">
        <h2 class="price">$<?php echo of_get_option('spkick_goal', 'Not Set'); ?></h2>
        <span class="price_subtext">
          raised of 
          $<?php echo of_get_option('spkick_goal', 'Not Set'); ?> goal
        </span>
        
        <div class="donor_graph">
          <?php 
            $g1 = of_get_option('spkick_current_amount', 'Not Set');
            $g2 = of_get_option('spkick_goal', 'Not Set');
            $amt = ($g1 / $g2) * 100;
          ?>
          <div class="donor_graph_inside" style="width: <?php echo $amt; ?>%"></div>
        </div>
        
        
        <div class="donor_stats">
          <span class="num">45</span> donors &nbsp;
          <span class="num">
            <?php
             $now = time(); // or your date as well
             $your_date = strtotime(of_get_option('spkick_deadline', 'Not Set'));
             $datediff = $your_date - $now;
             echo floor($datediff/(60*60*24));
            ?>
          </span> days left
        </div>
        
        <div class="cta">
          <a id="donatecta" href="">Donate!</a>
          <script>
            jQuery(document).ready(function() {
              jQuery('#donatecta').click(function() {
                var ctaone = 'http://give.cru.org/give/EasyCheckout1/process/singleGift?&Desig=<?php echo of_get_option('spkick_designation', ''); ?>&Motivation=<?php echo of_get_option('spkick_motivation', ''); ?>&DefaultPaymentType=CC&Theme=mobile&id_type=facebook&id_value=';
                var ctatwo = '&URL=http://mhub.cc/thanks'
                var newcta = ctaone + facebook_user_id + ctatwo;
                jQuery("#donatecta").prop("href", newcta);
              });
            });
          </script>
        </div>
      </div>
    </div>
    <div class="box person">
      <div class="box_interior">
        <div class="person_brief">
          <span class="person_image">
          <?php 
            $img_url = of_get_option('spkick_person_image', 'Not Set');
            $img_id = get_image_id($img_url);
            echo wp_get_attachment_image( $img_id, 'square' )
          ?>
          </span>
          <span class="person_name"><?php echo of_get_option('spkick_person_name', 'Not Set'); ?></span>
          <span class="person_subtext"><?php echo of_get_option('spkick_person_subtext', 'Not Set'); ?></span>
        </div>
        <div class="person_bio">
          <p><pre><?php echo of_get_option('spkick_person_bio', 'Not Set'); ?></pre></p>
        </div>
      </div>
    </div>
  </div>


  


<?php get_footer() ?>
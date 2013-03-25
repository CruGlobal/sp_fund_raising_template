<?php get_header() ?>


<div class="row">
  <div class="grid_12">
    <header class="pageheader">
      <h1 class="project_title">
        <?php //the_title(); ?>
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
        <?php 
          $img_url = of_get_option('spkick_project_image', 'Not Set');
          $img_id = get_image_id($img_url);
          echo wp_get_attachment_image( $img_id, 'project_image' )
        ?>
        <?php echo of_get_option('spkick_video_url', 'Not Set'); ?>
      </div>
      <div class="social_bar">
        <div class="social_links">
          <!-- add this code -->
        </div>
        <div class="social_url">
          http://thissiteurl.org
        </div>
      </div>
      <?php the_content(); ?>
    </article>
    <?php endwhile; else: endif; ?>
  </div>
  
  
  
  
  <div class="grid_4">
    <div class="box">
      <div class="box_interior">
        <h2 class="price">$<?php echo of_get_option('spkick_goal', 'Not Set'); ?></h2>
        <span class="price_subtext">raised of $<?php echo of_get_option('spkick_current_amount', 'Not Set'); ?> goal</span>
        
        <div class="donor_stats">
          <span class="num">45</span> donors
          <span class="num"><?php echo of_get_option('spkick_deadline', 'Not Set'); ?></span> days left
        </div>
        
        <div class="cta">
          <a href="/">Donate!</a>
        </div>
      </div>
    </div>
    <div class="box">
      <div class="box_interior">
        <div class="person_brief">
          <?php 
            $img_url = of_get_option('spkick_person_image', 'Not Set');
            $img_id = get_image_id($img_url);
            echo wp_get_attachment_image( $img_id, 'square' )
          ?>
          <span class="person_name"><?php echo of_get_option('spkick_person_name', 'Not Set'); ?></span>
          <span class="person_subtext"><?php echo of_get_option('spkick_person_subtext', 'Not Set'); ?></span>
        </div>
        <div class="person_bio">
          <p><em><?php echo of_get_option('spkick_person_bio', 'Not Set'); ?></em></p>
        </div>
      </div>
    </div>
  </div>


  


<?php get_footer() ?>
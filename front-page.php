<?php get_header() ?>


<?php if(empty($_GET['thanks'])) { ?>
<div class="row">
  <div class="grid_12">
    <header class="pageheader">
      <h1 class="project_title">
        <?php //the_title(); ?>
        <span class="name"><?php echo of_get_option('spkick_person_name', ''); ?></span><br/>
        <?php echo of_get_option('spkick_tripname', ''); ?>
      </h1>
      <h6>
        <?php echo of_get_option('spkick_description', ''); ?>
      </h6>
    </header>
  </div>
</div>
<?php } ?>

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

  <?php if(!empty($_GET['thanks'])) { ?>
    <div class="grid_12">
      <article class="thankyou">
        <h1>
          Thank you!
        </h1>
        <p>

          Your generous donation will go a long way in making a
          difference in the lives of those I am able to share the
          gospel with.

        </p>
        <p>
          Sincerely,<br/>
          <?php echo of_get_option('spkick_person_name', ''); ?>

        </p>
        <p>
          &nbsp;
        </p>

        <div class="social_share">
          <div class="row">
            <div class="grid_6">
              <div class="share_box twitter">
                <form action="https://twitter.com/intent/tweet">
                  <textarea class="tweetcnt" name="text">I just gave to help #<?php echo preg_replace('/\s+/', '', of_get_option('spkick_person_name', '')); ?> go on a Summer Project to #<?php echo preg_replace('/\s+/', '', of_get_option('spkick_tripname', '')); ?>. Join the team: <?php echo get_site_url(); ?></textarea>
                  <button class="tweetbtn" type="submit">Tweet This</button>
                </form>
              </div>
            </div>
            <div class="grid_6">
              <div class="share_box fb">
                <div class="fb-like" data-href="<?php echo get_site_url(); ?>" data-send="false" data-layout="box_count" data-width="450" data-show-faces="false" data-font="arial" data-action="recommend"></div>
              </div>
            </div>
          </div>
        </div>
      </article>
    </div>
  <?php } else { ?>
  <div class="grid_8">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <div class="hero">
      <?php if (of_get_option('spkick_video_url', '')) : ?>
        <?php echo parse_youtube_url(of_get_option('spkick_video_url', ''),'embed'); ?>
        <!-- <iframe width="100%" height="100%" src="<?php echo of_get_option('spkick_video_url', ''); ?>" frameborder="0" allowfullscreen></iframe> -->
      <?php elseif (of_get_option('spkick_project_image', '')) : ?>
        <?php
          $img_url = of_get_option('spkick_project_image', '');
          $img_id = get_image_id($img_url);
          echo wp_get_attachment_image( $img_id, 'project_image' )
        ?>
      <?php else: ?>
        <div class="nohero">
        Please upload an Image or YouTube video.
        </div>
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
        <div class="social_url" style="display: none;">
          <?php echo get_site_url(); ?>
        </div>
      </div>

      <pre><?php echo of_get_option('spkick_fulldescription', ''); ?></pre>

      <?php //the_content(); ?>
    </article>
    <?php endwhile; else: endif; ?>
  </div>




  <div class="grid_4">
    <div class="box legend">
      <div class="box_interior">
        <h2 class="price">$<?php echo number_format((float) of_get_option('spkick_current_amount', 0)) ?></h2>
        <span class="price_subtext">
          raised of $<?php echo number_format((float) of_get_option('spkick_goal')) ?> goal
        </span>

        <div class="donor_graph">
          <?php
            $g1 = of_get_option('spkick_current_amount', '0');
            $g2 = of_get_option('spkick_goal', '0');
            if ($g2 == 0) {$amt = 0;} else {$amt = ($g1 / $g2) * 100;}
          ?>
          <div class="donor_graph_inside" style="width: <?php echo $amt; ?>%"></div>
        </div>

        <?php
         $now = time(); // or your date as well
         $your_date = strtotime(of_get_option('spkick_deadline', ''));
         if ($your_date > 0) {
           $datediff = $your_date - $now;
           if ($datediff > 0) {
             $days_left = floor($datediff/(60*60*24));
           } else {
             $days_left = 0;
           }
           ?>


          <div class="donor_stats">
            <span class="num"><?php echo $days_left ?></span> days left
          </div>
          <div class="donor_endDate">
            <span>Goal Date</span>
            <?php echo date("F j, Y", strtotime(of_get_option('spkick_deadline'))); ?>
            <?php //echo of_get_option('spkick_deadline'); ?>
          </div>

        <?php
          }
        ?>

        <div class="cta">
          <a id="donatecta" class="donatecta" href="">Donate!</a>
        </div>
      </div>
    </div>
    <div class="box person">
      <div class="box_interior">
        <div class="person_brief">
          <span class="person_image">
          <?php
            $img_url = of_get_option('spkick_person_image', '');
            $img_id = get_image_id($img_url);
            echo wp_get_attachment_image( $img_id, 'square' )
          ?>
          </span>
          <span class="person_name"><?php echo of_get_option('spkick_person_name', ''); ?></span>
        </div>
        <div class="person_bio">
          <p><pre><?php echo of_get_option('spkick_person_bio', ''); ?></pre></p>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>

</div>



<?php get_footer() ?>

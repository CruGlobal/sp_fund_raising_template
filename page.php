<?php get_header() ?>

    <header class="pageheader">
      <?php affari_the_breadcrumb(); ?>
      <h1 class="pagetitle"><?php the_title(); ?></h1>
      
    </header>

    <div class="row">
      <div class="grid_12">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
          <?php the_content(); ?>
        </article>
<?php endwhile; else: endif; ?>



        <div id="comments_wrap">
          <div class="row">
            <div class="grid_8">
              <!-- ------------------------------------------------------------------------- -->
              <?php comments_template(); ?>
            </div>
            <div class="grid_4">
              &nbsp;
            </div>
          </div>
        </div>

      </div>
      
    </div>

<?php get_footer() ?>
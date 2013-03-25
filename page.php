<?php get_header() ?>

    <header class="pageheader">
      <h1 class="pagetitle"><?php the_title(); ?></h1>
      <?php affari_the_breadcrumb(); ?>
    </header>

    <div class="row">
      <div class="grid_12">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
          <?php the_content(); ?>
        </article>
<?php endwhile; else: endif; ?>
      </div>
      
    </div>

<?php get_footer() ?>
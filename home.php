<?php get_header() ?>

    <header class="pageheader">
      <h1 class="pagetitle">Blog</h1>
      <?php affari_the_breadcrumb(); ?>
    </header>

    <div class="row">
      <div class="grid_9">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
          <header class="entryheader">
            <h1 class="pagetitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          </header>
          <?php the_content(); ?>
          
          <div class="meta">
            <?php the_date(); ?> | 
            <a href="<?php comments_link(); ?>">
              <?php comments_number( 'no responses', 'one response', '% responses' ); ?>.
            </a>
          </div>
        </article>
<?php endwhile; else: ?>
        <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
          <header class="entryheader">Whoops!<?php the_title(); ?></h1>
          </header>
          <p>Sorry! Nothing to see here!</p>
        </article>
<?php endif; ?>

<?php if (get_previous_posts_link() || get_next_posts_link()) { ?>
        <div id="pagination">
		      <?php posts_nav_link(' ','Previous Page','Next Page'); ?>
        </div>
<?php } ?>
      </div>
      <div class="grid_3">
			  <?php get_sidebar(); ?>
      </div>
    </div>

<?php get_footer() ?>
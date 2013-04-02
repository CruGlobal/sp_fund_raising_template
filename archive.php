<?php get_header() ?>

    <header class="pageheader">
    <?php //affari_the_breadcrumb(); ?>
      <h1 class="pagetitle">
        
        <?php if ( is_day() ) : ?>
							<?php printf( __( 'Daily Archives: %s', 'twentyeleven' ), '<span>' . get_the_date() . '</span>' ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( __( 'Monthly Archives: %s', 'twentyeleven' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyeleven' ) ) . '</span>' ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( __( 'Yearly Archives: %s', 'twentyeleven' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentyeleven' ) ) . '</span>' ); ?>
						<?php else : ?>
							<?php _e( 'Blog Archives', 'twentyeleven' ); ?>
						<?php endif; ?>
        
      </h1>
      
    </header>

    <div class="row">
      <div class="grid_9">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          
          <?php the_content(); ?>
        
          <div class="meta">
            <?php the_date(); ?> | 
            <a href="<?php comments_link(); ?>">
              <?php comments_number( 'no responses', 'one response', '% responses' ); ?>.
            </a>
          </div>

        </article>
        
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
        
        
        
<?php endwhile; else: endif; ?>
      </div>
      <div class="grid_3">
			  <?php get_sidebar(); ?>
      </div>
    </div>

<?php get_footer() ?>
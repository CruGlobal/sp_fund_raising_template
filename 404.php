<?php
/**
 * Template Name: One Column
 * Description: One column layout
**/
?>

<?php get_header() ?>

    <header class="pageheader">
      <h1 class="pagetitle">404 - Not Found</h1>
      <?php //affari_the_breadcrumb(); ?>
    </header>

    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentyeleven' ); ?></p>

			<p><?php get_search_form(); ?></p>
    </article>
    
<?php get_footer() ?>
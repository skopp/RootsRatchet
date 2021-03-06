
<div class="slider" id="mySlider">
  <ul>

 <?php query_posts('cat=3&showposts=5'); ?>
  <?php while (have_posts()) : the_post(); ?>
    <li>
      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
      <span class="slide-text"><?php the_title(); ?></span>
    </li>
    <?php endwhile;?>
  </ul>
</div>
<div class="content-padded">
<?php if (!have_posts()) : ?>
  <div class="alert alert-block fade in">
    <a class="close" data-dismiss="alert">&times;</a>
    <p><?php _e('Sorry, no results were found.', 'roots'); ?></p>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div>
    <footer>
      <?php the_tags('<ul class="entry-tags"><li>','</li><li>','</li></ul>'); ?>
    </footer>
    <hr>
  </article>
<?php endwhile; ?>

<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <?php if (get_next_posts_link()) : ?>
        <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <?php else: ?>
        <li class="previous disabled"><a><?php _e('&larr; Older posts', 'roots'); ?></a></li>
      <?php endif; ?>
      <?php if (get_previous_posts_link()) : ?>
        <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
      <?php else: ?>
        <li class="next disabled"><a><?php _e('Newer posts &rarr;', 'roots'); ?></a></li>
      <?php endif; ?>
    </ul>
  </nav>
<?php endif; ?>
</div>

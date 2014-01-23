<?php
/*
Template name: Front Page
*/
?>
<?php get_header(); ?>
<?php include (TEMPLATEPATH . '/featured_section.php'); ?>
<?php if(have_posts()) :?>
  <div id='front_content'>
   <?php while (have_posts()) : the_post();?>
   <h3 id="tagline">
    <img src="paper_plane.jpg" width='202' height='179' alt="" >
    <p><?php bloginfo('description'); ?> </p>
  </h3>
  <?php the_content(); ?>
<?php endwhile; ?>
<?php
$recentBlog = new WP_Query();
$recentBlog->query('showposts=1');
if ($recentBlog->have_posts()) : while($recentBlog->have_posts()) : $recentBlog->the_post();
?>
<div class='front_columns'>
<h2><?php the_title(); ?></h2>
<p><?php the_content_rss('&hellip;', 0, '', 50, 0); ?></p>
<a href="<?php the_permalink('Find Out More&hellip;'); ?>">Read More&hellip;</a>
</div>
<?php endwhile ?>
<?php else : ?>
  <h2>Temporary Filler Box</h2>
  <p>This is temporary filler, because the content that's supposed to go here isn't here.</p>
  <p>How terribly lazy. Come back soon, and maybe there will be something.</p>
<?php endif ?>
<?php else: ?>
  <h2>Whoops we could not find what you were looking for.</h2>
<?php endif; ?>
</div>
<?php get_footer(); ?>
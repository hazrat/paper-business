<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php
	$page_tagline = get_post_meta($post->ID, `page_text` , true);
	$page_img = get_post_meta($post->ID, `page_img` , true);
	$testimonial = get_post_meta($post->ID, `Testimonial` , true);
	?>
	<div class='post' id='post<?php the_ID(); ?>'>
		<div class='page_tagline'>
			<h2><?php the_title();?></h2>
			<p><?php echo $page_tagline; ?></p>
			<img src='wp-content/themes/paperbusiness/style/images/header_bgg.png' alt="" />
		</div>
		<div id="page_sidebar">
			<div class="sidebar_top"><h2>Services</h2></div>
			<div class="sidebar_middle">
				<ul>
					<li><a href="#" title="">Web Design</a></li>
					<li><a href="#" title="">SEO</a></li>
					<li><a href="#" title="">Another link 1</a></li>
					<li><a href="#" title="">Another link 2</a></li>
				</ul>
			</div>
			<div class="sidebar_bottom">&nbsp;</div>
			<div class="sidebar_top"><h2>Testimonials</h2></div>
			<div class="sidebar_middle testimonial">
				<?php echo $testimonial; ?>
			</div>
			<div class="sidebar_bottom">&nbsp;</div>
		</div>
		<div id="page_content">
			<img class="alignleft page_image" src="<?php echo $page_img; ?>" alt="page image" />
			<?php the_content('<p class="serif">Read the rest of this page &raquo</p>');?>
			<?php
			wp_link_pages(array(
				'before'           => '<p>' . __( 'Pages:' ),
				'after'            => '</p>',
				'link_before'      => '',
				'link_after'       => '',
				'next_or_number'   => 'number',
				'separator'        => ' ',
				'nextpagelink'     => __( 'Next page' ),
				'previouspagelink' => __( 'Previous page' ),
				'pagelink'         => '%'
				));
				?>
				<br class="dirtyLittleTrick" />
				<?php edit_post_link('edit', '<p>', '</p>'); ?>
			</div>
		</div>
	<?php endwhile; ?>
	<?php edit_post_link('edit', '<p>', '</p>'); ?>
	<?php get_footer(); ?>
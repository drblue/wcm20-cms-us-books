<?php
/**
 * Template file for single book posts.
 *
 * You can override this file by copying it to your theme's root folder.
 * Example: `/wp-content/themes/yourtheme/single-wcmb_book.php`
 */

get_header();

if (have_posts()) {
	while (have_posts()) {
		the_post();
		?>
			<pre>Hello this is book template file from plugin</pre>

			<article>
				<h1><?php the_title(); ?></h1>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php
	}
}

get_footer();

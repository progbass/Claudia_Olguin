<?php
$events_query = new WP_Query(array(
	'post_status'		=> 'publish',
	'post_type'			=> 'events',
	'posts_per_page'	=>	5,
	'meta_key'			=> 'order_date',
	'orderby'			=> 'meta_value_num',
	'order'				=> 'ASC'
));

if($events_query->have_posts()): ?>
	<div id="save_the_date">
		<h2>&lt; Save the Date &gt;</h2>

		<div class="data_holder">
			<ul class="events">
			<?php
			while($events_query->have_posts()):
				$events_query->the_post(); ?>
					
		          <li>
		            <?php the_title();?> / <?php the_field('location');?> / <?php the_field('display_date');?> 
		          </li>
			        
			<?
			endwhile; ?>
			</ul>
		</div>
	</div>
<? endif; 
/* Restore original Post Data */
wp_reset_postdata(); ?>
<?php /* Template Name: Home */ ?>

<?php get_header() ?>

	<header></header>

	  <?php
	  $featured_posts = array();
	  ?>


      <div class="content_holder">

      
        <?php get_template_part('content', 'featured');?>



        <div class="latest_holder">
          <div class="col_left">
    		<h4 class="section_title">Periodismo</h4>

            <ul id="latest">


            	<?php
				  $category_name = 'in-site';
				  $category_obj = get_category_by_slug( $category_name );
		          $args = array(
					'post_status' => 'publish',
					'post_type' => array('post'),
					'posts_per_page'	=> 5,
					'post__not_in'		=> $featured_posts,
				  );
				  $insite_query = new WP_Query($args);

				  if ($insite_query->have_posts()):
					while ($insite_query->have_posts()) : $insite_query->the_post() ?>
						<li class="">
			                <div class="data_holder">                 
			                  <div class="image_holder">
			                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
			                  </div>

			                  <div class="data">
			                    <div class="meta"><?php the_time('j.m.Y'); ?></div>
			                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			                    <?php the_excerpt();?>
			                  </div>
			                </div>
			            </li>

			      	<?php endwhile; ?>
				  <?php endif;
				  /* Restore original Post Data */
				  wp_reset_postdata(); ?>


            </ul>
          </div>



          <div class="col_right">
            <div class="video_holder">
              <?php
              	$video_query = new WP_Query(array(
              		'post_status'		=>	'publish',
              		'post_type'			=>	'video',
              		'posts_per_page'	=>	1
              	));

              	if($video_query->have_posts()):
              		while ($video_query->have_posts()) :
              			$video_query->the_post();
						parse_str( parse_url( get_field('video'), PHP_URL_QUERY ), $video_vars );?>

              			<div id="yt_dynamic_player"></div>
              			<script type="text/javascript">
              				var yt_video_ID = '<?php echo $video_vars['v']; ?>';
              			</script>

              	<?
              		endwhile;
              	endif;

				/* Restore original Post Data */
				wp_reset_postdata(); ?>
		    	
            </div>



            <div class="blog_holder">
    			<h4 class="section_title">Blog</h4>

              	<?php
              	$blog_query = new WP_Query(array(
              		'post_status'		=>	'publish',
              		'posts_per_page'	=>	3,
              		'post_type'			=>	'noticias'
              	));

              	if($blog_query->have_posts()): ?>
              		<ul class="blog_list">
              		<?php
              		while ($blog_query->have_posts()) :
              			$blog_query->the_post(); ?>

						<li class="">
			                <div class="data_holder">                 
			                  <div class="image_holder">
			                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
			                  </div>

			                  <div class="data">
			                    <div class="meta"><?php the_time('j.m.Y'); ?></div>
			                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			                    <?php echo substr(get_the_excerpt(), 0, 120).'...';?>
			                  </div>
			                </div>
			            </li>

              	<?  endwhile; ?>
              		</ul>
              	<?php
              	endif;


				/* Restore original Post Data */
				wp_reset_postdata(); ?>
		    	
            </div>
          </div>
        </div>
      </div>

<?php get_footer() ?>

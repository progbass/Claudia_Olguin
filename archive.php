<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>
	

	<section id="article_holder" class="content_holder">
        <div class="col_left">
          <ul class="results">

          	<?php
	          if (have_posts()):
				while (have_posts()) : the_post(); ?>

					<li>
		              <div class="date_holder">
		              	<?php the_time('d M Y')?>
		              </div>

		              <div class="data_holder">
		                <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
		                <h4>Tras fusiones y adquisiciones las empresas líderes del mercado de servicios inmobilarios modifican liderazgo.</h4>

		                <div class="image_holder">
		                	<a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
		                </div>

		                <div class="excerpt">
		                  <?php the_excerpt(); ?>
		                </div>
		              </div>
		            </li>

				<?php endwhile; ?>
		  	<?php endif; ?>

          </ul>
        </div> 
      
        
        <?php get_sidebar(); ?>
      </section>



<?php get_footer(); ?>

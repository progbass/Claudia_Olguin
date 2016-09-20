<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>
	

	<section id="article_holder" class="content_holder">
        <div class="col_left">


          
          <ul class="results">

          	<?php
	          if (have_posts()):
				      while (have_posts()) : the_post();  ?>
            
    					<?php get_template_part('content', 'item'); ?>

    				  <?php endwhile; ?>
    		  	<?php endif; ?>

          </ul>
        </div> 
      
        
        <?php get_sidebar(); ?>
      </section>



<?php get_footer(); ?>

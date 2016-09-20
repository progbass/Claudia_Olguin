<?php get_header(); ?>
	<section id="article_holder" class="content_holder">
        <div class="col_left">
          
          <?php //get_template_part('content', 'filters_menu'); ?>

          <article>
          <?php
          if (have_posts()):
      			while (have_posts()) : the_post(); ?>

            <div class="image_holder cover_photo">
      			 <?php the_post_thumbnail(); ?>
            </div>

            <div class="date"><?php the_time('j.m.Y'); ?></div>

            <h3><?php the_title(); ?></h3>
            <!--  <h4>Tras fusiones y adquisiciones las empresas l&iacute;deres del mercado de servicios inmobiliarios modifican liderazgo.</h4> -->
            

            <!-- SOCIAL  SHARE -->
            <?php get_template_part('content', 'social_share'); ?>
            <!-- /SOCIAL SHARE -->

            <div class="author">Por <?php the_author(); ?></div>


            <!-- THE CONTENT -->
            <div class="content">
              <?php the_content(); ?>
            </div>
            <!-- /THE CONTENT -->
            

            <!-- SOCIAL  SHARE -->
            <?php get_template_part('content', 'social_share'); ?>
            <!-- /SOCIAL SHARE -->


          	<?php endwhile; ?>
		      <?php endif; ?>
          </article>
        </div> 
      
        <?php get_sidebar(); ?>
      </section>
<?php get_footer(); ?>

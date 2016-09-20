<?php

  // Variable global que contendrá los id´s de los posts que se muestran en este módulo (Featured Content).
  global $featured_posts;
  if(!isset($featured_posts)){
    $featured_posts = array();
  }


  // Almacenamos las categorías en un array para controlar el orden en el que se mostrarán en el front end
  // dependiendo de la página en la que nos encontremos
  $content_order = array('in-site', 'periodismo', 'blogger');
  //if( is_page('periodismo') )
    //$content_order = array('in-site', 'periodismo', 'blogger');
?>


<!-- FEATURED CONTENT -->
<ul id="featured">

  <?php
  // Loop entre las categorías
  for($i = 0; $i<count($content_order); $i++){ ?>


    <?php
    //////////////////////////////////////////////////
    /// INSITE
    //////////////////////////////////////////////////
    
    if($content_order[$i] == 'in-site'){
      $category_name = 'in-site';
      $category_obj = get_category_by_slug( $category_name );
      $args = array(
      'posts_per_page' => 1,
      'category_name' => $category_name.'+featured',
      );
      $insite_query = new WP_Query($args);

      if ($insite_query->have_posts()):
      while ($insite_query->have_posts()) :
        $insite_query->the_post();
      
        // Add Post ID to exclude ir from the 'latest' list
        array_push($featured_posts, get_the_ID()); ?>

              <li>
                <h2><a href="<?php echo get_category_link( $category_obj->term_id ); ?>"><?php  echo $category_obj->name;?></a></h2>

                <div class="image_holder">
                  <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
                </div>

                <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                
                <!-- EXCERPT -->
                <?php
                if( !has_excerpt() ){
                  $excerpt = substr(get_the_excerpt(), 0, 150).'...';
                  echo '<p>'.$excerpt.'</p>';
                } else {
                  the_excerpt();
                };?>
                <!-- /EXCERPT -->
              </li>
        <?php endwhile; ?>
      <?php endif;


    


    //////////////////////////////////////////////////
    /// PERIODISMO / DESIGN
    //////////////////////////////////////////////////  
    } else if($content_order[$i] == 'periodismo'){



      $category_name = 'periodismo';
      $category_obj = get_category_by_slug( $category_name );
      $args = array(
      'posts_per_page' => 1,
      'category_name' => $category_name.'+featured',
      );
      $insite_query = new WP_Query($args);

      if ($insite_query->have_posts()):
      while ($insite_query->have_posts()) :
        $insite_query->the_post();

        // Add Post ID to exclude ir from the 'latest' list
        array_push($featured_posts, get_the_ID()); ?>

              <li>
                <h2><a href="<?php echo get_category_link( $category_obj->term_id ); ?>">Design</a></h2>

                <div class="image_holder">
                  <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
                </div>

                <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                
                <!-- EXCERPT -->
                <?php
                if( !has_excerpt() ){
                  $excerpt = substr(get_the_excerpt(), 0, 150).'...';
                  echo '<p>'.$excerpt.'</p>';
                } else {
                  the_excerpt();
                };?>
                <!-- /EXCERPT -->
              </li>
        <?php endwhile; ?>
      <?php endif;






    //////////////////////////////////////////////////
    /// PLACES / BLOGGER
    //////////////////////////////////////////////////  
    } else if($content_order[$i] == 'blogger'){ 

      $category_name = 'blogger';
      $category_obj = get_category_by_slug( $category_name );
      $args = array(
      'posts_per_page' => 1,
      'category_name' => $category_name.'+featured',
      );
      $insite_query = new WP_Query($args);

      if ($insite_query->have_posts()):
      while ($insite_query->have_posts()) : 
        $insite_query->the_post();
      
        // Add Post ID to exclude ir from the 'latest' list
        array_push($featured_posts, get_the_ID()); ?>

              <li>
                <h2><a href="<?php echo get_category_link( $category_obj->term_id ); ?>">Places</a></h2>

                <div class="image_holder">
                  <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
                </div>

                <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                
                <!-- EXCERPT -->
                <?php
                if( !has_excerpt() ){
                  $excerpt = substr(get_the_excerpt(), 0, 150).'...';
                  echo '<p>'.$excerpt.'</p>';
                } else {
                  the_excerpt();
                };?>
                <!-- /EXCERPT -->
              </li>
        <?php endwhile; ?>
      <?php endif;

    }?>



  <?php
    /* Restore original Post Data */
    wp_reset_postdata(); 
  } ?>
</ul>
<!-- END: FEATURED CONTENT -->
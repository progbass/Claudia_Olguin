<?php
  if(is_home()){
?>


  <li>
    <div class="date_holder">
    	<?php the_time('d M Y')?>
    </div>

    <div class="data_holder">
      <h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
      <!--<h4>Tras fusiones y adquisiciones las empresas líderes del mercado de servicios inmobilarios modifican liderazgo.</h4>-->

      <div class="image_holder image_ratio_calculate">
      	<a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
      </div>

      <div class="excerpt">
        <?php
        if( !has_excerpt() ){
          $excerpt = substr(get_the_excerpt(), 0, 150).'...';
          echo '<p>'.$excerpt.'</p>';
        } else {
          the_excerpt();
        };?>
      </div>
    </div>
  </li>



<?php
} else { ?>

  <li class="">
    <div class="data_holder">                 
      <div class="image_holder">
        <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
      </div>

      <div class="data">
        <div class="meta"><?php the_time('j.m.Y'); ?></div>
        <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
        <?php
        if( !has_excerpt() ){
          $excerpt = substr(get_the_excerpt(), 0, 150).'...';
          echo '<p>'.$excerpt.'</p>';
        } else {
          the_excerpt();
        };?>
      </div>
    </div>
  </li>



<?php
}?>
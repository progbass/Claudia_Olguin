<ul class="filters">
  <li class="active">
    <a href="#" class="tab category" data-type='category'>Categor&iacute;as</a>


    <?php
	  $design_obj = get_category_by_slug( 'design' );
	  $insite_obj = get_category_by_slug( 'in-site' );
	  $places_obj = get_category_by_slug( 'places' );
	  ?>
    <ul class="submenu">
      <li><a href="<?php echo get_category_link( $design_obj->term_id ); ?>" class="active" data-category='<?php echo $design_obj->slug ?>'>Design</a></li>
      <li><a href="<?php echo get_category_link( $insite_obj->term_id ); ?>" data-category='<?php echo $insite_obj->slug ?>'>In-Site</a></li>
      <li><a href="<?php echo get_category_link( $places_obj->term_id ); ?>" data-category='<?php echo $places_obj->slug ?>'>Places</a></li>
    </ul>
  </li>

  <li><a href="#" class="tab all" data-type='all'>Todo</a></li>
</ul>
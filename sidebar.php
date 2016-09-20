<aside class="col_right">
        
  <div class="module search">
    <h4>Buscador</h4>
    <?php get_search_form(); ?>
  </div>


  <div class="module newsletter">
    <h4>Newsletter</h4>

    <form id="newsletter_frm" enctype="" action="#" method="POST">
      <fieldset>
        <div class="data_holder">
          <label for="email_txt">email</label>
          <input type="text" id="email_txt" name="email_txt" value="" />
        </div>
        <div class="data_holder">
          <input type="submit" id="submit_btn" name="submit_btn" value="Subscribirme" />
        </div>
      </fieldset>
    </form>
  </div>



  <div class="module calendar">
    
    <!-- EVENTS -->
    <?php get_template_part('content', 'save_the_date');?>
    <!-- END: /EVENTS -->

  </div>



  <div class="module infography" id="brockers">
    <h4>Brokers Globales</h4>
    
    <div class="graph_holder">
      
      <!-- COLOR CODE -->
      <ul class="color_code">
        <li><span class="income"></span> Ingresos</li>
        <li><span class="employee"></span> Empleados</li>
      </ul>



      <!-- BROCKERS LIST -->
      <?php
      $args = array(
        'post_type' =>  'brockers'
      );
      $brockers_query = new WP_Query($args);

      if($brockers_query->have_posts()){ ?>
      
        <ul class="graph">
        <?php
        // Get Brocker Post
        while($brockers_query->have_posts()):
          $brockers_query->the_post();

            // Brockers List
            while ( have_rows('brocker_list') ) : the_row();
              
              if(have_rows('brocker')) :
                while( have_rows('brocker') ) : the_row(); ?>

                <li>
                  <?php the_sub_field('name'); ?>

                  <div class="percentage_holder income" data-percentage="<?php the_sub_field('income_percentage'); ?>">
                    <?php the_sub_field('income'); ?>
                    <span></span>
                  </div>

                  <div class="percentage_holder employee" data-percentage="<?php the_sub_field('employees_percentage'); ?>">
                    <?php the_sub_field('employees'); ?>
                    <span></span>
                  </div>
                </li>

        <?php
              endwhile;
            endif;
          endwhile;
        endwhile; ?>

        </ul>

      <?php
      } ?> 

        <!--

        <li>
          
          
          <span class="income"></span>
          <span class="employee"></span>
        </li>

        <li>
          Colliers International (First Service Corp.)
          
          <span class="income">$2.32 Mil MDD</span>
          <span class="employee">16,300</span>
        </li>

        <li>
          Newmark Grubb Knight Frank (NGKF)
          
          <span class="income">$1.58 Mil MDD</span>
          <span class="employee">12,000</span>
        </li> -->
      </ul>
    </div>
  </div>
</aside>
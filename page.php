<?php get_header(); ?>



	<?php
	if(is_page('periodismo')): ?>
    

        <div class="latest_holder">

        
          <?php get_template_part('content', 'featured');?>



          <div class="col_left">

            <script>
              latest_category = 'design';
            </script>
            <?php get_template_part('content', 'filters_menu'); ?>


            <ul id="latest"></ul>
          </div>



          <div class="col_right">
            <?php
            if(have_posts()):
              while(have_posts()): the_post(); ?>

                <?php the_content(); ?>

            <?php
              endwhile;
            endif;?>
          </div>

        </div>






	<?php endif; ?>






	<?php
	if(is_page('inteligencia')): ?>

		<header class="inteligencia">
        <blockquote>Damos valor a las tendencias del real estate, 
        arquitectura, urbanismo e infraestructura con información 
        cargada de análisis y experiencia</blockquote>
    </header>

		<section id="about">
          <ul id="about">
          <?php
            if( have_rows('servicio') ):

              // loop through the rows of data
              while ( have_rows('servicio') ) : the_row(); ?>
                
                <li>
                  <div class="title_holder">
                    <h3><?php the_sub_field('title'); ?></h3>
                  </div>

                  <div class="data_holder"><?php the_sub_field('content'); ?></div>
                </li>

              <?php
              endwhile;


            // no rows found
            else :
            endif;  ?>
          </ul>
        </section>
	<?php endif; ?>







	<?php
	if(is_page('contacto')): ?>
		<section id="contact">
          <div class="title_holder">
            <h3>Contacto</h3>
          </div>

          <ul class="contact_holder">
              <li>
                <span>L</span> <a href="#">@claudiaolguinmx</a>
              </li>
              <li>
                <span>@</span> <a href="mailto:claudia@claudiaolguin.mx">claudia@claudiaolguin.mx</a>
              </li>
              <li>
                <span>t</span> <a href="tel:4122-5182">4122 5182</a>
              </li>
            </ul>

          <div class="form_holder">
            <form id="contact_frm" method="post" enctype="multipart/form-data" action="#">
              <fieldset>
                <div class="data_holder name">
                  <label for="contact_name_txt">Nombre*</label>
                  <input type="text" name="contact_name_txt" id="contact_name_txt" value="" />
                </div>

                <div class="data_holder mail">
                  <label for="contact_mail_txt">Mail*</label>
                  <input type="text" name="contact_mail_txt" id="contact_mail_txt" value="" />
                </div>

                <div class="data_holder subject">
                  <label for="contact_subject_txt">Asunto</label>
                  <input type="text" name="contact_subject_txt" id="contact_subject_txt" value="" />
                </div>

                <div class="data_holder">
                  <label for="contact_message_txt">Mensaje</label>
                  <textarea name="contact_message_txt" id="contact_message_txt" ></textarea>
                </div>

                <div class="data_holder">
                  <input type="submit" name="contact_submit_btn" id="contact_submit_btn" value="Enviar" />
                </div>
              </fieldset>
            </form>
          </div>
        </section>
	<?php endif; ?>



<?php get_footer(); ?>

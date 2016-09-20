		
		<!-- FOOTER -->
		<footer>

			<!-- EVENTS -->
			<?php get_template_part('content', 'save_the_date');?>
	        <!-- END: /EVENTS -->



	        <div class="contact">
	          <div class="col-left">
	            <ul>
	              <li><a href="https://twitter.com/claudiaolguinmx" class="twitter">@claudiaolguinmx</a></li>
	            </ul>
	          </div>

	          <div class="col-right">
	            <div class="content">
	              <h2>Newsletter Semanal</h2>
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
	          </div>
	        </div>


			<!-- SONDEO -->
			<?php
			$polls_query = new WP_Query(array(
				'post_status'		=> 'publish',
				'post_type'			=> 'sondeo',
				'posts_per_page'	=>	1
			));

			if($polls_query->have_posts()): ?>
				<div id="sondeo">
	          		<h2>Sondeo</h2>

					<?php
					while($polls_query->have_posts()):
						$polls_query->the_post(); ?>

						<h3><?php the_title(); ?></h3>
				        <?php the_content(); ?>
					      
					<?
					endwhile; ?>
				</div>
			<? endif; 
			/* Restore original Post Data */
			wp_reset_postdata(); ?>
	        <!-- END: /SONDEO -->


	    </footer>
	    <!-- END: FOOTER -->

	</div>
	<!-- END: MAIN HOLDER -->
	
	<?php wp_footer() ?>
  </body>
</html>

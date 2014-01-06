<div class="single-excerpt">


           <!-- displays thumbnail if it exists -->
           <?php if ( has_post_thumbnail()) : ?>
                <div class="post_featured_img">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'full'); ?></a>
               </div>
             <?php endif; ?>
                <div class="post_details">
                	 <div class="date_posted">
                     		<div class="month_posted"><?php the_time('M') ?></div>
                        <div class="day_posted"><?php the_time('j') ?></div>
                   </div>

                     <div class="author">Posted By: <?php the_author() ?></div>
                </div>
                <div class="the_post">
                   <h2 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                   <p><?php the_excerpt();?></p>

                </div>
            </div><!-- single-excerpt -->
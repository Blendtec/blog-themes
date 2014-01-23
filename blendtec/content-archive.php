<div class="single-excerpt">
  <!-- displays thumbnail if it exists -->
  <?php if ( has_post_thumbnail()) : ?>
    <div class="post_featured_img">
        <div class="image_wrap">
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'full'); ?></a>
        </div>
    </div>
  <?php endif; ?>
  <div class="the_post">
    <h2 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
    <div class="author"><i class="icon-user"></i><?php the_author() ?></div><div class='date'><i class="icon-clock"></i><?php the_time("d F, Y") ?></div>
    <p><?php the_excerpt();?></p>
  </div>
</div><!-- single-excerpt -->
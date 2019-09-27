<div class="entry-meta">    
	  <p class="entry-tags">
      <span class="fui-calendar"></span> <time class="updated" datetime="<?php echo get_the_time('c'); ?>" pubdate><?php echo get_the_date(); ?></time>
      <?php the_tags(' <span class="fui-tag"></span> ',' ,',' '); ?>
  </p>
  <?php 
    if (comments_open()) {
      echo '<p class="entry-comments"><span class="fui-chat"></span> ';
      comments_number( __('0 Comments', 'processpress' ), __('1 Comment', 'processpress' ), __('% Comments', 'processpress' ) );
      echo '</p>';
    }
  ?>
</div>

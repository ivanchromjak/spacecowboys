<?php global $processpress; ?>

<footer class="footer uk-section uk-margin-remove uk-section-xsmall uk-text-small uk-light">
	<div class="uk-container">
	  <div class="uk-text-center" data-uk-grid>
			<div class="uk-width-expand@m uk-flex uk-flex-center uk-flex-right@m">
	      <?php
	        if (has_nav_menu('footer_navigation')) :
	          wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'uk-subnav', 'depth' => 1,));
	        endif;
	      ?>
	    </div>
	    <div class="uk-width-auto@m uk-flex-first@m uk-text-left@m uk-first-column">
	    	<p class="uk-text-small uk-text-muted"><?php echo $processpress['copyright']; ?></p>
	    </div>
	  </div>
	</div>
</footer>

<?php wp_footer(); ?>

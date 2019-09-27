<?php
global $processpress;
?>
<header class="header uk-position-relative">
  <div<?php echo ( $processpress['fixed_nav'] ? ' data-uk-sticky="animation: uk-animation-slide-top; top: 200; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent"' : '' ); ?>>
    <?php get_template_part('templates/navbar'); ?>
  </div>
  <div class="uk-section uk-section-header uk-light uk-position-relative uk-position-z-index">
  	<div class="uk-container">
      <?php get_template_part('templates/page', 'title'); ?>
  	</div>
  </div>
</header>

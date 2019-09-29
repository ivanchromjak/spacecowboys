<?php
$hero = get_field('hero');	
?>
<header class="header uk-position-relative uk-background-cover uk-background-center-left uk-animation-fade uk-position-z-index"<?php if ($hero['image']) { ?> style="background-image: url(<?php echo $hero['image']; ?>);"<?php } ?>>
  <div data-uk-sticky="animation: uk-animation-slide-top; top: 200; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent">
    <?php get_template_part('templates/navbar'); ?>
  </div>
  <div class="uk-section uk-section-large uk-light uk-position-relative uk-position-z-index uk-text-center">
  	<div class="uk-container uk-container-small">
      <h1 class="uk-heading-small"><?php echo roots_title(); ?></h1>
      <?php
      if (is_archive()) {
        echo category_description();
      }
      ?>
      <?php
      if ($hero['subtitle']) {
          echo '<span class="uk-text-lead">' . $hero['subtitle'] . '</span>';
      }
      if ($hero['button_text']) {
      ?>
        <p class="uk-margin-xlarge-top uk-margin-remove-bottom">
          <a class="uk-button uk-button-warning" href="#about" data-uk-scroll="offset: 90"><?php echo $hero['button_text']; ?></a>
        </p>
      <?php
      }
      ?>
  	</div>
  </div>
</header>

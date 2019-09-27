<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <?php do_action('get_header'); ?>

  <?php get_template_part('templates/header'); ?>
  
  <div class="uk-container uk-margin-large" role="document">
    <div data-uk-grid class="uk-grid-large">
      <div class="main" role="main">
        <?php include roots_template_path(); ?>
      </div><!-- /.main -->
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php get_template_part('templates/mobile'); ?>

  <?php get_template_part('templates/footer'); ?>

</body>
</html>

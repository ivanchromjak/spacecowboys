<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <?php do_action('get_header'); ?>

  <?php get_template_part('templates/header'); ?>
  
  <div class="main" role="main">
    <?php include roots_template_path(); ?>
  </div><!-- /.main -->

  <?php get_template_part('templates/mobile'); ?>

  <?php get_template_part('templates/footer'); ?>

</body>
</html>

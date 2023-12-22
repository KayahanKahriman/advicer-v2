<?php get_header(); ?>
<section class="breadcrumbs-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php custom_breadcrumbs(); ?>
      </div>
    </div>
  </div>
</section>
<section class="content-wrapper">
  <div class="container">
    <div class="row">
      <?php while (have_posts()) : the_post();
        get_template_part('template-parts/post/single', get_post_type());
      endwhile;
      ?>
    </div>
  </div>
</section>
<?php
get_footer();

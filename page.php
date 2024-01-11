<?php get_header();
?>


<section class="content-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php while (have_posts()) : the_post();
          get_template_part('template-parts/page/content', 'page');
        endwhile; ?>
      </div>
    </div>
  </div>
</section>
<?php
get_footer();

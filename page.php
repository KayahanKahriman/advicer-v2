<?php get_header();
if (!is_home() && !is_front_page()) : ?>
  <section class="breadcrumbs-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <?php custom_breadcrumbs(); ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<section class="content-wrapper">
  <div class="container">
    <div class="row">
      <?php while (have_posts()) : the_post();
        get_template_part('template-parts/page/content', 'page');
      endwhile; ?>
    </div>
  </div>
</section>
<?php
get_footer();

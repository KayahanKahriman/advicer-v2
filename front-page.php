<?php get_header();
if (have_posts()) :
  while (have_posts()) :
    the_post();
    get_template_part('template-parts/page/content', 'frontpage');
  endwhile;
else :
  get_template_part('template-parts/post/content', 'none');
endif;
?>

<?php
get_footer();

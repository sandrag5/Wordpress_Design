<?php get_header(); ?>


<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<!-- Content/News -->

<div id="title">
<div class="title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
<div class="posted"><?php the_time('d/m/Y') ?></div>
</div>

<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

      <div class="content">

<p>
<?php the_content(__('(más...)')); ?>
</p>
</div>

<div id="contentbottom">
</div><br/>

<!-- End Content/News -->



<!-- Comments Code -->

<?php comments_template(); // Get wp-comments.php template ?>

<!-- End Comments Code -->



<?php endwhile; else: ?>
<p><?php _e('Lo sentimos, no se ha encontrado.'); ?></p>
<?php endif; ?>

</div>
  

<?php get_footer(); ?>
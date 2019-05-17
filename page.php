<?php get_header(); ?>

<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<!-- Content/News -->

<div id="title">
<div class="title"><?php the_title(); ?></div>
</div>

<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		  <div class="content">
		<p>
		<?php the_content(__('(más...)')); ?>
		</p>
	</div>
	<div id="contentbottom">
	</div>
</div>

<!-- End Content/News -->

<?php endwhile; else: ?>
<p><?php _e('Lo sentimos, no se ha encontrado.'); ?></p>
<?php endif; ?>


</div>

<?php get_footer(); ?>
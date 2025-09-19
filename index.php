<?php get_header(); ?>

<?php $bgColor = get_field('page_bg_color'); ?>

<?php while (have_posts()) : the_post(); ?>
    <div class="page-container" style="background-color: <?= $bgColor ?>; --bg-color: <?= $bgColor ?>;">
        <?php the_content(); ?>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>
<?php get_header(); ?>

<?php $bgColor = get_field('page_bg_color'); ?>
<?php if(have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="page-container" style="background-color: #F5F3EE; --bg-color: #F5F3EE;">
            <div class="container">
                <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
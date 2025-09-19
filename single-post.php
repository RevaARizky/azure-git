<?php get_header(); ?>

<?php $bgColor = get_field('page_bg_color'); ?>
<?php if(have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="page-container text-quote" style="background-color: #F5F3EE; --bg-color: #F5F3EE;">
            <section class="block-header trigger-on-window-scroll overflow-hidden" id="<?= esc_attr($id) ?>">
                <div class="inner">
                    <div class="media-wrapper relative has-darker w-[100vw] pt-[100vh] md:pt-[41%]">
                        <div class="md:container h-full text-white">
                            <div class="mobile-container text absolute flex z-10 top-1/2 -translate-y-1/2 items-center md:w-2/5">
                                <div class="box">
                                    <h3 class="text-headline"><?= get_the_title() ?></h3>
                                </div>
                            </div>
                        </div>
                        <img src="<?= get_the_post_thumbnail_url(get_the_id(), 'full') ?>" class="absolute inset-0 object-cover w-full h-full media" alt="">
                        <!-- <div class="absolute bottom-0 text-white left-0 right-0">
                        </div> -->
                    </div>
                </div>
            </section>
            <div class="container py-16">
                <!-- <div class="title mb-12">
                    <h1 class="text-center text-h1"><?= get_the_title() ?></h1>
                </div> -->
                <div class="content-wrapper revert-text text-theme-soft-black">
                    <?php the_content(); ?>
                </div>
            </div>

            <div class="container pb-12">
                <div class="other-news">
                    <?php 
                    
                        $loop = new WP_Query(array(
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'post_status' => 'publish',
                            'post__not_in' => array(get_the_id())
                        ));

                    ?>
                    <div class="title mb-8">
                        <p class="text-h1">Other News</p>
                    </div>
                    <div class="grid grid-cols-12 md:gap-x-16 gap-y-8">
                        <?php if($loop->have_posts()) : ?>
                            <?php while($loop->have_posts()) : ?>
                                <?php $loop->the_post() ?>
                                
                                <div class="md:col-span-4 col-span-12">
                                    <div class="image-wrapper pt-[65%] relative image-ratio mb-6">
                                        <a href="<?= get_the_permalink(get_the_id()) ?>">
                                            <img src="<?= get_the_post_thumbnail_url(get_the_id(), 'full'); ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="text-wrapper">
                                        <div class="title-wrapper">
                                            <p class="text-quotes"><a href="<?= get_the_permalink(get_the_id()) ?>"><?= get_the_title(get_the_id()) ?></a></p>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
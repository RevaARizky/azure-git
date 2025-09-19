<?php
/**
 * Block template file: block.php
 *
 * Hero Internal Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 * 
 * 
 */
// Create id attribute allowing for custom "anchor" value.
$id = 'event-list-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-event-list';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$loop = new WP_Query(array(
    'post_type' => 'event',
    'posts_per_page' => 3,
    'post_status' => 'publish'
));

?>
<?php if($loop->have_posts()) : ?>
    <div class="grid grid-cols-12 md:gap-x-12 gap-y-6">
        <?php while($loop->have_posts()) : ?>
            <?php $loop->the_post() ?>
            <div class="md:col-span-4 col-span-12">
                <div class="image-wrapper pt-[65%] relative mb-7">
                    <!-- <a href="<?= get_the_permalink() ?>"> -->
                        <img src="<?= get_the_post_thumbnail_url() ?>" alt="" class="absolute inset-0 w-full h-full object-cover">
                    <!-- </a> -->
                </div>
                <div class="text-wrapper">
                    <!-- <a href="<?= get_the_permalink() ?>"> -->
                        <div class="info mb-2.5">
                            <p class="text-small mb-1"><span class="mr-1"><?= get_field('date', get_the_id()) ?></span> | <span class="ml-1"><?= get_field('location', get_the_id()) ?></span></p>
                            <!-- <p class="text-small"></p> -->
                        </div>
                        <p class="text-quote font-medium"><?= get_the_title() ?></p>
                    <!-- </a> -->
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
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
$id = 'post-list-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-post-list';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$loop = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 4,
    'post_status' => 'publish'
));

if($loop->have_posts()) :
?>

<div class="grid grid-cols-12">
    <?php while($loop->have_posts()) : $loop->the_post(); ?>
        <div class="col-span-12">
            <div class="wrapper py-8 px-8 md:px-16<?= ($loop->current_post+1) != $loop->post_count ? " border-b border-b-[rgba(74,74,74,.4)]" : '' ?>">
                <div class="flex gap-y-6 justify-between items-center md:flex-nowrap flex-wrap">
                    <div class="text-wrapper w-full md:max-w-[29rem] order-1 md:order-0">
                        <div class="date mb-2">
                            <p class="text-theme-soft-grey"><?= get_the_date( 'F j, Y' ); ?></p>
                        </div>
                        <div class="description mb-10">
                            <p class="text-quote text-theme-soft-black leading-snug"><?= get_field('short_description', get_the_id()) ?></p>
                        </div>
                        <div class="cta">
                            <a href="<?= get_the_permalink() ?>" class="flex items-center gap-x-2">
                                <p class="text-theme-blue text-button">See Details</p>
                                <div class="w-[20px] h-[20px] flex justify-center items-center">
                                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.3172 7.44205L9.69219 13.067C9.57491 13.1843 9.41585 13.2502 9.25 13.2502C9.08415 13.2502 8.92509 13.1843 8.80781 13.067C8.69054 12.9498 8.62465 12.7907 8.62465 12.6249C8.62465 12.459 8.69054 12.2999 8.80781 12.1827L13.3664 7.62486H1.125C0.95924 7.62486 0.800269 7.55901 0.683058 7.4418C0.565848 7.32459 0.5 7.16562 0.5 6.99986C0.5 6.8341 0.565848 6.67513 0.683058 6.55792C0.800269 6.44071 0.95924 6.37486 1.125 6.37486H13.3664L8.80781 1.81705C8.69054 1.69977 8.62465 1.54071 8.62465 1.37486C8.62465 1.20901 8.69054 1.04995 8.80781 0.932672C8.92509 0.815396 9.08415 0.749512 9.25 0.749512C9.41585 0.749512 9.57491 0.815396 9.69219 0.932672L15.3172 6.55767C15.3753 6.61572 15.4214 6.68465 15.4529 6.76052C15.4843 6.8364 15.5005 6.91772 15.5005 6.99986C15.5005 7.08199 15.4843 7.16332 15.4529 7.2392C15.4214 7.31507 15.3753 7.384 15.3172 7.44205Z" fill="#164371"/>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="image-box max-w-96 w-full order-0 md:order-1">
                        <div class="image-wrapper relative pt-[55%]">
                            <a href="<?= get_the_permalink() ?>">
                                <img src="<?= get_the_post_thumbnail_url() ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <div class="col-span-12 text-center">
        <div class="inner py-8">
            <InnerBlocks template="<?= esc_attr(wp_json_encode(array(array('acf/button')))) ?>" />
        </div>
    </div>
</div>
<?php endif ?>
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
$id = 'image-grid-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-image-grid';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// $content = get_field('content');

// $media = get_field('media');

$media = get_field('gallery');
?>


<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="container hidden md:block">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-6">
                <div class="image-wrapper relative w-full pt-[60%] mb-4 bg-white overflow-hidden">
                    <img src="<?= $media[0]['url'] ?>" alt="" class="absolute inset-0 w-full h-full object-cover">
                </div>
                <div class="image-wrapper relative w-full pt-[40%] bg-white overflow-hidden">
                    <img src="<?= $media[1]['url'] ?>" alt="" class="absolute inset-0 w-full h-full object-cover">
                </div>
            </div>
            <div class="col-span-6">
                <div class="image-wrapper relative w-full pt-[calc(100%+1rem)] bg-white overflow-hidden">
                    <img src="<?= $media[2]['url'] ?>" alt="" class="absolute inset-0 w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
    <div class="block md:hidden image-grid">
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach($media as $image) : ?>
                    <div class="swiper-slide">
                        <div class="image-wrapper relative w-full pt-[150%] overflow-hidden">
                            <img src="<?= $image['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
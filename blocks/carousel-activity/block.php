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
$id = 'carousel-activity-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-carousel-activity';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$carousel = get_field('carousel');
?>

<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">
    <div class="inner py-6 relative">
        <div class="swiper" data-carousel-gap="76" data-carousel-navigation="1">
            <div class="swiper-wrapper">
                <?php foreach($carousel as $i => $image) : ?>
                    <div class="swiper-slide">
                        <div class="image-wrapper pt-[180%] relative overflow-hidden swiper-overlay">
                            <img src="<?= $image['image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                            <div class="text-wrapper absolute bottom-6 left-6 z-[2]">
                                <p class="text-white"><?= $image['text'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="button-prev absolute top-1/2 left-4 w-[40px] h-[40px] bg-[rgba(245,243,238,0.6)] hover:bg-[rgba(245,243,238,1)] transition -translate-y-1/2 z-10 flex items-center justify-center rounded-full cursor-pointer"><img src="<?= assets_url('/dist/images/chevron-left.svg') ?>" width="8" height="16" alt=""></div>
            <div class="button-next absolute top-1/2 right-4 w-[40px] h-[40px] bg-[rgba(245,243,238,0.6)] hover:bg-[rgba(245,243,238,1)] transition -translate-y-1/2 z-10 flex items-center justify-center rounded-full cursor-pointer"><img src="<?= assets_url('/dist/images/chevron-right.svg') ?>" width="8" height="16" alt=""></div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
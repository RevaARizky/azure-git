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
$id = 'full-text-box-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-full-text-box';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$bgImage = get_field('bg_image');
?>

<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?> section-strips section-reverse-strips">

    <div class="outer relative">
        <div class="image-wrapper absolute w-full h-full" style="z-index: 1;">
            <img src="<?= $bgImage['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
        </div>
        <div class="inner py-80 container relative" style="z-index: 2;">
            <div data-speed="1.5" data-scroll class="box-wrapper md:w-[max(50%,600px)] relative bg-theme-beach md:p-12 p-6 relative">
                <InnerBlocks />
            </div>
        </div>
    </div>

</section>
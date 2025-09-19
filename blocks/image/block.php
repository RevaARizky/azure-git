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
$id = 'image-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-image';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$image = get_field('image');

// $image = ['url' => 'https://picsum.photos/id/15/1920/1080'];

$ratio = get_field('ratio');
$mobileRatio = get_field('mobile_ratio') ? get_field('mobile_ratio') : $ratio;
?>

<section class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>" data-desktop-ratio="<?= $ratio ?>" data-mobile-ratio="<?= $mobileRatio ?>">
    <div class="image-wrapper relative overflow-hidden" style="padding-top: var(--ratio);">
        <img src="<?= $image['url'] ?>" class="absolute left-0 right-0 bottom-0 w-full object-cover" alt="">
    </div>
</section>

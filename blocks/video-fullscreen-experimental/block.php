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
$id = 'video-fullscreen-experimental-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-video-fullscreen-experimental';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$video = get_field('video');
$overlayText = get_field('text')
?>
<section class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">
    <div class="outer">
        <div class="inner">
            <div class="container video--container">
                <div class="video-wrapper relative md:pt-[52%] pt-[100%] cursor-wrapper overflow-hidden">
                    <video src="<?= $video['url'] ?>" muted loop class="absolute object-cover inset-0 w-full h-full" data-speed=".4"></video>
                </div>
            </div>
        </div>
    </div>
</section>
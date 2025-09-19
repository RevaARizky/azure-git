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
$id = 'header-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-header';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// $content = get_field('content');

if(get_field('media')) {
    $media = get_field('media');
} else {
    $media = ['url' => assets_url('/dist/placeholder/placeholder.mp4'), 'type' => 'video'];
}
$half = get_field('is_half');
$has_darker = get_field('add_opacity');
// $template = [
//     [
//         'acf/marquee',
//         [/** extra propery here */]
//     ]
// ];

?>

<section class="<?= esc_attr($classes) ?> section-strips trigger-on-window-scroll overflow-hidden" data-experimental="true" id="<?= esc_attr($id) ?>">
    <div class="inner">
        <div class="media-wrapper relative <?= $has_darker ? 'has-darker' : '' ?> w-[100vw] pt-[max(100vh,600px)]<?= $half ? " md:pt-[41%]" : '' ?>">
            <!-- <div class="cursor">
                Discover More
            </div> -->
            <div class="md:container h-full text-white">
                <div class="mobile-container text absolute flex z-10 top-1/2 -translate-y-1/2 items-center md:w-[max(40%,500px)]">
                    <div class="box">
                        <InnerBlocks />
                    </div>
                </div>
            </div>
            
            <?php if($media['type'] == 'image') : ?>
                <img src="<?= $media['url'] ?>" class="absolute inset-0 object-cover w-full h-full media" alt="">
            <?php endif; ?>
            <?php if($media['type'] == 'video') : ?>
                <video src="<?= $media['url'] ?>" autoplay muted loop class="absolute inset-0 object-cover w-full h-full media"></video>
            <?php endif; ?>
            <!-- <div class="absolute bottom-0 text-white left-0 right-0">
            </div> -->
        </div>
    </div>
</section>
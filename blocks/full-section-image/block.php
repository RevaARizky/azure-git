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
$id = 'container-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-container';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// $content = get_field('content');

// $media = get_field('media');

$media = ['url' => assets_url('/dist/placeholder/placeholder.mp4')];

?>

<section class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">

    <div class="grid grid-cols-12">
        <div class="col-span-5 h-[100vh]">

        </div>
        <div class="col-span-7">

        </div>
    </div>    

</section>
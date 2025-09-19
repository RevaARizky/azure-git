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
$id = 'image-text-box-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-image-text-box';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// $content = get_field('content');

// $media = get_field('media');

$media = ['url' => assets_url('/dist/placeholder/placeholder.mp4')];

$template = [
    [
        'acf/marquee',
        [/** extra propery here */]
    ]
];

?>


<section id="<?= esc_attr($id) ?>" class="<?= esc_attr($classes) ?>">

</section>
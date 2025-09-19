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
$id = 'three-column-container-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-three-column-container';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$isContainer = get_field('is_container');
$template = [
    ['acf/three-column-item'],
    ['acf/three-column-item'],
    ['acf/three-column-item'],
];

$alignItems = get_field('align_items');
// $gapX = get_field('gap_x');
$gapX = '16';
// items-center items-end items-start md:gap-x-16
?>
<section class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">
    <div class="wrapper<?= $isContainer ? ' container' : '' ?>">
        <div class="grid gap-y-6 md:gap-<?= $gapX ?> grid-cols-12<?= $alignItems ? ' items-' . $alignItems : '' ?>">
            <InnerBlocks template="<?= esc_attr(wp_json_encode($template)) ?>" />
        </div>
    </div>
</section>
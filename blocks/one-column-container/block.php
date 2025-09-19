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
$id = 'one-column-container-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-one-column-container';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// $isContainer = get_field('is_container');
$isContainer = true;
$template = [
    ['acf/one-column-item'],
];

?>
<div class="wrapper<?= $isContainer ? ' container' : '' ?>">
    <div class="grid grid-cols-12">
        <InnerBlocks template="<?= esc_attr(wp_json_encode($template)) ?>" templateLock="all" />
    </div>
</div>
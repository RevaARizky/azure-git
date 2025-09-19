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
$isContainer = get_field('is_container');
// $isContainer = true;
$template = [
    ['acf/column'],
];
$gap = get_field('gap');
$style = 'style="';
if(get_field('color')) {
    $style .= 'background-color: '. get_field('color') . ';';
    // $color = 'data-section-color="'.get_field('color').'"';
}

$align = get_field('align');

if(get_field('background')) {
    $style .= 'background-image: url('. get_field('background')['url'] .');';
}
$style .= '"';
// md:gap-16 md:gap-5 md:gap-6 md:items-center md:items-end md:items-start

?>
<section class="<?= esc_attr($classes . ' bg-cover bg-center') ?>" id="<?= esc_attr($id) ?>" <?= $style ?>>
    <div class="wrapper<?= $isContainer ? ' container' : '' ?>">
        <div class="grid grid-cols-12 gap-6 md:gap-<?= $gap ?><?= $align ? ' md:items-'.$align : '' ?>">
            <InnerBlocks template="<?= esc_attr(wp_json_encode($template)) ?>" />
        </div>
    </div>
</section>
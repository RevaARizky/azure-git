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
$id = 'button-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-button';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$args = [];

$lists = array('background-color', 'font-color', 'border-color', 'hover-background-color', 'hover-font-color');
$style = array();
foreach($lists as $index => $list) {
    $searchFor = str_replace('-', '_', $list);
    if($search = get_field($searchFor)) {
        $style[$list] = $search;
    }
}
if(get_field('border_color')) {
    $style['border-width'] = '1px';
}
$args['style'] = $style;
if(get_field('arrow')) {
    $label = '<p class="flex gap-x-4 items-center"><span>' . get_field('label') . '</span><span><img src="'.assets_url('/dist/images/right-arrow.svg').'" width="20" height="20"></p>';
} else {
    $label = get_field('label');
}

if(!empty($args['style'])) {
    $vars = '';
    foreach($args['style'] as $prop => $style) {
        $vars .= '--btn-'.$prop.': '.$style.';';
    }
    if($args['style']['border-color']) {
        $vars .= '--btn-border-width: 1px;';
    }
}
?>

<div class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">
    <a href="<?= get_field('url') ? get_field('url') : '#' ?>" class="button button-liquid button--stroke<?= get_field('big_button') ? ' button-big' : '' ?> <?= $block['className'] ?>" style="<?= isset($vars) ? $vars : '' ?>" <?= get_field('open_tab') ? 'target="_blank"' : '' ?>>
        <span class="button__flair"></span>
        <span class="button__label text-button"><?= $label ?></span>
    </a>
</div>
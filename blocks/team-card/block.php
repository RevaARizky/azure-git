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
$id = 'team-card-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-team-card';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$image = get_field('image');
$name = get_field('name');
$title = get_field('title')

?>

<section class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">

    <div class="image-wrapper relative pt-[78%]">
        <img src="<?= $image['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
    </div>
    <div class="text-wrapper z-[2] mb-6">
        <div class="team-name-wrapper mb-1">
            <p class="text-body leading-normal"><?= $name ?></p>
        </div>
        <div class="team-title-wrapper">
            <p class="text-small leading-normal"><?= $title ?></p>
        </div>
    </div>

</section>
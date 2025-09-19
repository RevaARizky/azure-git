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
$id = 'marquee-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-marquee';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// $content = get_field('content');

// $marquee = get_field('marquee');

$marquee = [
    'Lorem',
    'ipsum',
    'dolor',
    'sit',
    'amet',
];



?>

<section class="<?= esc_attr($classes) ?> overflow-hidden" id="<?= esc_attr($id) ?>">

    <div class="marquee-wrapper text-6xl flex gap-x-4">
        <?php foreach($marquee as $i => $item) : ?>
            <div class="marquee-item<?= $i ? '' : ' pl-4' ?>">
                <p class="">  <?= $item ?>  </p>
            </div>
            <div class="marquee-item">
                <p class=""> • </p>
            </div>
        <?php endforeach; ?>
        <?php foreach($marquee as $item) : ?>
            <div class="marquee-item">
                <p class=""> <?= $item ?> </p>
            </div>
            <div class="marquee-item">
                <p class=""> • </p>
            </div>
        <?php endforeach; ?>
    </div>

</section>
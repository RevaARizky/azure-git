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
$id = 'table-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-table';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$items = get_field('items');
?>
<section class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">

    <div class="grid grid-cols-10 gap-x-4 overflow-x-auto md:w-full w-max">
        <div class="col-span-12 py-2">
            <hr style="border-color: #000;">
        </div>
        <div class="col-span-2 pl-2">
            <p class="font-medium text-theme-soft-gray">SCENARIO</p>
        </div>
        <div class="col-span-2 pl-2">
            <p class="font-medium text-theme-soft-gray">NIGHTLY RATE</p>
        </div>
        <div class="col-span-2 pl-2">
            <p class="font-medium text-theme-soft-gray">GROSS</p>
        </div>
        <div class="col-span-2 pl-2">
            <p class="font-medium text-theme-soft-gray">NET INCOME</p>
        </div>
        <div class="col-span-2 pl-2">
            <p class="font-medium text-theme-soft-gray">ROI (%)</p>
        </div>
        <div class="col-span-12 py-2">
            <hr style="border-color: #000;">
        </div>
        <?php foreach($items as $i => $item) : ?>
        <div class="col-span-12 py-2">
            <!-- <hr style="border-color: #000;"> -->
        </div>
        <div class="col-span-2 pl-2">
            <p class="text-theme-soft-gray"><?= $item['value']['scenario'] ?></p>
        </div>
        <div class="col-span-2 pl-2">
            <p class="text-theme-soft-gray"><?= $item['value']['rate'] ?></p>
        </div>
        <div class="col-span-2 pl-2">
            <p class="text-theme-soft-gray"><?= $item['value']['gross'] ?></p>
        </div>
        <div class="col-span-2 pl-2">
            <p class="text-theme-soft-gray"><?= $item['value']['income'] ?></p>
        </div>
        <div class="col-span-2 pl-2">
            <p class="text-theme-soft-gray"><?= $item['value']['roi'] ?></p>
        </div>
        <?php endforeach; ?>

    </div>

</section>
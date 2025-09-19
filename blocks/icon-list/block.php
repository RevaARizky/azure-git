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
$id = 'icon-list-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-icon-list';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$icons = get_field('icons');
?>

<section class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">
    <div class="grid grid-cols-12 gap-y-8">
        <?php foreach($icons as $i => $icon) : ?>
            <div class="md:col-span-4 col-span-12">
                <div class="box text-center md:px-12">
                    <div class="icon-wrapper mx-auto mb-6 w-[80px] h-[80px] <?= $icon['small_padding'] ? 'p-4' : 'p-6' ?> rounded-full flex justify-center items-center bg-theme-beach">
                        <img src="<?= $icon['icon']['url'] ?>" class="w-full" alt="">
                    </div>
                    <div class="text-wrapper md:w-3/4 mx-auto">
                        <div class="title mb-2">
                            <p class="text-quote text-white"><?= $icon['title'] ?></p>
                        </div>
                        <div class="description should-align-line">
                            <p class="text-small text-white"><?= $icon['description'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>

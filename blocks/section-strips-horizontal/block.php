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
$id = 'section-strips-horizontal-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-section-strips-horizontal';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

$items = get_field('items');
if($items) : 
?>
<section class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">

    <div class="inner relative overflow-hidden">
        <div class="image-wrapper background relative w-screen h-screen">
            <?php foreach($items as $i => $item) : ?>
                    <img src="<?= $item['background'] ?>" class="w-screen h-screen object-cover absolute" style="z-index:<?= count($items) - $i ?>;" alt="">
            <?php endforeach; ?>
        </div>

        <!-- <div class="box absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 z-10 bg-theme-beach max-w-2xl w-full p-24 pb-48"> -->
            <!-- <div class="title-wrapper text-center mb-8">
                <div class="counter text-theme-blue mb-6">
                    <span class="changeable">1</span>
                    / <?= count($items) ?>
                </div> -->
        <div class="wrapper">
            <div class="outer absolute w-full top-1/2 -translate-y-1/2 z-10">
                <div class="title relative">
                    <?php foreach($items as $i => $item) : ?>
                    <div class="split-title container absolute w-full h-full inset-0 text-white text-extra-headline" style="z-index: <?= count($items) - $i ?>;"><?= $item['title'] ?></div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
            <!-- <div class="image-wrapper relative pt-[62%] image-ratio mb-12">
                <?php foreach($items as $i => $item) : ?>
                    <img src="<?= $item['background'] ?>" alt="" style="z-index: <?= count($items) - $i ?>;">
                <?php endforeach; ?>
            </div>
            <div class="text-wrapper relative text-center">
                <?php foreach($items as $i => $item) : ?>
                <div class="split absolute w-full h-full inset-0 text-theme-blue" style="z-index: <?= count($items) - $i ?>;"><?= $item['text'] ?></div>
                <?php endforeach ?>
            </div> -->

    </div>

</section>

<?php endif; ?>
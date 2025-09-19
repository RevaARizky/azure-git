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
$id = 'property-overview-experimental-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-property-overview-experimental';
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
    <!-- <div class="outer container h-[50vh] relative"> -->
    <div class="inner relative overflow-hidden">
        <div class="image-wrapper background relative w-screen h-screen">
            <?php foreach($items as $i => $item) : ?>
                <?php if($item['background']['type'] == 'image') : ?>
                    <img src="<?= $item['background']['url'] ?>" class="background-item w-screen h-screen object-cover absolute inset-0" style="z-index:<?= count($items) - $i ?>;" alt="">
                <?php elseif ($item['background']['type'] == 'video') : ?>
                    <video src="<?= $item['background']['url'] ?>" style="z-index:<?= count($items) - $i ?>;" class="background-item w-screen h-screen object-cover absolute inset-0"></video>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="container">
            <div class="outer absolute w-full top-1/2 -translate-y-1/2 z-10">
                <div class="title relative pt-16">
                    <?php foreach($items as $i => $item) : ?>
                    <div class="split-title absolute w-full h-full inset-0 text-white text-extra-headline" style="z-index: <?= count($items) - $i ?>;"><?= $item['title'] ?></div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

        <div class="counter"></div>
    </div>
    <!-- </div> -->

</section>

<?php endif; ?>
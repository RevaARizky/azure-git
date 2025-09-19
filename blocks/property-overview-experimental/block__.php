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

$items = [
    [
        'image' => 'https://picsum.photos/1920/1080',
        'background' => assets_url('/dist/placeholder/image_5.jpg'),
        'text' => 'text 1 Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat officia iure inventore pariatur, ut qui! Ad tempora totam quos et?',
        'title' => 'title 1 Innovative Design by <br />Azure View Properties:  Zuri Villas'
    ],
    [
        'image' => 'https://picsum.photos/1920/1079',
        'background' => assets_url('/dist/placeholder/image_2.jpg'),
        'text' => 'text 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa ratione delectus quasi ut? Ea rerum tempora optio. Suscipit, animi soluta.',
        'title' => 'title 2 Innovative Design by <br />Azure View Properties:  Zuri Villas'
    ],
    [
        'image' => 'https://picsum.photos/1920/1084',
        'background' => assets_url('/dist/placeholder/image_6.jpg'),
        'text' => 'text 3 Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni ipsam illo laudantium nostrum quod magnam ut, ducimus expedita sequi quaerat!',
        'title' => 'title 3 Innovative Design by <br />Azure View Properties:  Zuri Villas'
    ],
    [
        'image' => 'https://picsum.photos/1920/1086',
        'background' => assets_url('/dist/placeholder/image_4.jpg'),
        'text' => 'text 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem dolor sapiente eveniet iure! Aliquid nesciunt iste harum ex aliquam saepe.',
        'title' => 'title 4 Innovative Design by <br />Azure View Properties:  Zuri Villas'
    ],
]

?>

<!-- <section class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">
    <div class="inner relative" style="--bg-color: #fff;">
        <div class="h-screen absolute box w-screen border border-black" style="">
            <div class="inner-box section-strips h-full w-full">
                <img src="https://picsum.photos/1920/1080" class="absolute inset-0 object-cover w-full h-full" alt="">
                <div class="w-full h-full flex absolute inset-0 justify-center items-center">
                    <p>box 1</p>
                </div>
            </div>
        </div>
        <div class="h-screen absolute box w-screen border border-black" style="">
            <div class="inner-box section-strips h-full w-full">
                <img src="https://picsum.photos/1920/1080" class="absolute inset-0 object-cover w-full h-full" alt="">
                <div class="w-full h-full flex absolute inset-0 justify-center items-center">
                    <p class="text-white">box 2</p>
                </div>
            </div>
        </div>
        <div class="h-screen absolute box w-screen border border-black" style="">
            <div class="inner-box section-strips h-full w-full">
                <img src="https://picsum.photos/1920/1080" class="absolute inset-0 object-cover w-full h-full" alt="">
                <div class="w-full h-full flex absolute inset-0 justify-center items-center">
                    <p>box 3</p>
                </div>
            </div>
        </div>
        <div class="h-screen absolute box w-screen border border-black" style="">
            <div class="inner-box section-strips h-full w-full">
                <img src="https://picsum.photos/1920/1080" class="absolute inset-0 object-cover w-full h-full" alt="">
                <div class="w-full h-full flex absolute inset-0 justify-center items-center">
                    <p>box 4</p>
                </div>
            </div>
        </div>
    </div>
</section> -->

<section class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">

    <div class="inner relative overflow-hidden">
        <div class="image-wrapper background relative w-screen h-screen">
            <?php foreach($items as $i => $item) : ?>
                    <img src="<?= $item['background'] ?>" class="w-screen h-screen object-cover absolute" style="z-index:<?= count($items) - $i ?>;" alt="">
            <?php endforeach; ?>
        </div>

        <div class="box absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 z-10 bg-theme-beach max-w-2xl w-full p-24 pb-48">
            <div class="title-wrapper text-center mb-8">
                <div class="counter text-theme-blue mb-6">
                    <span class="changeable">1</span>
                    / <?= count($items) ?>
                </div>
                <div class="title relative pt-16">
                    <?php foreach($items as $i => $item) : ?>
                    <div class="split-title absolute w-full h-full inset-0 text-theme-blue" style="font-size: 20px; z-index: <?= count($items) - $i ?>;"><?= $item['title'] ?></div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="image-wrapper relative pt-[62%] image-ratio mb-12">
                <?php foreach($items as $i => $item) : ?>
                    <img src="<?= $item['background'] ?>" alt="" style="z-index: <?= count($items) - $i ?>;">
                <?php endforeach; ?>
            </div>
            <div class="text-wrapper relative text-center">
                <?php foreach($items as $i => $item) : ?>
                <div class="split absolute w-full h-full inset-0 text-theme-blue" style="z-index: <?= count($items) - $i ?>;"><?= $item['text'] ?></div>
                <?php endforeach ?>
            </div>
        </div>

    </div>

</section>
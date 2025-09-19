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
$id = 'accordion-image-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-accordion-image';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// $content = get_field('content');

// $accordions = get_field('accordions');

$accordions = [
    [
        'image' => ['url' => 'https://picsum.photos/id/14/1920/1080'],
        'text' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.'
    ],
    [
        'image' => ['url' => 'https://picsum.photos/id/15/1920/1080'],
        'text' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.'
    ],
    [
        'image' => ['url' => 'https://picsum.photos/id/16/1920/1080'],
        'text' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.'
    ],
    [
        'image' => ['url' => 'https://picsum.photos/id/17/1920/1080'],
        'text' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.'
    ],
    [
        'image' => ['url' => 'https://picsum.photos/id/18/1920/1080'],
        'text' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.'
    ],
]

?>

<section class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">

    <div class="container-fluid">
        <div class="grid grid-cols-12 lg:gap-x-32">

            <div class="col-span-4">
                <div class="image-wrapper relative pt-[108%] overflow-hidden">
                    <?php foreach($accordions as $i => $accordion) : ?>
                        <img data-id="<?= $i ?>" src="<?= $accordion['image']['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                    <?php endforeach; ?>
                </div>    
            </div>

            <div class="col-span-8">
                <div class="accordion-wrapper relative">
                    <div class="accordion-hover"></div>
                    <div class="inner flex flex-col items-center justify-center">
                        <?php foreach($accordions as $i => $accordion) : ?>
                            <div class="accordion-item w-full py-8 px-4 border-t border-b border-black<?= $i ? '' : ' active' ?>" data-id="<?= $i ?>">
                                <p><?= $accordion['text'] ?></p>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>
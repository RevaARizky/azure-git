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
$id = 'tabs-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-tabs';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$accordions = get_field('accordion');
$accordions = [
    [
        'image' => ['url' => 'https://picsum.photos/id/14/1920/1080'],
        'text' => 'Discover Azure View Properties',
        'url' => '/projects'
    ],
    [
        'image' => ['url' => 'https://picsum.photos/id/15/1920/1080'],
        'text' => 'Meet Our Team',
        'url' => '/about'
    ]
]

?>

<div class="<?= esc_attr($classes . ' tabs-wrapper relative') ?>" id="<?= esc_attr($id) ?>">
    <div class="accordion-hover hidden"></div>
    <div class="inner flex flex-col items-center justify-center">
        <?php foreach($accordions as $i => $accordion) : ?>
            <div class="accordion-item w-full relative overflow-hidden <?= count($accordions) == ($i + 1) ? 'border-b border-t' : 'border-t' ?> border-dashed border-black<?= $i ? '' : ' active' ?>" data-id="<?= $i ?>">
                <a href="<?= $accordion['url'] ?>" class="py-6 px-4 block relative z-[1]">
                    <p class="text-h2 text-theme-blue flex items-center justify-between"><span><?= $accordion['text'] ?></span><span><img src="<?= assets_url('/dist/images/top-arrow.svg') ?>" width="20" heigth="20" alt=""></span></p>
                </a>
                <div class="accordion-hover absolute w-full h-full inset-0"></div>
            </div>
        <?php endforeach ?>
    </div>
</div>
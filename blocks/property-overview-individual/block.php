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
$id = 'property-overview-individual-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-property-overview-individual';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}

// $properties = get_field('properties');

$images = get_field('images');
$title = get_field('title');
$specs = get_field('specs');
$imageLast = get_field('image_last');
?>

<section class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">

    <div class="grid grid-cols-12 gap-y-12 md:gap-y-0">
        <div class="md:col-span-6 col-span-12 relative<?= $imageLast ? " md:order-2" : " md:order-1" ?>">
            <div class="button-prev absolute top-1/2 left-4 w-[40px] h-[40px] bg-[rgba(245,243,238,0.6)] hover:bg-[rgba(245,243,238,1)] transition -translate-y-1/2 z-10 flex items-center justify-center rounded-full cursor-pointer"><img src="<?= assets_url('/dist/images/chevron-left.svg') ?>" width="8" height="16" alt=""></div>
            <div class="button-next absolute top-1/2 right-4 w-[40px] h-[40px] bg-[rgba(245,243,238,0.6)] hover:bg-[rgba(245,243,238,1)] transition -translate-y-1/2 z-10 flex items-center justify-center rounded-full cursor-pointer"><img src="<?= assets_url('/dist/images/chevron-right.svg') ?>" width="8" height="16" alt=""></div>
            <div class="text-center mx-auto relative">
                <div class="swiper property-image">
                    <div class="swiper-wrapper">
                        <?php foreach($images as $i => $property) : ?>
                            <div class="swiper-slide">
                                <div class="image-wrapper relative w-full pt-[78%]">
                                    <img src="<?= $property['url'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="md:col-span-6 col-span-12 md:order-1">
            <div class="table-wrapper md:px-16">
                <div class="tab-wrapper flex gap-x-4 pb-4 border-b border-b-theme-blue mb-4">
                    <div class="tab tab-trigger text-quote text-theme-soft-gray">
                        <?= $title ?>
                    </div>
                </div>
                <?php foreach($specs as $i => $spec) : $isLast = count($specs) == ($i + 1) ?>
                    <div class="flex text-theme-soft-gray justify-between items-center <?= $isLast ? 'py-4 px-4' : 'py-2 px-4' ?>">
                        <div class="title">
                            <li class="<?= $isLast ? 'text-body' : 'text-small' ?> list-disc"><?= $spec['title'] ?></li>
                        </div>
                        <div class="specs">
                            <p class="<?= $isLast ? 'text-body' : 'text-small' ?>"><?= $spec['specs'] ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

</section>
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
$id = 'accordion-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-accordion';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
// $content = get_field('content');

$accordions = get_field('accordions');

// $accordions = [
//     [
//         'title' => 'Lorem ipsum dolor sit amet consectetur.',
//         'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, accusantium nam? Ipsum deserunt vero eligendi.'
//     ],
//     [
//         'title' => 'Lorem ipsum dolor sit amet consectetur.',
//         'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, accusantium nam? Ipsum deserunt vero eligendi.'
//     ],
//     [
//         'title' => 'Lorem ipsum dolor sit amet consectetur.',
//         'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, accusantium nam? Ipsum deserunt vero eligendi.'
//     ],
//     [
//         'title' => 'Lorem ipsum dolor sit amet consectetur.',
//         'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, accusantium nam? Ipsum deserunt vero eligendi.'
//     ],
// ]

?>

<div class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">
    <div class="accordion-wrapper" data-accordion>
        <?php foreach($accordions as $i => $accordion) : ?>
            <div class="accordion-item cursor-pointer">
                <div class="accordion-title-wrapper flex justify-between py-6 px-4">
                    <div class="text">
                        <p class="text-quote"><?= $accordion['title'] ?></p>
                    </div>
                    <div class="icon w-[24px] h-[24px] flex justify-center items-center">
                        <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.7869 1.7809L8.51452 9.28006C8.44698 9.34978 8.36677 9.4051 8.27849 9.44284C8.1902 9.48058 8.09557 9.5 8 9.5C7.90443 9.5 7.8098 9.48058 7.72151 9.44284C7.63323 9.4051 7.55302 9.34978 7.48548 9.28006L0.213121 1.7809C0.0766618 1.64018 0 1.44933 0 1.25033C0 1.05133 0.0766618 0.860482 0.213121 0.719767C0.34958 0.579052 0.534658 0.5 0.72764 0.5C0.920622 0.5 1.1057 0.579052 1.24216 0.719767L8 7.6893L14.7578 0.719767C14.8254 0.650092 14.9056 0.594823 14.9939 0.557115C15.0822 0.519408 15.1768 0.5 15.2724 0.5C15.3679 0.5 15.4625 0.519408 15.5508 0.557115C15.6391 0.594823 15.7193 0.650092 15.7869 0.719767C15.8544 0.789442 15.908 0.872158 15.9446 0.963193C15.9812 1.05423 16 1.1518 16 1.25033C16 1.34887 15.9812 1.44644 15.9446 1.53747C15.908 1.62851 15.8544 1.71122 15.7869 1.7809Z" fill="#2E2E2E"/>
                        </svg>
                    </div>
                </div>
                <div class="accordion-description-wrapper overflow-hidden px-4">
                    <p><?= $accordion['description'] ?></p>
                    <div class="pb-4"></div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
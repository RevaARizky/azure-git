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
$id = 'form-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-form';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>
<section class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>" <?= $color ?>>
    <div class="px-4 py-6 wrapper<?= $isContainer ? ' container' : '' ?>">
        <!-- <div class="grid grid-cols-12 gap-6 md:gap-<?= $gap ?>">
            <InnerBlocks template="<?= esc_attr(wp_json_encode($template)) ?>" />
        </div> -->
        <?= do_shortcode('[contact-form-7 id="04c7199" title="Contact Form"]') ?>
    </div>
</section>

<!-- <div class="form">
        <div class="input-wrapper">
            <input type="text" class="bg-transparent border-0 px-8 py-10 text-theme-soft-dark-grey border-b border-b-theme-soft-dark-grey ">
            [text your-name class:px-8 class:py-10 class:text-theme-soft-dark-grey class:border-b class:border-b-theme-soft-dark-grey]
        </div>
        <div class="input-wrapper">
            <input type="text" class="px-8 py-10 text-theme-soft-dark-grey border-b border-b-theme-soft-dark-grey ">
            [email your-email class:px-8 class:py-10 class:text-theme-soft-dark-grey class:border-b class:border-b-theme-soft-dark-grey]
        </div>
        <div class="input-wrapper">
            <input type="text" class="px-8 py-10 text-theme-soft-dark-grey border-b border-b-theme-soft-dark-grey ">
            [textarea your-message class:px-8 class:py-10 class:text-theme-soft-dark-grey class:border-b class:border-b-theme-soft-dark-grey]
        </div>
        <div class="input-wrapper mb-6">
            <input type="text" class="px-8 py-10 text-theme-soft-dark-grey border-b border-b-theme-soft-dark-grey ">
            [textarea your-message class:px-8 class:py-10 class:text-theme-soft-dark-grey class:border-b class:border-b-theme-soft-dark-grey]
        </div>
        <div class="submit-wrapper">
            <a href="javascript:void(0)" class="button button-liquid button-form-cf7 button--stroke button-big text-center" style="--btn-background-color: #164371; --btn-hover-background-color: #214b77; --btn-font-color: #fff; --btn-hover-font-color: #fff;">
                <span class="button__flair"></span>
                <span class="button__label text-button">Submit Your Message</span>
            </a>
            [submit class:hidden]
        </div>
    </div> -->
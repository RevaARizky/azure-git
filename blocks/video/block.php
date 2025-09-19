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
$id = 'video-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}
// Create class attribute allowing for custom "className" and "align" values.
$classes = 'acf-block block-video';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
$video = get_field('video');

?>
<section class="<?= esc_attr($classes) ?>" id="<?= esc_attr($id) ?>">
    <div class="outer">
        <div class="video-wrapper relative md:pt-[52%] pt-[100%] cursor-wrapper overflow-hidden">
            <div class="parallax-wrapper absolute inset-0">
                <video src="<?= $video['url'] ?>" muted loop class="absolute object-cover inset-0 w-full h-full"></video>
            </div>
    
            <div class="rounded-full bg-white w-[80px] h-[80px] flex items-center justify-center absolute left-12 bottom-12 cursor">
                <svg width="30" height="28" class="pause-button hidden" viewBox="0 0 30 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M30 2.66667V29.3333C30 30.0406 29.7127 30.7189 29.2012 31.219C28.6897 31.719 27.996 32 27.2727 32H20.4545C19.7312 32 19.0375 31.719 18.5261 31.219C18.0146 30.7189 17.7273 30.0406 17.7273 29.3333V2.66667C17.7273 1.95942 18.0146 1.28115 18.5261 0.781048C19.0375 0.280951 19.7312 0 20.4545 0H27.2727C27.996 0 28.6897 0.280951 29.2012 0.781048C29.7127 1.28115 30 1.95942 30 2.66667ZM9.54545 0H2.72727C2.00396 0 1.31026 0.280951 0.7988 0.781048C0.287337 1.28115 0 1.95942 0 2.66667V29.3333C0 30.0406 0.287337 30.7189 0.7988 31.219C1.31026 31.719 2.00396 32 2.72727 32H9.54545C10.2688 32 10.9625 31.719 11.4739 31.219C11.9854 30.7189 12.2727 30.0406 12.2727 29.3333V2.66667C12.2727 1.95942 11.9854 1.28115 11.4739 0.781048C10.9625 0.280951 10.2688 0 9.54545 0Z" fill="#164371"/>
                </svg>
                <svg width="30" height="28" class="default" viewBox="0 0 29.3 27.75" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M28.3047 12.6769C29.8297 13.4175 29.7994 15.6005 28.2545 16.2985L2.9671 27.7242C1.64333 28.3224 0.143593 27.3543 0.143593 25.9016L0.143593 2.19472C0.143593 0.718023 1.689 -0.249451 3.01733 0.395671L28.3047 12.6769Z" fill="#164371"/>
                </svg>
                <svg width="28" height="27" class="play-button hidden" viewBox="0 0 28 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M28.3047 12.6769C29.8297 13.4175 29.7994 15.6005 28.2545 16.2985L2.9671 27.7242C1.64333 28.3224 0.143593 27.3543 0.143593 25.9016L0.143593 2.19472C0.143593 0.718023 1.689 -0.249451 3.01733 0.395671L28.3047 12.6769Z" fill="#164371"/>
                </svg>
            </div>
        </div>
    </div>
</section>
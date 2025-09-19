<?php
/**
 * background -> 
 */
if(!empty($args['style'])) {
    $vars = '';
    foreach($args['style'] as $prop => $style) {
        $vars .= '--btn-'.$prop.': '.$style.';';
    }
    if($args['style']['border-color']) {
        $vars .= '--btn-border-width: 1px;';
    }
}
if(!empty($args['arrow'])) {
    $label = '<p class="flex gap-x-4 items-center"><span>' . $args['label'] . '</span><span><img src="'.assets_url('/dist/images/right-arrow.svg').'" width="20" height="20"></p>';
} else {
    $label = $args['label'];
}
?>
<a href="<?= $args['url'] ? $args['url'] : '#' ?>" class="button button-liquid button--stroke px-12" style="<?= isset($vars) ? $vars : '' ?>">
    <span class="button__flair"></span>
    <span class="button__label text-button"><?= $label ?></span>
</a>
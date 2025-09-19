<?php if(get_field('form_shortcode', 'option') && get_field('pdf_link', 'option')) : ?>

    <div id="popup-form" class="fixed inset-0 w-full h-full">

        <div class="inner absolute inset-0 flex justify-center items-center w-full h-full">
            <div class="overlay absolute inset-0 bg-[rgba(0,0,0,.4)]"></div>

            <div class="wrapper bg-theme-beach relative z-10 mx-2">
                <div class="close-button absolute right-6 top-6 -transform-y-1/2 -transform-x-1/2 cursor-pointer">
                    <img src="<?= assets_url('/dist/images/x-button.svg') ?>" alt="">
                </div>
                <div class="form block-form py-12 md:px-8 px-4 overflow-y-scroll">
                    <?= do_shortcode(get_field('form_shortcode', 'option')); ?>
        
                    <div id="pdf-button" class="button-wrapper pt-12" style="display: none;">
                        <div class="acf-block block-button">
                            <a href="<?= get_field('pdf_link', 'option') ?>" download class="button button-liquid button--stroke" style="--btn-background-color: var(--theme-blue);">
                                <span class="button__flair"></span>
                                <span class="button__label text-button">Download PDF</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

<?php endif; ?>
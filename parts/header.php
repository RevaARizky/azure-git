<header class="absolute top-0 left-0 right-0 w-full z-50">
    <div class="outer">
        <div class="container">
            <div class="flex items-center justify-between py-6">
                
                <div class="logo-wrapper col-span-3">
                    <a href="/">
                        <picture>
                            <source media="(max-width: 1023px)" srcset="<?= assets_url('/dist/images/logo-header-mobile.svg') ?>">
                            <source media="(min-width: 1023px)" srcset="<?= assets_url('/dist/images/logo-header.svg') ?>">
                            <img src="<?= assets_url('/dist/images/logo-header.svg') ?>" class="lg:w-[180px]" alt="">
                        </picture>
                    </a>
                </div>

                <div class="cta-wrapper col-span-3">
                    <div class="inner flex items-center gap-x-6">
                        <div id="menu-trigger" class="hamburger-wrapper hamburger-init py-4 px-8 menu-trigger" data-trigger-menu="#menu">
                            <div class="inner overflow-hidden">
                                <div class="hamburger bg-theme-blue"></div>
                                <div class="hamburger bg-theme-blue"></div>
                                <div class="hamburger bg-theme-blue"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<div id="fixed-menu" class="fixed top-0 left-0 right-0" style="z-index: 999;">
    <div class="container">
        <div class="flex items-center justify-between">
                
            <div class="logo-wrapper col-span-3">
                <!-- <picture>
                    <source media="(max-width: 1023px)" srcset="<?= assets_url('/dist/images/logo-header-mobile.svg') ?>">
                    <source media="(min-width: 1023px)" srcset="<?= assets_url('/dist/images/logo-header.svg') ?>">
                    <img src="<?= assets_url('/dist/images/logo-header.svg') ?>" class="md:w-[180px]" alt="">
                </picture> -->
            </div>

            <div class="cta-wrapper col-span-3">
                <div class="inner flex items-center gap-x-6">
                    <div class="hamburger-wrapper py-4 px-8 shadow bg-[#F5F3EE] menu-trigger" data-trigger-menu="#menu">
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


<aside id="menu" data-trigger-anim="#menu-wrapper" data-trigger-open=".menu-trigger" data-trigger-close="#close-trigger">

    <div id="menu-wrapper" class="outer fixed h-screen w-screen right-0 top-0" style="z-index: 99999;">
        <div id="menu-overlay" class="overlay absolute inset-0" style="z-index: 99999;"></div>
        <div class="absolute right-0 bottom-0 top-0 left-0 md:left-auto" style="z-index: 999999;">
            <div id="close-trigger" class="absolute top-6 right-12 cursor-pointer" data-trigger-menu="#menu"><img src="<?= assets_url('/dist/images/x-button.svg') ?>" alt=""></div>
            <div class="menu-wrapper flex bg-theme-beach flex-col h-min min-h-full items-center justify-center md:px-44 px-12">
                <div class="logo-wrapper mb-16">
                    <a href="/">
                        <img src="<?= assets_url('/dist/images/logo-menu.png') ?>" class="mx-auto" alt="">
                    </a>
                </div>
                <?php foreach(wp_get_menu_array('Main Header') as $menu) : ?>
                    <div class="menu mb-10 menu-<?= $menu['ID'] ?>">
                        <a href="<?= $menu['url'] ?>" class="text-h2 text-theme-soft-gray<?= $menu['is_active'] ? ' active' : '' ?>">
                            <?= $menu['title'] ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</aside>

<!-- <div id="loading-screen" class="fixed w-screen h-screen inset-0" style="--background-image: url(<?= assets_url('/dist/images/footer-pattern.png') ?>); --bg-color: #164371;">

</div> -->

<div id="loading-screen" class="fixed w-screen h-screen inset-0" style="z-index: 9999999; width: 100vw; height: 100vh; inset: 0; position: fixed; pointer-events: none;">
    <div class="strip-wrapper" style="position: absolute; inset: 0; pointer-events: none; background-size: cover; background-position: center; background-image: linear-gradient(var(--linear-gradient, rgba(22, 67, 113, 1), rgba(22, 67, 113, 1)));">
        <!-- <div class="strip-item" style="height: 10vh; overflow: hidden;">
            <div class="strip" style="background-image: url(<?= assets_url('/dist/images/footer-pattern.png') ?>); background-size: cover; background-position: 0% 0vh;height: 10vh; background-color: rgb(22, 67, 113);"></div>
        </div>
        <div class="strip-item" style="height: 10vh; overflow: hidden;">
            <div class="strip" style="background-image: url(<?= assets_url('/dist/images/footer-pattern.png') ?>); background-size: cover; background-position: 0% 10vh;height: 10vh; background-color: rgb(22, 67, 113);"></div>
        </div>
        <div class="strip-item" style="height: 10vh; overflow: hidden;">
            <div class="strip" style="background-image: url(<?= assets_url('/dist/images/footer-pattern.png') ?>); background-size: cover; background-position: 0% 20vh;height: 10vh; background-color: rgb(22, 67, 113);"></div>
        </div>
        <div class="strip-item" style="height: 10vh; overflow: hidden;">
            <div class="strip" style="background-image: url(<?= assets_url('/dist/images/footer-pattern.png') ?>); background-size: cover; background-position: 0% 30vh;height: 10vh; background-color: rgb(22, 67, 113);"></div>
        </div>
        <div class="strip-item" style="height: 10vh; overflow: hidden;">
            <div class="strip" style="background-image: url(<?= assets_url('/dist/images/footer-pattern.png') ?>); background-size: cover; background-position: 0% 40vh;height: 10vh; background-color: rgb(22, 67, 113);"></div>
        </div>
        <div class="strip-item" style="height: 10vh; overflow: hidden;">
            <div class="strip" style="background-image: url(<?= assets_url('/dist/images/footer-pattern.png') ?>); background-size: cover; background-position: 0% 50vh;height: 10vh; background-color: rgb(22, 67, 113);"></div>
        </div>
        <div class="strip-item" style="height: 10vh; overflow: hidden;">
            <div class="strip" style="background-image: url(<?= assets_url('/dist/images/footer-pattern.png') ?>); background-size: cover; background-position: 0% 60vh;height: 10vh; background-color: rgb(22, 67, 113);"></div>
        </div>
        <div class="strip-item" style="height: 10vh; overflow: hidden;">
            <div class="strip" style="background-image: url(<?= assets_url('/dist/images/footer-pattern.png') ?>); background-size: cover; background-position: 0% 70vh;height: 10vh; background-color: rgb(22, 67, 113);"></div>
        </div>
        <div class="strip-item" style="height: 10vh; overflow: hidden;">
            <div class="strip" style="background-image: url(<?= assets_url('/dist/images/footer-pattern.png') ?>); background-size: cover; background-position: 0% 80vh;height: 10vh; background-color: rgb(22, 67, 113);"></div>
        </div>
        <div class="strip-item" style="height: 10vh; overflow: hidden;">
            <div class="strip" style="background-image: url(<?= assets_url('/dist/images/footer-pattern.png') ?>); background-size: cover; background-position: 0% 90vh;height: 10vh; background-color: rgb(22, 67, 113);"></div>
        </div> -->
        <!-- <div class="loading-bg" style="background-image: url(<?= assets_url('/dist/images/loading_pattern__.png') ?>); background-size: 50%; background-position: center; position: absolute; inset: 0; width: 100%; height: 100%; opacity: 1; z-index: 1;"> -->
        <div class="loading-bg flex justify-center items-center h-full w-full">
            <img src="<?= assets_url('/dist/images/loading_pattern.gif') ?>" class="w-1/4" alt="">
        </div>
        </div>
        <?php for ($i = 0; $i < 5; $i++): ?>
            <!-- <div class="strip-item" style="height: 20vh; overflow: hidden;">
                <div class="strip" style="
                    background-image: url(<?= assets_url('/dist/images/footer-pattern.png') ?>);
                    background-size: cover;
                    background-position: 0% -<?= $i * 20 ?>vh;
                    height: 20vh;
                    background-color: rgb(22, 67, 113);
                "></div>
            </div> -->
        <?php endfor; ?>

    </div>
</div>
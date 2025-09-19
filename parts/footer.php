<footer class="bg-theme-blue relative" style="--background-image: url(<?= assets_url('/dist/images/footer-pattern.png') ?>);">
    <div class="inner" data-speed=".8">
        <div class="container text-white md:pt-32 md:pb-6 pb-12 pt-12">
    
            <div class="flex md:justify-between justify-center md:flex-nowrap flex-wrap">

                <div class="item md:text-left text-center w-full md:w-auto">
                    <div class="logo mb-12 text-center">
                        <a href="/">
                            <img src="<?= assets_url('/dist/images/logo-header.svg') ?>" width="180" alt="" class="mx-auto md:mx-0">
                        </a>
                    </div>
                    <div class="contact md:mb-0 mb-8">
                        <div class="md:mb-8 mb-4">
                            <p>Contact Us</p>
                        </div>
                        <div>
                            <p class="md:mb-0 mb-4 menu"><a href="mailto:sales@azureviewproperties.com">sales@azureviewproperties.com</a></p>
                            <p class="menu"><a href="tel:6281337568977">+62 813‑3756‑8977</a></p>
                        </div>
                    </div>
                </div>
        
                <div class="item md:text-left text-center md:mb-0 mb-8 w-full md:w-auto">
                    <?php foreach(wp_get_menu_array('Footer Menu') as $menu) : ?>
                        <div class="menu md:mb-2 mb-4 menu-<?= $menu['ID'] ?>">
                            <a href="<?= $menu['url'] ?>" class="text-quote">
                                <?= $menu['title'] ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
        
                <div class="item w-full md:w-auto">
                    <div class="social-list flex justify-center md:justify-start gap-x-6">
                        <div class=" facebook">
                            <a href="#" class="button button-liquid button--stroke social" style="--btn-background-color: #fff; --btn-hover-background-color: #5f7e9e;">
                                <span class="button__flair"></span>
                                <span class="button__label text-button">
                                    <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.03634 9.33605V15.8986H5.61536V9.33605H8.2842L8.83956 6.31857H5.61536V5.25103C5.61536 3.6559 6.24169 3.045 7.85842 3.045C8.36133 3.045 8.76551 3.05734 9 3.08202V0.345306C8.55879 0.224977 7.47892 0.101562 6.85567 0.101562C3.55742 0.101562 2.03634 1.65967 2.03634 5.01963V6.31857H0V9.33605H2.03634Z" fill="black"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <div class="social instagram">
                            <a href="#" class="button button-liquid button--stroke social" style="--btn-background-color: #fff; --btn-hover-background-color: #5f7e9e;">
                                <span class="button__flair"></span>
                                <span class="button__label text-button">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.00357 3.8978C5.7329 3.8978 3.90137 5.72933 3.90137 8C3.90137 10.2707 5.7329 12.1022 8.00357 12.1022C10.2742 12.1022 12.1058 10.2707 12.1058 8C12.1058 5.72933 10.2742 3.8978 8.00357 3.8978ZM8.00357 10.667C6.5362 10.667 5.33661 9.47094 5.33661 8C5.33661 6.52906 6.53263 5.33304 8.00357 5.33304C9.47451 5.33304 10.6705 6.52906 10.6705 8C10.6705 9.47094 9.47094 10.667 8.00357 10.667ZM13.2304 3.73C13.2304 4.26197 12.802 4.68682 12.2736 4.68682C11.7416 4.68682 11.3167 4.2584 11.3167 3.73C11.3167 3.20161 11.7452 2.77318 12.2736 2.77318C12.802 2.77318 13.2304 3.20161 13.2304 3.73ZM15.9473 4.7011C15.8866 3.41939 15.5939 2.28406 14.6549 1.34866C13.7195 0.413254 12.5842 0.120495 11.3025 0.0562312C9.98148 -0.0187437 6.02209 -0.0187437 4.7011 0.0562312C3.42296 0.116925 2.28763 0.409684 1.34866 1.34509C0.409684 2.28049 0.120495 3.41582 0.0562312 4.69753C-0.0187437 6.01852 -0.0187437 9.97791 0.0562312 11.2989C0.116925 12.5806 0.409684 13.7159 1.34866 14.6513C2.28763 15.5867 3.41939 15.8795 4.7011 15.9438C6.02209 16.0187 9.98148 16.0187 11.3025 15.9438C12.5842 15.8831 13.7195 15.5903 14.6549 14.6513C15.5903 13.7159 15.8831 12.5806 15.9473 11.2989C16.0223 9.97791 16.0223 6.02209 15.9473 4.7011ZM14.2408 12.7163C13.9623 13.416 13.4232 13.9551 12.7198 14.2372C11.6666 14.6549 9.16747 14.5585 8.00357 14.5585C6.83967 14.5585 4.33694 14.6513 3.28729 14.2372C2.58753 13.9587 2.04842 13.4196 1.76637 12.7163C1.34866 11.6631 1.44505 9.1639 1.44505 8C1.44505 6.8361 1.35223 4.33337 1.76637 3.28372C2.04485 2.58396 2.58396 2.04485 3.28729 1.7628C4.34051 1.34509 6.83967 1.44148 8.00357 1.44148C9.16747 1.44148 11.6702 1.34866 12.7198 1.7628C13.4196 2.04128 13.9587 2.58039 14.2408 3.28372C14.6585 4.33694 14.5621 6.8361 14.5621 8C14.5621 9.1639 14.6585 11.6666 14.2408 12.7163Z" fill="black"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <div class="social tiktok">
                            <a href="#" class="button button-liquid button--stroke social" style="--btn-background-color: #fff; --btn-hover-background-color: #5f7e9e;">
                                <span class="button__flair"></span>
                                <span class="button__label text-button">
                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14 6.56002C12.6237 6.56297 11.2813 6.13331 10.1625 5.33177V10.9198C10.1622 11.9548 9.84591 12.9649 9.25598 13.8152C8.66605 14.6655 7.83059 15.3154 6.86134 15.678C5.89208 16.0405 4.83524 16.0985 3.83217 15.8441C2.82909 15.5897 1.92759 15.035 1.24825 14.2543C0.5689 13.4736 0.144092 12.5041 0.0306358 11.4754C-0.0828202 10.4467 0.120485 9.40789 0.613362 8.49788C1.10624 7.58787 1.86519 6.85006 2.78871 6.38312C3.71223 5.91618 4.75629 5.74238 5.78125 5.88495V8.6946C5.31259 8.54706 4.80929 8.55137 4.34322 8.70694C3.87715 8.8625 3.47214 9.16136 3.18603 9.56085C2.89992 9.96033 2.74732 10.44 2.75004 10.9314C2.75276 11.4228 2.91064 11.9007 3.20115 12.297C3.49167 12.6933 3.89995 12.9877 4.36771 13.1381C4.83547 13.2885 5.33879 13.2872 5.80579 13.1345C6.2728 12.9818 6.67962 12.6854 6.96816 12.2877C7.25671 11.8899 7.41222 11.4112 7.4125 10.9198V0H10.1625C10.1609 0.232605 10.1808 0.464859 10.2219 0.693818C10.3175 1.20418 10.5162 1.68968 10.8058 2.12064C11.0954 2.55161 11.4699 2.91898 11.9062 3.20031C12.5274 3.61062 13.2556 3.82908 14 3.8285V6.56002Z" fill="black"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <div class="social youtube">
                            <a href="#" class="button button-liquid button--stroke social" style="--btn-background-color: #fff; --btn-hover-background-color: #5f7e9e;">
                                <span class="button__flair"></span>
                                <span class="button__label text-button">
                                    <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.66146 1.08934C2.12187 0.757571 1.44375 0.746634 0.893229 1.05653C0.342708 1.36643 0 1.94976 0 2.58413V15.4175C0 16.0518 0.342708 16.6352 0.893229 16.9451C1.44375 17.255 2.12187 17.2404 2.66146 16.9123L13.1615 10.4956C13.6828 10.1784 14 9.6133 14 9.0008C14 8.3883 13.6828 7.82684 13.1615 7.50601L2.66146 1.08934Z" fill="black"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
        
            </div>
    
            <div class="line pt-8 pb-4">
                <hr>
            </div>
    
            <div class="copyright flex md:justify-between justify-center">
                <div class="item">
                    © 2025 Azure View Properties. All Rights Reserved.
                </div>
                <div class="item">
                    <a href="https://gaiada.com" target="_blank">Developed by Gaia Digital Agency.</a>
                </div>
            </div>
    
        </div>
    </div>

</footer>
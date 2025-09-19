<?php
add_filter('acf/fields/wysiwyg/toolbars', function($toolbars) {
    $toolbars['Full'] = array();
    $toolbars['Full'][1] = array(
        'formatselect', 'styleselect', 'bold', 'italic', 'underline', 'link', 'unlink', 'bullist', 'numlist', 'aligncenter', 'alignleft', 'alignright', 'alignjustify'
    );
    return $toolbars;
});

add_action('acf/input/admin_footer', function(){
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            acf.addFilter('wysiwyg_tinymce_settings', function( mceInit, id, field ){

                // mceInit.setup = function(editor) {
                //     console.log(editor.getContent(), editor)
                //     editor.on('ApplyFormat', function(e) {
                //         if (e.format && e.format.classes && e.format.classes.startsWith('split-text')) {
                //             const content = editor.getContent();
                //             if (content.includes('<!-- pagebreak -->')) {
                //                 const newContent = content.replace(/<!-- pagebreak -->/g, '');
                //                 editor.setContent(newContent);
                //                 alert('Page break removed due to animation being applied.');
                //             }
                //         }
                //     });
                // };

                mceInit.block_formats = 'Paragraph=p.split-text;Headline=p.text-headline;Heading 1=h1.text-h1;Heading 2=h2.text-h2;Heading 3=h3.text-h3;Small=p.text-small;Additional=p.text-button;Quote=p.text-quote';
                mceInit.formats = {
                    'p.split-text': {
                        block: 'p',
                        classes: ['text-body', 'split-text']
                    },
                    'p.text-headline': {
                        block: 'p',
                        classes: ['text-headline', 'split-text']
                    },
                    'h1.text-h1': {
                        block: 'h1',
                        classes: ['text-h1', 'split-text']
                    },
                    'h2.text-h2': {
                        block: 'h2',
                        classes: ['text-h2', 'split-text']
                    },
                    'h3.text-h3': {
                        block: 'h3',
                        classes: ['text-h3', 'split-text']
                    },
                    'p.text-small': {
                        block: 'p',
                        classes: ['text-small', 'split-text']
                    },
                    'p.text-button': {
                        block: 'p',
                        classes: ['text-button', 'split-text']
                    },
                    'p.text-quote': {
                        block: 'p',
                        classes: ['text-quote', 'split-text']
                    }
                }

                mceInit.style_formats = [
                    {
                        title: 'Colors',
                        items: [
                            { title: 'Yellow', inline: 'span', classes: 'text-theme-yellow' },
                            { title: 'Navy', inline: 'span', classes: 'text-theme-navy' },
                            { title: 'Blue', inline: 'span', classes: 'text-theme-blue' },
                            { title: 'White', inline: 'span', classes: 'text-theme-white' },
                            { title: 'Beach', inline: 'span', classes: 'text-theme-beach' },
                            { title: 'Light Gray', inline: 'span', classes: 'text-theme-light-gray' },
                            { title: 'Gray', inline: 'span', classes: 'text-theme-gray' },
                            { title: 'Green', inline: 'span', classes: 'text-theme-green' },
                            { title: 'Orange', inline: 'span', classes: 'text-theme-orange' },
                            { title: 'Red', inline: 'span', classes: 'text-theme-red' },
                            { title: 'Soft Gray', inline: 'span', classes: 'text-theme-soft-gray' }
                        ]
                    },
                ];
                return mceInit;
            });
        })
    </script>
    <?php
});

<!-- Initialize the editor. -->
<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
<script type="text/javascript">
    $(document).ready(function() {
        tinyMCE.baseURL = '<?php echo url('/'); ?>/assets/tinymce'; // trailing slash important
        tinymce.init({
            selector: 'textarea.html-editor',
            menu: {},
            menubar: false,
            toolbar:
                'styleselect | undo redo | bold italic underline strikethrough \
                | subscript superscript | alignjustify alignleft aligncenter alignright \
                | bullist numlist | codesample visualblocks table \
                | link image | preview code fullscreen'
            ,
            plugins : [
                'advlist autolink link image lists table preview visualblocks paste',
                'code codesample fullscreen'
            ],
            relative_urls: false,
            force_br_newlines : false,
            force_p_newlines : true,
            forced_root_block : '',
            convert_newlines_to_brs: true,
            remove_linebreaks : true,
            paste_as_text: true,

            height: 300,
            content_css: [
                '{{asset('assets/style.css')}}',
                '{{asset('assets/semantic-ui/css/semantic.min.css')}}',
                '{{asset('assets/tinymce/style.css')}}',
                '//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'
            ],
            skin_url: '{{asset('assets/tinymce/skins/light')}}',
            table_default_attributes: {
                class: 'ui celled table'
            },

            style_formats: [
                { title: "Judul",
                    items: [
                        {title: "Judul 1", format: "h2", class: 'ui header'},
                        {title: "Judul 2", format: "h3", class: 'ui header'},
                        {title: "Judul 3", format: "h4", class: 'ui header'},
                        {title: "Judul 4", format: "h5", class: 'ui header'},
                        {title: "Judul 5", format: "h6", class: 'ui header'}]
                },
                { title: "Paragraf", block: 'p' },
                { title: "Quote", block: 'blockquote' },
            ],
        });
        tinymce.init({
            selector: 'textarea.html-editor-simple',
            menu: {},
            menubar: false,
            toolbar:
                'undo redo | bold italic underline strikethrough \
                | subscript superscript \
                | bullist numlist | codesample visualblocks table \
                | link image | code'
            ,
            forced_root_block : false,
            plugins : 'advlist autolink link image lists table visualblocks code codesample',
            relative_urls: false,
            force_br_newlines : false,
            force_p_newlines : true,
            forced_root_block : '',
            convert_newlines_to_brs: true,
            remove_linebreaks : true,
            paste_as_text: true,

            content_css: [
                '{{asset('assets/style.css')}}',
                '{{asset('assets/semantic-ui/css/semantic.min.css')}}',
                '{{asset('assets/tinymce/style.css')}}',
                '//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'
            ],
            skin_url: '/assets/tinymce/skins/light',
            table_default_attributes: {
                class: 'ui celled table'
            },
        });
    });
</script>
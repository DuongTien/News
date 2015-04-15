var Global =
{
    init: function() {
        // Tiny MCE
        tinymce.init({
            document_base_url: baseUrl,
            selector: "textarea.mceAdvance",
            theme: "modern",
            language : "en",
            width : "100%",
            height: 500,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
            ],
            image_dimensions: false,
            content_css: "css/content.css",
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ",
            toolbar2: "link image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ],
            force_p_newlines : false,
            relative_urls : false,
            remove_script_host: false,

            external_filemanager_path:baseUrl + "/filemanager/",
            filemanager_title:"Responsive Filemanager" ,
            external_plugins: { "filemanager" : baseUrl + "/filemanager/plugin.min.js"}
        });
    }
};

$(document).ready(function()
{
    Global.init();
});
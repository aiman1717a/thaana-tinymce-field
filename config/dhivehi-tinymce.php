<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Options
    |--------------------------------------------------------------------------
    |
    | Here you can define the options that are passed to all NovaTinyMCE
    | fields by default.
    |
    */

    'default_options' => [
        'height' => 500,
        'menubar'=> "",
        'directionality'=> "ltr",
        'image_caption'=> true,
        'plugins' => [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount',
        ],
        'toolbar' => 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | ullist numlist outdent indent | removeformat | help | image',
        'relative_urls' => false,
        'use_lfm' => false,
        'lfm_url' => 'laravel-filemanager'
    ],
];

?>

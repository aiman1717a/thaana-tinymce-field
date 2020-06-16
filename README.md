# thaana-tinymce-field
This Nova Package allow you to use TinyMce Rich Editor with varios Customization which supports thaana.

## Installation
```
composer require aiman/thaana-tinymce-field
```

## Configuration
You can publish configuration file for default configuration values
```
php artisan vendor:publish --provider="Aiman\ThaanaTinymceField\FieldServiceProvider"
```

This is the contents of the published config file:
``` PHP
 <?php
return [

    /*
    |--------------------------------------------------------------------------
    | Default Options
    |--------------------------------------------------------------------------
    |
    | Here you can define the options that are passed to all ThaanaTinymceField
    | fields by default. Override these values from options method when using fields.
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
    ],
    'api_key' => 'YOUR API KEY HERE'
];
?>
```

## Usage
In your Nova resource add the use declaration and use the ThaanaTinymceField field:
```
use Aiman\ThaanaTinymceField\ThaanaTinymceField;

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            ThaanaTinymceField::make('Content', 'content'),
        ];
    }
```

### Options
You can pass values to options method which will override `thaana-tinymce-field.php`'s option array defualt values
``` PHP
ThaanaTinymceField::make('Content', 'content')->options(['key' => 'value'])
```

### Thaana
You can turn thaana translation. by default it is `true`.
``` PHP
ThaanaTinymceField::make('Content', 'content')->thaana()
```

### Classes
You can turn thaana translation. by default it is `true`.
``` PHP
ThaanaTinymceField::make('Content', 'content')->thaana()
```

## Important
After Image uploaded to tinymce is stored automatically. However it is still being tested

This package is tested for **Nova 2.0+**


## Credit
Huge Credit goes for [@Jawish Hameed](https://github.com/jawish) for his thaana translation plugin [Thaana Keyboard](https://github.com/jawish/jtk)

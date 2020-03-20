# thaana-tinymce
This Nova Package allow you to use TinyMce Rich Editor with varios Customization which can thaana translation support.

## Installation
```
composer require aiman/dhivehi-tinymce
```

## Configuration
You can publish configuration file for default configuration values
```
php artisan vendor:publish --provider="Aiman\DhivehiTinymce\FieldServiceProvider"
```

This is the contents of the published config file:
```
 <?php
return [

    /*
    |--------------------------------------------------------------------------
    | Default Options
    |--------------------------------------------------------------------------
    |
    | Here you can define the options that are passed to all DhivehiTinymce
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
];
?>
```

## Usage
In your Nova resource add the use declaration and use the NovaTinyMCE field:
```
use Aiman\DhivehiTinymce\DhivehiTinymce;

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

            NovaTinyMCE::make('body'),
        ];
    }
```

### Options

You can pass values to options method which will override `dhivehi-tinymce.php`
```
DhivehiTinymce::make('Content', 'content')->options(['key' => 'value'])
```

### Thaana
You can turn thaana translation. by default it is `true`.
```
DhivehiTinymce::make('Content', 'content')->thaana()
```

### Api Key
You Can pass your own Api Key here from tiny mci cloud
```
DhivehiTinymce::make('Content', 'content')->apikey('your-api-key')
```

### Image Url
Url for in which uploaded images are requested for storing. 
```
DhivehiTinymce::make('Content', 'content')->storingUrl('your-url')
```

## Important
After Image storing the image in serverside, json key named `location` and url for the location should be passed.

This package is tested for **Nova Fields only**


## Credit
Huge Credit goes for [@Jawish Hameed](https://github.com/jawish) for his thaana translation plugin [Thaana Keyboard](https://github.com/jawish/jtk)

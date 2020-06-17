<?php

namespace Aiman\ThaanaTinymceField;

use Laravel\Nova\Fields\Field;

class ThaanaTinymceField extends Field
{
    public $showOnIndex = false;
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'thaana-tinymce-field';

    public function __construct(string $name, ?string $attribute = null, ?mixed $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->withMeta([
            'options' => config('thaana-tinymce-field.default_options')
        ]);

        $this->withMeta([
            'api_key' => config('thaana-tinymce-field.api_key')
        ]);
        $this->thaana(true);
    }

    public function thaana($thaana = true){
        return $this->withMeta([
            'thaana' => $thaana,
        ]);
    }

    public function options($options = null){
        $currentOptions = $this->meta['options'];

        return $this->withMeta([
            'options' => array_merge($currentOptions, $options),
        ]);
    }

    public function addClasses($classes = null){
        return $this->withMeta([
            'classes' => $classes,
        ]);
    }

    public function folder($folder = '/'){
        return $this->withMeta([
            'folder' => $folder,
        ]);
    }
    public function storagePath($path = null){
        return $this->withMeta([
            'path' => $path,
        ]);
    }
    public function driverType($driver_type = 'local'){
        return $this->withMeta([
            'driver_type' => $driver_type,
        ]);
    }
}

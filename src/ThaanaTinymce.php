<?php

namespace Aiman\ThaanaTinymce;

use Laravel\Nova\Fields\Field;

class ThaanaTinymce extends Field
{
    public $showOnIndex = false;
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'thaana-tinymce';

    public function __construct(string $name, ?string $attribute = null, ?mixed $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->withMeta([
            'options' => config('dhivehi-tinymce.default_options')
        ]);
        $this->thaana(true);
    }

    public function thaana($thaana = true){
        return $this->withMeta([
            'thaana' => $thaana,
        ]);
    }


    public function apiKey(string $key = null){
        return $this->withMeta([
            'api_key' => $key,
        ]);
    }
    public function options($options = null){
        $currentOptions = $this->meta['options'];

        return $this->withMeta([
            'options' => array_merge($currentOptions, $options),
        ]);
    }
    public function storingUrl($url = null){
        return $this->withMeta([
            'url' => $url,
        ]);
    }
    public function addClasses($classes = null){
        return $this->withMeta([
            'classes' => $classes,
        ]);
    }
}
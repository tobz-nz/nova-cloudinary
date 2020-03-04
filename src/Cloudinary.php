<?php

namespace Day4\Cloudinary;

use Laravel\Nova\Fields\Field;

class Cloudinary extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'cloudinary';

    /**
     * Create a new field.
     *
     * @param  string  $name
     * @param  string|callable|null  $attribute
     * @param  callable|null  $resolveCallback
     * @return void
     */
    public function __construct($name, $attribute = null, callable $resolveCallback = null) {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->withMeta(['apiKey' => env('CLOUDINARY_API_KEY')]);
        $this->withMeta(['cloudName' => env('CLOUDINARY_CLOUD_NAME')]);
    }

    /**
     * Set the cloudinary api key
     *
     * @param  array  $apiKey
     * @return $this
     */
    public function apiKey(string $apiKey = '')
    {
        return $this->withMeta(['apiKey' => $apiKey]);
    }

    /**
     * Set the cloudinary cloud name
     *
     * @param  array  $cloudName
     * @return $this
     */
    public function cloudName(string $cloudName = '')
    {
        return $this->withMeta(['cloudName' => $cloudName]);
    }

    /**
     * Set the field to allow selecting multiple images
     *
     * @param boolean $multiple
     * @return $this
     */
    public function allowMultiple(boolean $multiple)
    {
        return $this->withMeta(['multiple' => $multiple]);
    }
}

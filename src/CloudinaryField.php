<?php

namespace Techful\CloudinaryField;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class CloudinaryField extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'cloudinary-field';

    /**
     * Create a new field.
     *
     * @param string $name
     * @param string|callable|null $attribute
     * @param callable|null $resolveCallback
     * @return void
     */
    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->withMeta(['apiKey' => config('cloudinary-field.api_key')]);
        $this->withMeta(['cloudName' => config('cloudinary-field.cloud_name')]);
    }

    /**
     * Hydrate the given attribute on the model based on the incoming request.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @param object $model
     * @return mixed
     */
    public function fill(NovaRequest $request, $model)
    {
        // decode the json string before saving it it (as json again, lol)
        $request->replace(['content' => json_decode($request->get('content'))]);

        return $this->fillInto($request, $model, $this->attribute);
    }

    /**
     * Set the cloudinary api key
     *
     * @param array $apiKey
     * @return $this
     */
    public function apiKey(string $apiKey = '')
    {
        return $this->withMeta(compact('apiKey'));
    }

    /**
     * Set the cloudinary cloud name
     *
     * @param array $cloudName
     * @return $this
     */
    public function cloudName(string $cloudName = '')
    {
        return $this->withMeta(compact('cloudName'));
    }

    /**
     * Set the default path & type
     *
     * @param array $sources
     * @return $this
     */
    public function setFolder(string $path, string $resource_type = null)
    {
        return $this->withMeta([
            'path' => array_filter([
                'path' => $path,
                'resource_type' => $resource_type,
            ])
        ]);
    }
}

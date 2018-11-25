<?php

namespace Waygou\NovaUx\Components\Fields;

use Laravel\Nova\Fields\Field;
use Waygou\NovaUx\Concerns\Behaviours;
use Waygou\NovaUx\Concerns\CanAffect;
use Waygou\NovaUx\Concerns\CanStyle;

class Place extends Field
{
    use CanStyle;
    use CanAffect;
    use Behaviours;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-ux-field-place';

    /**
     * Create a new field.
     *
     * @param string      $name
     * @param string|null $attribute
     * @param mixed|null  $resolveCallback
     *
     * @return void
     */
    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->postalCode('postal_code')
             ->city('city')
             ->locality('locality')
             ->countryCode('country_code')
             ->country('country')
             ->latLng('lat_lng')
             ->map('map');
    }

    /**
     * Specify the field that contains the locality.
     *
     * @param string $field
     *
     * @return $this
     */
    public function postalCode($field)
    {
        return $this->withMeta([__FUNCTION__ => $field]);
    }

    /**
     * Specify the field that contains the locality.
     *
     * @param string $field
     *
     * @return $this
     */
    public function city($field)
    {
        return $this->withMeta([__FUNCTION__ => $field]);
    }

    /**
     * Specify the field that contains the locality.
     *
     * @param string $field
     *
     * @return $this
     */
    public function locality($field)
    {
        return $this->withMeta([__FUNCTION__ => $field]);
    }

    /**
     * Specify the field that contains the country code (ISO-3166-1).
     * https://en.wikipedia.org/wiki/ISO_3166-1#Current_codes.
     *
     * @param string $field
     *
     * @return $this
     */
    public function countryCode($field)
    {
        return $this->withMeta([__FUNCTION__ => $field]);
    }

    /**
     * Specify the field that contains the locality.
     *
     * @param string $field
     *
     * @return $this
     */
    public function country($field)
    {
        return $this->withMeta([__FUNCTION__ => $field]);
    }

    /**
     * Specify the field that contains a latitude and longitude (format: "lat,lng").
     *
     * @param string $field
     *
     * @return $this
     */
    public function latLng($field)
    {
        return $this->withMeta([__FUNCTION__ => $field]);
    }

    /**
     * Specify the field that contains a visual map.
     *
     * @param string $field
     *
     * @return $this
     */
    public function map($field)
    {
        return $this->withMeta([__FUNCTION__ => $field]);
    }
}

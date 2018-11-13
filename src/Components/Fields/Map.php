<?php

namespace Waygou\NovaUX\Components\Fields;

use Laravel\Nova\Fields\Field;
use Waygou\NovaUX\Concerns\Behaviours;
use Waygou\NovaUX\Concerns\CanAffect;
use Waygou\NovaUX\Concerns\CanStyle;

class Map extends Field
{
    use CanStyle;
    use CanAffect;
    use Behaviours;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-ux-field-map';

    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);
    }
}
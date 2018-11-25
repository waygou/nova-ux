<?php

namespace Waygou\NovaUx\Components\Fields;

use Laravel\Nova\Fields\Select as NovaSelect;
use Waygou\NovaUx\Concerns\Behaviours;
use Waygou\NovaUx\Concerns\CanAffect;

class Select extends NovaSelect
{
    use CanAffect;
    use Behaviours;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-ux-field-select';

    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);
        //Reset options for the ->affectedBy() to work.
        $this->options([]);
    }
}

<?php

namespace Waygou\NovaUx\Components\Fields;

use Waygou\NovaUx\Concerns\CanAffect;
use Waygou\NovaUx\Concerns\Behaviours;
use Laravel\Nova\Fields\Select as NovaSelect;

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

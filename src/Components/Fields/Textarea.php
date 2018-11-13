<?php

namespace Waygou\NovaUX\Components\Fields;

use Laravel\Nova\Fields\Textarea as NovaTextarea;
use Waygou\NovaUX\Concerns\Behaviours;
use Waygou\NovaUX\Concerns\CanAffect;
use Waygou\NovaUX\Concerns\CanStyle;

class Textarea extends NovaTextarea
{
    use CanStyle;
    use CanAffect;
    use Behaviours;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-ux-field-textarea';
}

<?php

namespace Waygou\NovaUx\Components\Fields;

use Laravel\Nova\Fields\Textarea as NovaTextarea;
use Waygou\NovaUx\Concerns\Behaviours;
use Waygou\NovaUx\Concerns\CanAffect;
use Waygou\NovaUx\Concerns\CanStyle;

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

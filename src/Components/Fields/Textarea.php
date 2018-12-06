<?php

namespace Waygou\NovaUx\Components\Fields;

use Waygou\NovaUx\Concerns\CanStyle;
use Waygou\NovaUx\Concerns\CanAffect;
use Waygou\NovaUx\Concerns\Behaviours;
use Laravel\Nova\Fields\Textarea as NovaTextarea;

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

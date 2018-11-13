<?php

namespace Waygou\NovaUX\Components\Fields;

use Laravel\Nova\Fields\Text as NovaText;
use Waygou\NovaUX\Concerns\Behaviours;
use Waygou\NovaUX\Concerns\CanAffect;
use Waygou\NovaUX\Concerns\CanStyle;

class Text extends NovaText
{
    use CanStyle;
    use CanAffect;
    use Behaviours;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-ux-field-text';

    public function onCreateDefault($value = null)
    {
        return $this->withMeta(['onCreateDefault' => $value]);
    }
}

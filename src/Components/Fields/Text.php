<?php

namespace Waygou\NovaUx\Components\Fields;

use Waygou\NovaUx\Concerns\CanStyle;
use Waygou\NovaUx\Concerns\CanAffect;
use Waygou\NovaUx\Concerns\Behaviours;
use Laravel\Nova\Fields\Text as NovaText;

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

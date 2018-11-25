<?php

namespace Waygou\NovaUx\Components\Fields;

use Laravel\Nova\Fields\Text as NovaText;
use Waygou\NovaUx\Concerns\Behaviours;
use Waygou\NovaUx\Concerns\CanAffect;
use Waygou\NovaUx\Concerns\CanStyle;

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

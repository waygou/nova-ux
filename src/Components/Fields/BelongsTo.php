<?php

namespace Waygou\NovaUX\Components\Fields;

use Laravel\Nova\Fields\BelongsTo as NovaBelongsTo;
use Waygou\NovaUX\Concerns\Behaviours;
use Waygou\NovaUX\Concerns\CanAffect;

class BelongsTo extends NovaBelongsTo
{
    use CanAffect;
    use Behaviours;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-ux-field-belongs-to';

    public function startsEmpty()
    {
        return $this->withMeta(['startsEmpty' => true]);
    }
}

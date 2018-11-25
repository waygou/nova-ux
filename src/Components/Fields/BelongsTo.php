<?php

namespace Waygou\NovaUx\Components\Fields;

use Laravel\Nova\Fields\BelongsTo as NovaBelongsTo;
use Waygou\NovaUx\Concerns\Behaviours;
use Waygou\NovaUx\Concerns\CanAffect;

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

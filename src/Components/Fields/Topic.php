<?php

namespace Waygou\NovaUx\Components\Fields;

use Laravel\Nova\Fields\Field;
use Waygou\XheetahUtils\Models\SvgIcon;

class Topic extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-ux-field-topic';

    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);
        $this->attribute = null;
        $this->hideFromIndex();
    }

    public function withSVG($name = null)
    {
        $path = SvgIcon::where('name', $name)->first()->path;

        return $this->withMeta(['svg' => $path]);
    }
}

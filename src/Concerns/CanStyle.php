<?php

namespace Waygou\NovaUX\Concerns;

trait CanStyle
{
    public function width($width)
    {
        return $this->withMeta(['width' => $width]);
    }
}

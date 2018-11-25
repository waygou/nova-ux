<?php

namespace Waygou\NovaUx\Concerns;

trait CanStyle
{
    public function width($width)
    {
        return $this->withMeta(['width' => $width]);
    }
}

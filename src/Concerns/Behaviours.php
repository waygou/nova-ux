<?php

namespace Waygou\NovaUx\Concerns;

trait Behaviours
{
    /**
     * Indicate that the field should be nullable.
     *
     * @param bool $nullable
     *
     * @return $this
     */
    public function nullable($nullable = true)
    {
        $this->nullable = $nullable;
        $this->withMeta(['nullable' => $this->nullable]);

        return $this;
    }

    // The field will be readonly.
    public function readonly()
    {
        return $this->withMeta(['readonly' => 'readonly']);
    }

    // The field will exist in the display, but will not be
    // transmitted to the server (formFill doesn't run).
    public function onlyOnClient()
    {
        return $this->withMeta(['clientonly' => true]);
    }

    // The field will be disabled.
    public function disabled()
    {
        return $this->withMeta(['disabled' => true]);
    }

    // The field will be hidden.
    public function hidden()
    {
        return $this->withMeta(['hidden' => true]);
    }

    // The field will have a placeholder.
    public function placeholder($text)
    {
        return $this->withMeta(['placeholder' => $text]);
    }

    // The field will start empty.
    // Useful for the Select for instance, when we want
    // to use a Select but we don't want to have options
    // inside when the field renders.
    public function startEmpty()
    {
        return $this->withMeta(['startEmpty' => true]);
    }
}

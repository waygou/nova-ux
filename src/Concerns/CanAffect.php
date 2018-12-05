<?php

namespace Waygou\NovaUx\Concerns;

trait CanAffect
{
    public function affectedBy($field, $closure)
    {
        @session_start();

        if (!array_key_exists('nova-ux-affect', $_SESSION)) {
            $_SESSION['nova-ux-affect'] = [];
        }

        // field = The origin field that will trigger the child field refresh.
        // $this->attribute = The source field that will be refreshed.
        $origin = $field;
        $target = $this->attribute;

        $results = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
        $resource = class_basename($results[1]['class']);

        if (is_null(data_get($_SESSION['nova-ux-affect'], "{$resource}.{$origin}.{$target}"))) {
            data_set($_SESSION['nova-ux-affect'], "{$resource}.{$origin}.{$target}", $closure);
        }

        // In case there is already more than one affected parent field,
        // we need to add to the affected array, and not to replace it.
        // This allows a child field to be affected by multiple parent fields.
        if (array_key_exists('affected', $this->meta)) {
            $this->meta['affected'] = array_merge($this->meta['affected'], [$origin]);
        } else {
            $this->meta['affected'] = [$origin];
        }

        return $this;
    }
}

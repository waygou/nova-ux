<?php

namespace Waygou\NovaUx\Http\Controllers;

use Laravel\Nova\Http\Requests\NovaRequest;

class AffectsController
{
    public function affect(NovaRequest $request)
    {
        @session_start();

        /**
         * Received parameters:
         * $request->resource ==> Resource name, in plural.
         * $request->value ==> Value that should be used to query the target field.
         * $request->origin => Attribute name of the field that triggered the target query.
         * $request->target => Target field to be affected with the query result.
         * $request->field_values => Array with all the field attribute values.
         */

        // Compute the resource to be singular, and lower case, to match in the array.
        $resource = str_singular($request->resource);
        $origin = $request->origin;
        $target = $request->target;

        // Locate class method, given the resource.origin.target data get.
        $classMethod = data_get($_SESSION['nova-ux-affect'], "{$resource}.{$origin}.{$target}");

        return response()->json(app()->call(
            $classMethod,
            ['value'       => $request->value,
             // Here we don't strtolower to keep the attribute original name.
             'origin'      => $request->origin,
             'fieldValues' => $request->field_values, ]
        ));
    }
}

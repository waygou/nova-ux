<template>
    <div class="flex border-b border-40">
        <div class="w-1/5 py-6 px-6">
            <div class="flex justify-start items-center">
                <div class="flex-initial">
                    <h3><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="h-4 w-4 sidebar-icon" preserveAspectRatio><path fill="var(--sidebar-icon)" :d="field.svg"></path></svg></h3>
                </div>
                <div class="flex-no-shrink text-primary text-xl font-semibold">{{ field.name }}</div>
            </div>
        </div>
    </div>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [HandlesValidationErrors, FormField],
    props: ['resourceName', 'field', 'viaResource', 'viaResourceId', 'viaRelationship'],

    computed: {
        d() {
            return this.field.svg;
        }
    }
}
</script>

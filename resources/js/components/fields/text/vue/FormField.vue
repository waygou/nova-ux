<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <input
                class="w-full form-control form-input form-input-bordered"
                :id="field.attribute"
                :dusk="field.attribute"
                v-model="value"
                v-bind="extraAttributes"
                :readonly="field.readonly"
            />
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [Affects, HandlesValidationErrors, FormField],
    props: ['resourceName', 'field'],

    data: function() {
        return {
            allowFetch: false //Default for create route.
        }
    },

    mounted() {

        if(this.$route.name == 'create' && this.field.onCreateDefault)
            this.value = this.field.onCreateDefault

        if(this.$route.name == 'update')
            this.allowFetch = false

        if(this.field.hidden)
            this.hide();
    },

    watch: {
        value: function(value) {
            if(this.allowFetch) //First update cannot fetch!
                this.debouncedChange()
            else
                this.allowFetch = true
        }
    },

    created: function () {
        this.debouncedChange = _.debounce(this.affect, 500)
      },

    methods: {
        hide() {
            this.$el.parentElement.style.display = 'none';
        }
    },

    computed: {
        defaultAttributes() {
            return {
                type: this.field.type || 'text',
                min: this.field.min,
                max: this.field.max,
                step: this.field.step,
                pattern: this.field.pattern,
                placeholder: this.field.placeholder || this.field.name,
                class: this.errorClasses,
            }
        },

        extraAttributes() {
            const attrs = this.field.extraAttributes

            return {
                // Leave the default attributes even though we can now specify
                // whatever attributes we like because the old number field still
                // uses the old field attributes
                ...this.defaultAttributes,
                ...attrs,
            }
        },
    },
}
</script>

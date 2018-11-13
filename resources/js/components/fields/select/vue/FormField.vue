<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <select
                ref="theSelect"
                :id="field.attribute"
                v-model="value"
                class="w-full form-control form-select"
                :class="errorClasses"
                @change="affect"
                :disabled="field.disabled"
                :affected="field.affected"
            >
                <option
                    value=""
                    selected
                    :disabled="!field.nullable"
                >
                    &mdash;
                </option>

                <option
                    v-for="option in field.options"
                    :value="option.value"
                    :selected="option.value == value"
                >
                    {{ option.label }}
                </option>
            </select>
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [Affects, HandlesValidationErrors, FormField],

    mounted() {
        if(this.field.hidden)
            this.hide();
    },

    methods: {

        hide() {
            this.$el.parentElement.style.display = 'none';
        },

        /**
         * Provide a function that fills a passed FormData object with the
         * field's internal value attribute. Here we are forcing there to be a
         * value sent to the server instead of the default behavior of
         * `this.value || ''` to avoid loose-comparison issues if the keys
         * are truthy or falsey
         */
        fill(formData) {
            formData.append(this.field.attribute, this.value)
        }
    },
}
</script>

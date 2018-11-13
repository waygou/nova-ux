<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <input
                :id="field.attribute"
                :dusk="field.attribute"
                type="search"
                v-model="value"
                class="w-full form-control form-input form-input-bordered"
                :class="errorClasses"
                :placeholder="field.name"
            />
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [Affects, HandlesValidationErrors, FormField],

    /**
     * Mount the component.
     */
    mounted() {
        this.setInitialValue()

        this.field.fill = this.fill

        Nova.$on(this.field.attribute + '-value', value => {
            this.value = value
        })

        this.initializePlaces()
    },

    methods: {

        wasAffected(data) {
            if(data){
                this.value = data.address.address
                Nova.$emit(this.field.postalCode + '-value', data.address.postal_code || '')
                Nova.$emit(this.field.city + '-value', data.address.city || '')
                Nova.$emit(this.field.locality + '-value', data.address.locality || '')
                Nova.$emit(this.field.countryCode + '-value', data.address.country_code || '')
                Nova.$emit(this.field.country + '-value', data.address.country || '')
                Nova.$emit(this.field.latLng + '-value', data.address.latitude + ',' + data.address.longitude)
                Nova.$emit(this.field.map + '-value', data.address.map)
            }
        },

        /**
         * Compute address for the map field.
         */
        addressForMap(e) {
            return e.suggestion.name + ' ' + e.suggestion.postcode + ', ' + e.suggestion.country
        },

        /**
         * Initialize Algolia places library.
         */
        initializePlaces() {
            const places = require('places.js')

            const placeType = this.field.placeType

            const config = {
                appId: 'plF86HQV1298',
                apiKey: 'a2d1e77fee90385ae6213e0b6c77896b',
                container: document.querySelector('#' + this.field.attribute),
                type: this.field.placeType ? this.field.placeType : 'address',
                templates: {
                    value(suggestion) {
                        return suggestion.query
                    },
                },
            }

            if (this.field.countries) {
                config.countries = this.field.countries
            }

            const placesAutocomplete = places(config)

            placesAutocomplete.on('change', e => {

                this.$nextTick(() => {
                    this.value = e.suggestion.name

                    var component = this
                    var event = e
                    var field = this.field

                    // Obtain information from Google Maps via rest API.
                    var data = Nova.request()
                        .post("/nova-vendor/waygou/nova-ux/places-geocode", {
                            'address'   : e.suggestion.name + ', ' + e.suggestion.postcode + ', ' + e.suggestion.country
                        }).then(function(response){
                            if(response.status == 200){
                                component.$toasted.show('Address \'' + e.suggestion.name + '\' loaded', { type: 'success' })
                                var geocode = response.data.geocode
                                Nova.$emit(field.postalCode + '-value', geocode.postal_code || '')
                                Nova.$emit(field.city + '-value', geocode.city || '')
                                Nova.$emit(field.locality + '-value', geocode.locality || '')
                                Nova.$emit(field.countryCode + '-value', geocode.country_code || '')
                                Nova.$emit(field.country + '-value', geocode.country || '')
                                Nova.$emit(field.latLng + '-value', geocode.latitude + ',' + geocode.longitude)
                                Nova.$emit(field.map + '-value', {lat: geocode.latitude, lng: geocode.longitude})
                            }
                        }
                    )
                })
            })

            placesAutocomplete.on('clear', () => {
                this.$nextTick(() => {
                    this.value = ''
                    Nova.$emit(this.field.postalCode + '-value', '')
                    Nova.$emit(this.field.city + '-value', '')
                    Nova.$emit(this.field.locality + '-value', '')
                    Nova.$emit(this.field.countryCode + '-value', '')
                    Nova.$emit(this.field.country + '-value', '')
                    Nova.$emit(this.field.latLng + '-value', '')
                    Nova.$emit(this.field.map + '-value', '')
                })
            })
        },
    }
}
</script>

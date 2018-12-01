<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <div class="google-map"
                :id="mapName"
                :dusk="field.attribute"
                v-model="value"
                >
            </div>
        </template>
    </default-field>
</template>
<style scoped>
    .google-map {
        width: 720px;
        height: 300px;
        margin: 0 auto;
        background: gray;
        border:solid 1px #ccc;
    }
</style>
<script>
    import { FormField, HandlesValidationErrors } from 'laravel-nova'

    export default {

        mixins: [Affects, FormField, HandlesValidationErrors],

        props: ['resourceName', 'resourceId', 'field'],

        data: function () {
            return {
                mapName: this.field.attribute,
                latitude: 0,
                longitude: 0,
                value: this.value
            }
        },

        mounted: function () {
            /*
                There is no affect() event since the map just needs
                to receive the {lat:, lng:} object.
                Can receive {lat:, lng:} or 'lat,lng'
             */
            Nova.$on(this.field.attribute + '-value', value => {
                if(value){
                    if(value.lat)
                        this.placeMarkerAndCenter(value.lat, value.lng)
                    else {
                        var parts = value.split(',')
                        this.placeMarkerAndCenter(parts[0], parts[1])
                    }
                }
            })
        },

        methods: {
            placeMarkerAndCenter(lat, lng){
                const element = document.getElementById(this.mapName);

                const options = {
                    zoom: this.field.zoom || 17,
                    center: new google.maps.LatLng(lat, lng),
                    mapTypeId: "hybrid",
                    clickableIcons: false,
                    draggable: true,
                    fullscreenControl: true,
                    disableDefaultUI: true
                };

                google.maps.event.clearInstanceListeners(element);
                const map = new google.maps.Map(element, options);

                new google.maps.Marker({
                    position: new google.maps.LatLng(lat, lng),
                    map: map
                });

                this.value = lat + ',' + lng;
            },

            fill(formData) {
                formData.append(this.field.attribute, this.value)
            },

            /*
             * Set the initial, internal value for the field.
             */
            setInitialValue() {
                if(this.field.value){
                    this.value = this.field.value
                    var parts = this.value.split(',')
                    this.placeMarkerAndCenter(parts[0], parts[1])
                }
            },
        },
    }
</script>

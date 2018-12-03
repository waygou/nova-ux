// Global list of components that will exist in the form.
const components = {}

var Affects = {

    mounted() {
        components[this.field.attribute] = this

        if(this.field.affected !== undefined) {

            var component = this;
            var field = this.field;

            this.field.affected.forEach(function(affected){

                Nova.$on('value-affected-' + affected, ({value, origin, field_values}) => {

                    var data = Nova.request()
                        .post("/nova-vendor/waygou/nova-ux/affect", {
                            'value' : value,
                            'target': field.attribute,
                            'resource': component.resourceName,
                            'origin': affected,
                            'field_values': field_values
                        }).then(function(response){

                            console.log(componentName(component))

                            switch(componentName(component)){

                                case "field-place":
                                    component.wasAffected(response.data)
                                break;

                                case "field-belongs-to":
                                    // Nothing came out?
                                    if(response.data.options == null){
                                        // Remove all options and reset value.
                                        component.availableResources = [];
                                        component.selectedResource = null;
                                        component.selectedResourceId = null;
                                        component.value = ''
                                        return
                                    }

                                    // Fill object with the new values [display, value].
                                    component.availableResources = response.data.options;
                                    component.value = ''
                                break

                                case "field-address":
                                    // Nothing came out?
                                    if(response.data.value == null){
                                        // Remove all options and reset value.
                                        component.value = ''
                                        return
                                    }

                                    Nova.$emit(field.attribute + '-value', response.data.value)
                                    return
                                break;

                                case "field-map":
                                    // Nothing came out?
                                    if(response.data.value == null){
                                        // Remove all options and reset value.
                                        component.value = ''
                                        return
                                    }

                                    Nova.$emit(field.attribute + '-value', response.data.value)
                                    return
                                break;

                                case "field-text":
                                    // Nothing came out?
                                    if(response.data.value == null){
                                        // Remove all options and reset value.
                                        component.value = ''
                                        return
                                    }

                                    Nova.$emit(field.attribute + '-value', response.data.value)
                                    //component.value = response.data.value
                                    return
                                break;

                                // Select field.
                                case "field-select":
                                    // Nothing came out?
                                    if(response.data.options == null){
                                        // Remove all options and reset value.
                                        component.field.options = []
                                        component.value = ''
                                        return
                                    }

                                    // Fill object with the new values [label, value].
                                    component.field.options = response.data.options;

                                    if(component.field.options.length == 0){
                                        // Reset dropdown. Assign 'Select an option'
                                        component.value = ''
                                        return
                                    } else {
                                        // Verify if the current value exists. If not,
                                        // then reset value.
                                        var exists = false

                                        component.field.options.forEach(function(element){
                                            if(element.value == component.value)
                                                exists = true
                                        })

                                        if(!exists)
                                            component.value = ''
                                        return
                                    }
                                break;
                            }
                        });
                    })
            });
        }
    },

    methods: {
        // Retrieves the current value of a Xheetah Nova UI component.
        // Or any other component that is defined in the component switch.
        currentValue() {
            switch(componentName(this)){

                case "field-belongs-to":
                    return this.selectedResourceId
                break;

                case "field-text":
                    return this.value
                break;

                case "field-map":
                    return this.value
                break;

                case "field-select":
                    return this.value
                break

                case "field-address":
                    return this.$refs.address.autocompleteText
                break
            }
        },

        getFieldValues(){
            var data = {}

            for(var prop in components){
                data[prop] = components[prop].currentValue()
            }

            return data
        },

        affect(event) {
            var value;
            // Sometimes the event can be undefined since affect is called
            // outside of an event trigger.
            value = event === undefined ? this.value : event.target.value

            Nova.$emit('value-affected-' + this.field.attribute, {
                    value: value,
                    origin: this.field.attribute,
                    field_values: this.getFieldValues()
            })
        }
    },
};

function loadScript(url, callback){
    var script = document.createElement("script")
    script.type = "text/javascript";

    if (script.readyState){  //IE
        script.onreadystatechange = function(){
            if (script.readyState == "loaded" ||
                    script.readyState == "complete"){
                script.onreadystatechange = null;
                callback();
            }
        };
    } else {  //Others
        script.onload = function(){
            if(callback)
                callback();
        };
    }

    script.src = url;
    document.getElementsByTagName("head")[0].appendChild(script);
};

function componentName(component){
    var componentName = component.$options._componentTag;
    var componentParts = component.$vnode.componentOptions.tag.split("-")
    return componentParts.splice(3).join('-')
}

var gmapKey = "AIzaSyBYGQp1V96-wXHHW_r0FbDDeWaT7yXxM3M";

loadScript("https://maps.googleapis.com/maps/api/js?key=" + gmapKey + "&libraries=places&language=pt");

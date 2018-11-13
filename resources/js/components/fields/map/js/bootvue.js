Nova.booting((Vue, router) => {
    Vue.component('index-nova-ux-field-map', require('../vue/IndexField'));
    Vue.component('detail-nova-ux-field-map', require('../vue/DetailField'));
    Vue.component('form-nova-ux-field-map', require('../vue/FormField'));
})

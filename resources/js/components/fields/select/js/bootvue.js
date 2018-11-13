Nova.booting((Vue, router) => {
    Vue.component('index-nova-ux-field-select', require('../vue/IndexField'));
    Vue.component('detail-nova-ux-field-select', require('../vue/DetailField'));
    Vue.component('form-nova-ux-field-select', require('../vue/FormField'));
})

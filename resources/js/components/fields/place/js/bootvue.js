Nova.booting((Vue, router) => {
    Vue.component('index-nova-ux-field-place', require('../vue/IndexField'));
    Vue.component('detail-nova-ux-field-place', require('../vue/DetailField'));
    Vue.component('form-nova-ux-field-place', require('../vue/FormField'));
})

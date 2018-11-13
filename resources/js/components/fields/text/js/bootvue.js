Nova.booting((Vue, router) => {
    Vue.component('index-nova-ux-field-text', require('../vue/IndexField'));
    Vue.component('detail-nova-ux-field-text', require('../vue/DetailField'));
    Vue.component('form-nova-ux-field-text', require('../vue/FormField'));
})
